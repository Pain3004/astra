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

    public function editEquipmentType(Request $request){

        $id=$request->Id;
        $companyID=(int)$request->comID;

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
        
        $companyID=array(
            "companyID"=>$companyID
        ) ;

        $EditData=$Array[$v];
        $dataArray=array_merge($companyID,$EditData);
        return response()->json($dataArray, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);

    }

    public function updateEquipmentType(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->compID;

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

        $Array[$v]['equipmentType']=$request->name;        
        $Array[$v]['edit_by']=Auth::user()->userFirstName.' '.Auth::user()->userLastName; 
        // $Array[$v]['edit_time']=Carbon::now()->timestamp;
        $Array[$v]['edit_time']=strtotime(time());

        $result->equipment=$Array;
        // dd($FuelVendor->fuelCard);
        if($result->save())
        {
         $arr = array('status' => 'success', 'message' => 'Equipment Type updated successfully.','statusCode' => 200); 
         return json_encode($arr);
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

    public function restoreEquipmentType(Request $request)
    {
        //dd($request);
        $cardIds=$request->all_ids;
        $custID=(array)$request->custID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $EquipmentType = Equipment_add::where('companyID',$company_id )->first();
            $EquipmentTypeArray=$EquipmentType->equipment;
            $arrayLength=count($EquipmentTypeArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$EquipmentType->equipment[$i]['_id'];
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
                $EquipmentTypeArray[$row]['deleteStatus'] = "NO";
                $EquipmentType->equipment= $EquipmentTypeArray;
                $save=$EquipmentType->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Equipment Type Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
    }
}
