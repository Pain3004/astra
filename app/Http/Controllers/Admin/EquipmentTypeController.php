<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment_add;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Collection;

class EquipmentTypeController extends Controller
{
    public function getEquipmentType(Request $request){
        $companyId=1;
       $EquipmentType = Equipment_add::where('companyID',$companyId)->get();  //only for company id one
    //    $EquipmentType = Equipment_add::get();
       return response()->json(['EquipmentType'=>$EquipmentType], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function addEquipmentType(Request $request){

        $companyID=1;
        $totalPaymentTermsArray=0;
        $getCompany_EquipmentType = Equipment_add::where('companyID',$companyID)->first();

        if($getCompany_EquipmentType){
            $EquipmentType_Array=$getCompany_EquipmentType->equipment;
            $total_EquipmentType_Array=count($EquipmentType_Array)+ 1;
        }
  
        $EquipmentType_Data[]=array(    
                       '_id' => $total_EquipmentType_Array,
                       'equipmentType' => $request->EquipmentType_name,
                       'counter' => 0,
                       'created_by' => Auth::user()->userFirstName,
                       'deleteStatus' => 'NO',
                       'deleteUser' => '',
                       'deleteTime' => '',
                       );

        if($getCompany_EquipmentType){
            Equipment_add::where(['companyID' => $companyID])->update([
                'counter'=> $total_EquipmentType_Array,
                'equipment' =>array_merge($EquipmentType_Array,$EquipmentType_Data) ,
            ]);

            $arrr_EquipmentType = array('status' => 'success', 'message' => 'Equipment Type added successfully.'); 
            return json_encode($arrr_EquipmentType);
        }else{
            try{
                    if(Equipment_add::create([
                        // 'companyID' => (int)$_SESSION['companyId'],
                        '_id' => 1,
                        'companyID' => $companyID,
                        'counter' => 1,
                        'equipment' => $EquipmentType_Data,
                    ])) {
                        $arrr_EquipmentType = array('status' => 'success', 'message' => 'Equipment Type added successfully.'); 
                        return json_encode($arrr_EquipmentType);
                    }
            }
            catch(\Exception $error){
                return $error->getMessage();
            }
        }

      
   }

   public function deleteEquipmentType(Request $request)
   {
       $id=$request->id;
       //dd($id);
       $companyID=(int)$request->comId;

       $result = Equipment_add::where('companyID',$companyID)->first();
       $Array=$result->equipment;
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
       $Array[$v]['deleteTime']=Carbon::now()->timestamp;       
       
       $result->equipment=$Array;
       // dd($FuelVendor->fuelCard);
       if($result->save())
       {
        $arr = array('status' => 'success', 'message' => 'Branch office Deleted successfully.','statusCode' => 200); 
        return json_encode($arr);
       }
   }
}
