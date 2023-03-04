<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Load_type;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;
use carbon\carbon;

use Illuminate\Database\Eloquent\Collection;

class LoadController extends Controller
{
    public function getLoadType(Request $request){
        $companyId=Auth::user()->companyID;
        $Load_type = Load_type::where('companyID',$companyId)->get();  //only for company id one
    //    $Load_type = Load_type::get();
       return response()->json(['Load_type'=>$Load_type], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function addLoadType(Request $request){

        $companyID=Auth::user()->companyID;
        $totalArray=0;
        $getCompany = Load_type::where('companyID',$companyID)->first();
        

        if($getCompany){
            $Array=$getCompany->loadType;
            $totalArray=count($Array)+ 1;
        }
       // for id
        foreach($Array as $key =>$array){
            $ids[]=$Array[$key]['_id'];
        }
        $max_id=max($ids);
        $new_id=$max_id+1;

        $Data[]=array(    
                       '_id' => $new_id,
                       'loadName' => $request->loadName,
                       'loadType' => $request->loadType,
                       'counter' => 0,
                       'created_by' => Auth::user()->userFirstName,
                       'deleteStatus' => 'NO',
                       'deleteTime' => '',
                       'deleteUser' => '',
                       );

        if($getCompany){
            Load_type::where(['companyID' => $companyID])->update([
                'counter'=> $totalArray,
                'loadType' =>array_merge($Array,$Data) ,
            ]);

            $arrr = array('status' => 'success', 'message' => 'Load Type added successfully.'); 
            return json_encode($arrr);
        }else{
            try{
                    if(Load_type::create([
                        // 'companyID' => (int)$_SESSION['companyId'],
                        '_id' => 0,
                        'companyID' => $companyID,
                        'counter' => 1,
                        'loadType' => $Data,
                    ])) {
                        $arrr = array('status' => 'success', 'message' => 'Load Type added successfully.'); 
                        return json_encode($arrr);
                    }
            }
            catch(\Exception $error){
                return $error->getMessage();
            }
        }

      
    }

    public function editLoad(Request $request){

        $id=$request->Id;
        $companyID=(int)$request->comID;

        $result = Load_type::where('companyID',$companyID)->first();
        $Array=$result->loadType;
        $len=count($Array);
        $i=0;
        $v=0;
        for($i=0; $i<$len; $i++)
        {
            $ids=$Array[$i]['_id'];
            if($ids==$id)
            {
                $v=$i;
            }
        }
        
        $companyID=array(
            "companyID"=>$companyID
        ) ;

        $EditData=$Array[$v];
        $dataArray=array_merge($companyID,$EditData);
        return response()->json($dataArray, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);

    }

    public function updateLoad(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->compID;

        $result = Load_type::where('companyID',$companyID)->first();
        $Array=$result->loadType;
        $len=count($Array);
        $i=0;
        $v=0;
        for($i=0; $i<$len; $i++)
        {
            $ids=$Array[$i]['_id'];
            if($ids==$id)
            {
                $v=$i;
            }
        }

        $Array[$v]['loadName']=$request->name;        
        $Array[$v]['loadType']=$request->unit;
        $Array[$v]['edit_by']=Auth::user()->userFirstName.' '.Auth::user()->userLastName; 
        $Array[$v]['edit_time']=Carbon::now()->timestamp;

        $result->loadType=$Array;
        if($result->save())
        {
         $arr = array('status' => 'success', 'message' => 'Load updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }

    public function deleteLoad(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;

        $result = Load_type::where('companyID',$companyID)->first();
        $Array=$result->loadType;
        $len=count($Array);
        $i=0;
        $v=0;
        for($i=0; $i<$len; $i++)
        {
            $ids=$Array[$i]['_id'];
            if($ids==$id)
            {
                $v=$i;
            }
        }

        $Array[$v]['deleteStatus']="Yes";  
        $Array[$v]['deleteUser']=Auth::user()->userFirstName.' '.Auth::user()->userLastName; 
        $Array[$v]['deleteTime']=strtotime(date('d-m-y h:i:s'));       
        
        $result->loadType=$Array;
        // dd($FuelVendor->fuelCard);
        if($result->save())
        {
         $arr = array('status' => 'success', 'message' => 'load Type Deleted successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    
    public function restoreLoad(Request $request)
    {
        //dd($request);
        $cardIds=$request->all_ids;
        $custID=(array)$request->custID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $Load = Load_type::where('companyID',$company_id )->first();
            $LoadArray=$Load->loadType;
            $arrayLength=count($LoadArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$Load->loadType[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    $cardIds= str_replace( array('[', ']'), ' ', $cardIds);
                    if(is_string($cardIds))
                    {
                        $cardIds=explode(",",$cardIds);
                    }
                    foreach($cardIds as $credit_card_id)
                    {
                        $credit_card_id= str_replace( array('"', ']' ), ' ', $credit_card_id);
                        if($value==$credit_card_id)
                        {                        
                            $data[]=$i; 
                        }
                    }
                }
            }
            //
            // dd($data);
            foreach($data as $row)
            {
                $LoadArray[$row]['deleteStatus'] = "NO";
                $Load->loadType= $LoadArray;
                $save=$Load->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Load Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
    }

}
