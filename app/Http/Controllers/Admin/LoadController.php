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

use Illuminate\Database\Eloquent\Collection;

class LoadController extends Controller
{
    public function getLoaType(Request $request){
        $companyId=1;
        $Load_type = Load_type::where('companyID',$companyId)->get();  //only for company id one
    //    $Load_type = Load_type::get();
       return response()->json(['Load_type'=>$Load_type], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function addLoadType(Request $request){

        $companyID=1;
        $totalArray=0;
        $getCompany = Load_type::where('companyID',$companyID)->first();
        

        if($getCompany){
            $Array=$getCompany->loadType;
            $totalArray=count($Array)+ 1;
        }
       // dd($Array);
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
    
}
