<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class BranchOfficeController extends Controller
{
    public function getBranchOffice(Request $request){
        $companyId=1;
       // $Office = Office::get();
        $Office = Office::where('companyID',$companyId)->get();
       return response()->json(['Office'=>$Office], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function addBranchOffice(Request $request){

        $companyID=1;
        $Array=0;
        $getCompany = Office::where('companyID',$companyID)->first();

        if($getCompany){
            $Array=$getCompany->office;
            $totalArray=count($Array)+ 1;
        }

        //new id
        foreach($Array as $key =>$array){
            $ids[]=$Array[$key]['_id'];
        }
        $max_id=max($ids);
        $new_id=$max_id+1;

        $Data[]=array(    
                       '_id' => $new_id,
                       'officeName' => $request->name,
                       'officeLocation' => $request->Location,
                       'counter' => 0,
                       'created_by' =>Auth::user()->userFirstName,
                       'deleteStatus' => 'NO',
                       'deleteUser' => '',
                       'deleteTime' => '',
                       );

        if($getCompany){
            Office::where(['companyID' => $companyID])->update([
                'counter'=> $totalArray,
                'office' =>array_merge($Array,$Data) ,
            ]);

            $arrr = array('status' => 'success', 'message' => 'Branch Office added successfully.'); 
            return json_encode($arrr);
        }else{
            try{
                    if(Office::create([
                        '_id' => 1,
                        'companyID' => $companyID,
                        'counter' => 1,
                        'office' => $Data,
                    ])) {
                        $arrr = array('status' => 'success', 'message' => 'Branch Office added successfully.'); 
                        return json_encode($arrr);
                    }
            }
            catch(\Exception $error){
                return $error->getMessage();
            }
        }

      
   }

    public function editBranchOffice(Request $request){

        $id=$request->officeID;
        $companyID=(int)$request->compID;

        $result = Office::where('companyID',$companyID)->first();
        //dd($FuelVendor );
        $Array=$result->office;
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

    public function updateBranchOffice(Request $request)
    {
        $id=$request->officeid;
        //dd($id);
        $companyID=(int)$request->compID;

        $result = Office::where('companyID',$companyID)->first();
        $Array=$result->office;
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

        $Array[$v]['officeName']=$request->name;        
        $Array[$v]['officeLocation']=$request->location;
        
        $result->office=$Array;
        // dd($FuelVendor->fuelCard);
        if($result->save())
        {
         $arr = array('status' => 'success', 'message' => 'Branch office updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    
    public function deleteBranchOffice(Request $request)
    {
        $id=$request->id;
        //dd($id);
        $companyID=(int)$request->comId;

        $result = Office::where('companyID',$companyID)->first();
        $Array=$result->office;
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
        $Array[$v]['deleteTime']=date('d-m-y h:i:s');       
        
        $result->office=$Array;
        // dd($FuelVendor->fuelCard);
        if($result->save())
        {
         $arr = array('status' => 'success', 'message' => 'Branch office Deleted successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }

    public function restoreBranchOffice(Request $request)
    {
        //dd($request);
        $cardIds=$request->all_ids;
        $custID=(array)$request->custID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $Office = Office::where('companyID',$company_id )->first();
            $OfficeArray=$Office->office;
            $arrayLength=count($OfficeArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$Office->office[$i]['_id'];
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
                $OfficeArray[$row]['deleteStatus'] = "NO";
                $Office->office= $OfficeArray;
                $save=$Office->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Branck office Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
    }
}
