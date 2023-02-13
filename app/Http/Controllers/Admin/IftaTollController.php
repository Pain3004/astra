<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\iftaToll;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class IftaTollController extends Controller
{
    public function getIftaToll(Request $request){
        $companyId=1;
        $iftaToll = iftaToll::where('companyID',$companyId)->first();
        //$iftaToll = iftaToll::where('companyID',$companyId)->get();
       
       return response()->json($iftaToll, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function createIftaToll(Request $request)
    {
        $companyID=(int)1;
        $iftaToll = iftaToll::where('companyID',$companyID)->get();
        foreach( $iftaToll as  $iftaToll_data)
        {
            if($iftaToll_data)
            {
                $id=array();
                $iftaTollArray=$iftaToll_data->tolls;
               foreach($iftaTollArray as $r)
               {
                $id[]=$r['_id'];
               }
              $id=max($id);
                $totaliftaTollArray=$id+1;
            }
            else
            {
                $totaliftaTollArray=0; 
            }
            $tollDate=$request->tollDate;
            $tollDate = strtotime($tollDate);
            $iftaTollData[]=array(    
                '_id' => $totaliftaTollArray,
                'tollDate' => $tollDate,
                'transType' => $request->transType,
                'location' => $request->location,
                'transponder' => $request->transponder,
                'licensePlate' => $request->licensePlate,
                'amount' => $request->amount,
                'truckNo' => $request->truckno,
                'invoiceNumber' => $request->invoiceNo,
                'transactionTime' => $request->transactionTime,
                'counter' =>0,
                'created_by' => Auth::user()->userFirstName,
                'created_time' => date('d-m-y h:i:s'),
                'edit_by' =>Auth::user()->userName,
                'edit_time' =>time(),
                'deleteStatus' =>"NO",                    
            ); 
            if($iftaToll_data)
            {                
                iftaToll::where(['companyID' =>$companyID])->update([
                'counter'=> $totaliftaTollArray,
                'tolls' =>array_merge($iftaTollArray,$iftaTollData) ,
                ]);
                $arriftaToll = array('status' => 'success', 'message' => 'Fuel Vendor added successfully.'); 
                return json_encode($arriftaToll);
            }
            else
            {
                try
                {
                    if(iftaToll::create([
                        '_id' => 1,
                        'companyID' => $companyID,
                        'counter' => 1,
                        'tolls' => $currencyData,
                    ])) 
                    {
                        $arrFuelVendor = array('status' => 'success', 'message' => 'Ifta Toll added successfully.'); 
                        return json_encode($arrFuelVendor);
                    }
                }
                catch(\Exception $error)
                {
                    return $error->getMessage();
                }
            }
        }  
    }
    public function editIftaToll(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;
        $iftaToll=iftaToll::where("companyID",$companyID)->first();
        $iftaTollArray=$iftaToll->tolls;
        $iftaTollLenght=count($iftaTollArray);
        $i=0;
        $v=0;
        for($i=0; $i<$iftaTollLenght; $i++)
        {
            $ids=$iftaToll->tolls[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value == $id)
                {
                    $v= $i;
                }
            }
        }
        $iftaToll->tolls= $iftaTollArray[$v];
        return response()->json($iftaToll);
    }
    public function updateIftaToll(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;
        $iftaToll = iftaToll::where('companyID',$companyID)->first();
        $iftaTollArray=$iftaToll->tolls;
        $fuelLength=count($iftaTollArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$iftaToll->tolls[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        $tollDate=$request->tollDate;
        $tollDate = strtotime($tollDate);
       $iftaTollArray[$v]['tollDate' ]= $tollDate;
       $iftaTollArray[$v]['transType' ]= $request->transType;
       $iftaTollArray[$v]['location' ]= $request->location;
       $iftaTollArray[$v]['transponder' ]= $request->transponder;
       $iftaTollArray[$v]['licensePlate' ]= $request->licensePlate;
       $iftaTollArray[$v]['amount' ]= $request->amount;
       $iftaTollArray[$v]['truckNo' ]= $request->truckno;
       $iftaTollArray[$v]['invoiceNumber' ]= $request->invoiceNo;
       $iftaTollArray[$v]['transactionTime' ]= $request->transactionTime;
       $iftaTollArray[$v]['counter' ]=0;
       $iftaTollArray[$v]['created_by' ]= Auth::user()->userFirstName;
       $iftaTollArray[$v]['created_time' ]= date('d-m-y h:i:s');
       $iftaTollArray[$v]['edit_by' ]=Auth::user()->userName;
       $iftaTollArray[$v]['edit_time' ]=time();
       $iftaTollArray[$v]['deleteStatus' ]="NO";
        $iftaToll->tolls=$iftaTollArray;
        if($iftaToll->save())
        {
         $arr = array('status' => 'success', 'message' => 'Ifta Toll Updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
    }
    public function deleteIftaToll(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;
        $iftaToll = iftaToll::where('companyID',$companyID)->first();
        $iftaTollArray=$iftaToll->tolls;
        $fuelLength=count($iftaTollArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$iftaToll->tolls[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        $iftaTollArray[$v]['deleteStatus']="YES";
        $iftaToll->tolls=$iftaTollArray;
        if($iftaToll->save())
        {
         $arr = array('status' => 'success', 'message' => 'Fuel Vendor Ifta Toll delete successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
    }
    public function restoreIftaToll(Request $request)
    {
        $fuel_ids=$request->all_ids;
        // dd($fuel_ids);
        $custID=(array)$request->custID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $iftaToll = iftaToll::where('companyID',$company_id )->first();
            $iftaTollArray=$iftaToll->tolls;
            $arrayLength=count($iftaTollArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$iftaToll->tolls[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    $fuel_ids= str_replace( array('[', ']'), ' ', $fuel_ids);
                    if(is_string($fuel_ids))
                    {
                        $fuel_ids=explode(",",$fuel_ids);
                    }
                    foreach($fuel_ids as $fue_v_id)
                    {
                        $fue_v_id= str_replace( array('"', ']' ), ' ', $fue_v_id);
                        if($value==$fue_v_id)
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
                $iftaTollArray[$row]['deleteStatus'] = "NO";
                $iftaToll->tolls= $iftaTollArray;
                $save=$iftaToll->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Ifta Toll Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
    }
    public function deleteMultiIftaToll(Request $request)
    {
        $fuel_ids=$request->all_ids;
        // dd($fuel_ids);
        $custID=(array)$request->custID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $iftaToll = iftaToll::where('companyID',$company_id )->first();
            $iftaTollArray=$iftaToll->tolls;
            $arrayLength=count($iftaTollArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$iftaToll->tolls[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    $fuel_ids= str_replace( array('[', ']'), ' ', $fuel_ids);
                    if(is_string($fuel_ids))
                    {
                        $fuel_ids=explode(",",$fuel_ids);
                    }
                    foreach($fuel_ids as $fue_v_id)
                    {
                        $fue_v_id= str_replace( array('"', ']' ), ' ', $fue_v_id);
                        if($value==$fue_v_id)
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
                $iftaTollArray[$row]['deleteStatus'] = "YES";
                $iftaToll->tolls= $iftaTollArray;
                $save=$iftaToll->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Ifta Toll Deleted successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
    }
   

    
}
