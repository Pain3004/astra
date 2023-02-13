<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuelReceipt;
use App\Models\Invoiced;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class FuelReceiptController extends Controller
{
    public function getFuelReceipt(Request $request){
        $companyId=67;
        $FuelReceipt = FuelReceipt::where('companyID',$companyId)->first();
       return response()->json($FuelReceipt, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function createFuelReceipt(Request $request)
    {
        $companyId=(int)67;
        $FuelReceipt = FuelReceipt::where('companyID',$companyId)->get();
        return response()->json($FuelReceipt, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function saveFuelReceipt(Request $request)
    {
        // dd($request->driverName);
        
        request()->validate([
       
        ]);
        
        // $FuelReceipt = FuelReceipt::all();
   
        $companyId=(int)67;
        $totalFuelReceiptArray=0;
        $getFuelReceipt = FuelReceipt::where('companyID',$companyId)->first();

        if($getFuelReceipt){
            $FuelReceiptArray=$getFuelReceipt->fuel_receipt;
            $totalFuelReceiptArray=count($FuelReceiptArray)+ 1;
            $ids_trip=array();
            foreach( $FuelReceiptArray as $ids)
            {
                // dd($ids);
                $ids_trip[]=$ids['_id'];
            }
            // dd($ids_trip);
            $ids_trip=max($ids_trip);
            // dd($ids_trip);
        }
        $date=$request->date;
        $date = strtotime($date);
        $FuelReceiptData[]=array(    
                        '_id' => $ids_trip+1 ,
                        // 'counter' => 0,
                        'driverName' => $request->driverName,
                        'driverNumber' => $request->driverNo,
                        'cardNo' => $request->cardNumber,
                        'paymentType'=>$request->paymentType,
                        'category' => $request->fuelVendor,
                        'fuelType' => $request->fuelType,
                        'truckNumber' => $request->truckNumber,
                        'transactionDate'=>$date,
                        'transactionTime' => $request->transactionTime,
                        'locationName' => $request->locationName,
                        'locationCity' => $request->locationCity,
                        'locationState' => $request->locationState,
                        'quantity' => $request->quantity,
                        'amount' => $request->amount,
                        'totalAmount' => $request->totalAmount,
                        'transactionDiscount' => $request->transactionDiscount,
                        'transactionFee' => $request->transactionFee,
                        'transactionGross' => $request->transactionGross,
                        'invoiceNo' => $request->invoiceNo,
                        'insertedTime' => '' ,
                        'insertedUserId' => '' ,
                        'deleteStatus' => 'NO' ,
                        'deleteUser' => '' ,
                        'deleteTime' => '' ,
                        'averagedays' =>'' ,
                        'totalloads' => '' ,

                        );
           
            if($getFuelReceipt){
                FuelReceipt::where(['companyID' =>$companyId])->update([
                    'counter'=> $totalFuelReceiptArray,
                    'fuel_receipt' =>array_merge($FuelReceiptArray,$FuelReceiptData) ,
                    
                ]);

                $arrCustome = array('status' => 'success', 'message' => 'Fuel Receipt added successfully.'); 
                return json_encode($arrCustome);
            }
           
    }
    public function editFuelReceipt(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->companyID;
        // dd($companyID);
        $FuelReceipt=FuelReceipt::where("companyID",$companyID)->first();
        $FuelReceiptArray=$FuelReceipt->fuel_receipt;
        $FuelReceiptLenght=count($FuelReceiptArray);
        $i=0;
        $v=0;
        for($i=0; $i<$FuelReceiptLenght; $i++)
        {
            $ids=$FuelReceipt->fuel_receipt[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value == $id)
                {
                    $v= $i;
                }
            }
        }
        $FuelReceipt->fuel_receipt= $FuelReceiptArray[$v];
        return response()->json($FuelReceipt);  
    }
    public function updateFuelReceipt(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;
        // DD($request->invoiceNo);
        $fuelReceipt=FuelReceipt::where('companyID',$companyID)->first();
        $fuelReceiptArray=$fuelReceipt->fuel_receipt;
        $arrayLength=count($fuelReceiptArray);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLength; $i++){
            $ids=$fuelReceipt->fuel_receipt[$i];
            foreach ($ids as $value){
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }
        $date=$request->date;
        $date = strtotime($date);
        $fuelReceiptArray[$v]['driverName' ]= $request->driverName;
        $fuelReceiptArray[$v]['paymentType']=$request->paymentType;
        $fuelReceiptArray[$v]['driverNumber' ]= $request->driverNo;
        $fuelReceiptArray[$v]['cardNo' ]= $request->cardNumber;
        $fuelReceiptArray[$v]['category' ]= $request->fuelVendor;
        $fuelReceiptArray[$v]['fuelType' ]= $request->fuelType;
        $fuelReceiptArray[$v]['truckNumber' ]= $request->truckNumber;
        $fuelReceiptArray[$v]['transactionDate']=$date;
        $fuelReceiptArray[$v]['transactionTime' ]= $request->transactionTime;
        $fuelReceiptArray[$v]['locationName' ]= $request->locationName;
        $fuelReceiptArray[$v]['locationCity' ]= $request->locationCity;
        $fuelReceiptArray[$v]['locationState' ]= $request->locationState;
        $fuelReceiptArray[$v]['quantity' ]= $request->quantity;
        $fuelReceiptArray[$v]['amount' ]= $request->amount;
        $fuelReceiptArray[$v]['totalAmount' ]= $request->totalAmount;
        $fuelReceiptArray[$v]['transactionDiscount' ]= $request->transactionDiscount;
        $fuelReceiptArray[$v]['transactionFee' ]= $request->transactionFee;
        $fuelReceiptArray[$v]['transactionGross' ]= $request->transactionGross;
        $fuelReceiptArray[$v]['invoiceNo' ]= $request->invoiceNo;
        $fuelReceiptArray[$v]['insertedTime' ]= '' ;
        $fuelReceiptArray[$v]['insertedUserId' ]= '' ;
        $fuelReceiptArray[$v]['deleteStatus' ]= 'NO' ;
        $fuelReceiptArray[$v]['deleteUser' ]= '' ;
        $fuelReceiptArray[$v]['deleteTime' ]= '' ;
        $fuelReceiptArray[$v]['averagedays' ]='' ;
        $fuelReceiptArray[$v]['totalloads' ]= '' ;
        $fuelReceipt->fuel_receipt= $fuelReceiptArray;
        if($fuelReceipt->save())
        {
         $arr = array('status' => 'success', 'message' => 'fuel receipt updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function deleteFuelReceipt(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->companyID;
        $fuelReceipt=FuelReceipt::where('companyID',$companyID)->first();
        $fuelReceiptArray=$fuelReceipt->fuel_receipt;
        $arrayLength=count($fuelReceiptArray);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLength; $i++){
            $ids=$fuelReceipt->fuel_receipt[$i];
            foreach ($ids as $value){
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }
        $fuelReceiptArray[$v]['deleteStatus'] = "YES";
        $fuelReceipt->fuel_receipt= $fuelReceiptArray;
        if($fuelReceipt->save())
        {
         $arr = array('status' => 'success', 'message' => 'fuel receipt Deleted successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function restoreFuelReceipt(Request $request)
    {
        $fuelReceIds=$request->all_ids;
        $custID=(array)$request->custID;
        foreach($custID as $fuel_re_id)
        {
            $fuel_re_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $fuel_re_id);
            $fuel_re_id=(int)$fuel_re_id;
            $FuelReceipt = FuelReceipt::where('companyID',$fuel_re_id )->first();
            $fuelReceiptArray=$FuelReceipt->fuel_receipt;
            $arrayLength=count($fuelReceiptArray);            
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$FuelReceipt->fuel_receipt[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    $fuelReceIds= str_replace( array('[', ']'), ' ', $fuelReceIds);
                    if(is_string($fuelReceIds))
                    {
                        $fuelReceIds=explode(",",$fuelReceIds);
                    }
                    foreach($fuelReceIds as $fuelReId)
                    {
                        $fuelReId= str_replace( array('"', ']' ), ' ', $fuelReId);
                        if($value==$fuelReId)
                        {                        
                            $data[]=$i; 
                        }
                    }
                }
            }
            foreach($data as $row)
            {
                $fuelReceiptArray[$row]['deleteStatus'] = "NO";
                $FuelReceipt->fuel_receipt= $fuelReceiptArray;
                $save=$FuelReceipt->save();
            }
            if ($save) {
                $arr = array('status' => 'success', 'message' => 'Fuel Receipt Restored successfully.','statusCode' => 200); 
                return json_encode($arr);
            }
        }
    }
   public function getInvoicedNumber(Request $request)
   {
        $companyId=1;
        $Invoiced = Invoiced::where('companyID',$companyId)->first();
       //$Invoiced=null;
        return response()->json($Invoiced, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
   }
   public function deleteMulFuelReceipt(Request $request)
   {
    $fuelReceIds=$request->all_ids;
    // dd($fuelReceIds);
    $custID=(array)$request->custID;
    foreach($custID as $fuel_re_id)
    {
        $fuel_re_id=str_replace( array( '\'', '"',
        ',' , ' " " ', '[', ']' ), ' ', $fuel_re_id);
        $fuel_re_id=(int)$fuel_re_id;
        $FuelReceipt = FuelReceipt::where('companyID',$fuel_re_id )->first();
        // dd($FuelReceipt);
        $fuelReceiptArray=$FuelReceipt->fuel_receipt;
        $arrayLength=count($fuelReceiptArray);            
        $i=0;
        $v=0;
        $data=array();
        for ($i=0; $i<$arrayLength; $i++){
            $ids=$FuelReceipt->fuel_receipt[$i]['_id'];
            $ids=(array)$ids;
            foreach ($ids as $value){
                $fuelReceIds= str_replace( array('[', ']'), ' ', $fuelReceIds);
                if(is_string($fuelReceIds))
                {
                    $fuelReceIds=explode(",",$fuelReceIds);
                }
                foreach($fuelReceIds as $fuelReId)
                {
                    $fuelReId= str_replace( array('"', ']' ), ' ', $fuelReId);
                    if($value==$fuelReId)
                    {                        
                        $data[]=$i; 
                    }
                }
            }
        }
        // dd($data);
        foreach($data as $row)
        {
            $fuelReceiptArray[$row]['deleteStatus'] = "YES";
            $FuelReceipt->fuel_receipt= $fuelReceiptArray;
            $save=$FuelReceipt->save();
        }
        if ($save) {
            $arr = array('status' => 'success', 'message' => 'Fuel Receipt Deleted successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
    }
   }

    
}
