<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivered;
use App\Models\Company;
use App\Models\Invoiced;
use App\Models\Completed;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class AccountManagerController extends Controller
{
    public function getAccountDeliverdValue(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $AccountingManager = Delivered::where('companyID',$companyID)->get(); 
        return response()->json(['AccountingManager'=>$AccountingManager], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);




        // $cursor = Delivered::raw()->aggregate([
        //     ['$match' => ['companyID' => $companyID]],
        //     ['$project' => ['size' => ['$size' => ['$load']],
        //     ]]
        // ]);
        // $totalarray = $cursor;
        // $docarray = array();
        // $doPaginate = false;
        // foreach ($cursor as $v) {
        //     if($v['size'] > 0){
        //         $doPaginate = true;
        //     }
        //     $docarray[] = array("size" => $v['size'], "id" => $v['_id']);
        // }
        // // dd($docarray);
        // if($doPaginate)
        // {
        //     $completedata = array();
        //     $partialdata = array();
        //     $paginate = $docarray->paginate($docarray);
            
        //         for($i = 0; $i < sizeof($paginate[0][0][0]); $i++)
        //         {
        //             $partialdata[] = $this->getData($db, $companyID,$paginate[0][0][0][$i]['doc'],$paginate[0][0][0][$i]['end'],$paginate[0][0][0][$i]['start']);
        //         }
            
        //     $completedata[] = $partialdata;
        //     $completedata[] = $paginate;
        //     echo json_encode($completedata);
        // }
    }

    public function getAccountInvoiceValue(Request $request)
    {
     $companyId=(int)Auth::user()->companyID;
     $AccountingManagerInvoiced = Invoiced::where('companyID',$companyId)->get();  //only for company id one
        // $AccountingManagerInvoiced = Invoiced::get();
        return response()->json(['AccountingManagerInvoice'=>$AccountingManagerInvoiced], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function getAccountCompletedValue(Request $request)
    {
     $companyId=(int)Auth::user()->companyID;
     $AccountingManagerComplete = Completed::where('companyID',$companyId)->get();  //only for company id one
        // $AccountingManagerComplete = Completed::get();
        return response()->json(['AccountingManagerComplete'=>$AccountingManagerComplete], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function accountChangeStatus(Request $request)
    {
        $id=$request->id;
        $status=$request->status;
        $data=json_decode($request->data);
        // dd($data);
        $sendFrom=$request->sendFrom;
        $companyID=(int)Auth::user()->companyID;
        if($sendFrom=="Delivered")
        {
            if($status=="Complate")
            {
                $Delivered=Complate::where('companyID',$companyID)->get();
                foreach( $Delivered as  $Delivered_data)
                {
                    if($Delivered_data)
                    {
                        $DeliveredArray=$Delivered_data->load;
                        $ids=array();
                        foreach( $DeliveredArray as $key=> $admin_delivered_id)
                        {
                            $ids[]=$admin_delivered_id['_id'];
                        }
                        $ids=max($ids);
                        $totalDeliveredArray=$ids+1;
                    }
                    else
                    {
                        $totalDeliveredArray=0; 
                    }
                    $accountData[]=array(    
                        '_id' => $data->_id,
                        'active_type' => $data->active_type,
                        'advance_charges' => $data->advance_charges,
                        'broker_driver' => $data->broker_driver,
                        'broker_driver_contact' => $data->broker_driver_contact,
                        'broker_trailer'=>$data->broker_trailer,
                        'broker_truck'=>$data->broker_truck,
                        // 'carDays'=>$data->openingBalance,
                        'carrier_email'=>$data->carrier_email,
                        'carrier_name '=>$data->carrier_name,
                        'carrier_other_modal' =>$data->carrier_other_modal,
                        // 'carrier_rate'=>'',
                        'carrier_parent'=>$data->carrier_parent,
                        'carrier_total'=>$data->carrier_total,
                        'cnno'=>$data->cnno,
                        'company'=>$data->company,
                        'consignee'=>$data->consignee,
                        'consignee_pickup'=>$data->consignee_pickup,
                        'currency'=>$data->currency,
                        // 'custDays'=>'',
                        'customer'=>$data->customer,
                        'customer_email'=>$data->customer_email,
                        'customer_parent'=>$data->customer_parent,
                        'dispatcher'=>$data->dispatcher,
                        'driver_miles_value'=>$data->driver_miles_value,
                        'driver_name'=>$data->driver_name,
                        'driver_other'=>$data->driver_other,
                        'driver_other_modal'=>$data->driver_other_modal,
                        'driver_parent'=>$data->driver_parent,
                        'driver_total'=>$data->driver_total,
                        'empty_mile'=>$data->empty_mile,
                        'empty_miles_value'=>$data->empty_miles_value,
                        'end_location'=>$data->empty_mile,
                        'equipment_type'=>$data->equipment_type,
                        'file'=>$data->file,
                        'flat'=>$data->flat,
                        'flat_rate'=>$data->flat_rate,
                        'fsc'=>$data->fsc,
                        'fsc_percentage'=>$data->fsc_percentage,
                        'isBroker'=>$data->isBroker,
                        'isIfta'=>$data->isIfta,
                        'isIftaVerified'=>$data->isIftaVerified,
                        'is_unit_on'=>$data->is_unit_on,
                        'load_notes'=>$data->load_notes,
                        'loaddata'=>$data->loaddata,
                        'loaded_mile'=>$data->loaded_mile,
                        'loaded_miles_value'=>$data->loaded_miles_value,
                        'other_charges'=>$data->other_charges,
                        'other_charges_modal'=>$data->other_charges_modal,
                        'owner_name'=>$data->owner_name,
                        'owner_other'=>$data->owner_other,
                        'owner_other_modal'=>$data->owner_other_modal,
                        'owner_parent'=>$data->owner_parent,
                        'owner_percentage'=>$data->owner_percentage,
                        'owner_total'=>$data->owner_total,
                        'owner_trailer'=>$data->owner_trailer,
                        'owner_truck'=>$data->owner_truck,
                        'rate'=>$data->rate,
                        'receipt_status'=>$data->receipt_status,
                        'shipper'=>$data->receipt_status,
                        'shipper_pickup'=>$data->shipper_pickup,
                        'start_location'=>$data->start_location,
                        'status'=>"Invoiced",
                        'status_ArrivedConsignee_time'=>$data->status_ArrivedConsignee_time,
                        'status_ArrivedShipper_time'=>$data->status_ArrivedShipper_time,
                        'status_BreakDown_time'=>$data->status_BreakDown_time,
                        'status_Completed_time'=>$data->status_Completed_time,
                        'status_Delivered_time'=>$data->status_Delivered_time,
                        'status_Dispatched_time'=>$data->status_Dispatched_time,
                        'status_Invoiced_time'=>$data->status_Invoiced_time,
                        'status_Loaded_time'=>$data->status_Invoiced_time,
                        'status_OnRoute_time'=>$data->status_OnRoute_time,
                        'status_Open_time'=>$data->status_OnRoute_time,
                        'status_Paid_time'=>$data->status_Paid_time,
                        'status_change_user'=>$data->status_change_user,
                        'tarp'=>$data->tarp,
                        'tarp_select'=>$data->tarp_select,
                        'total_rate'=>$data->total_rate,
                        'trailer'=>'',
                        'truck'=>$data,
                        'typeofloader'=>$data->typeofloader,
                        'units'=>$data->units,
                        'created_by' => Auth::user()->userFirstName,
                        'created_time' => date('d-m-y h:i:s'),
                        'edit_by' =>Auth::user()->userName,
                        'edit_time' =>time(),
                        'deleteStatus' =>"NO",                    
                    ); 
                    if($accountData)
                    {                
                        Complate::where(['companyID' =>$companyID])->update([
                        'counter'=> $totalDeliveredArray+1,
                        'load' =>array_merge($DeliveredArray,$accountData) ,
                        ]);
                        $arrbankData = array('status' => 'success', 'message' => 'Status Changed successfully.'); 
                        return json_encode($arrbankData);


                         $DeliveredDelete=Delivered::where('companyID',$companyID)->first();
                        // dd($DeliveredDelete);
                        $deleteArray=$DeliveredDelete->load;

                        $arrayLength=count($deleteArray);
                        $i=0;
                        $v=0;
                        for ($i=0; $i<$arrayLength; $i++){
                            $id=$DeliveredDelete->load[$i]['_id'];
                            
                            if($id==$data->_id){
                                $v=$i;
                            }
                        }
                        // dd($deleteArray[$v]);
                        // dd($deleteArray);

                        unset($deleteArray[$v]);
                        $deleteArray = array_values($deleteArray);
                        $data= Delivered::where(['companyID' =>$companyID])->update([
                             'counter'=> count($deleteArray),
                             'load' => $deleteArray,
                             ]);
                        // dd($deleteArray);
                    }
                    else
                    {
                        try
                        {
                            if(Complate::create([
                                '_id' => 1,
                                'companyID' => $companyID,
                                'counter' => 1,
                                'load' => $accountData,
                            ])) 
                            {
                                $arrbankData = array('status' => 'success', 'message' => 'Bank Details added successfully.'); 
                                return json_encode($arrbankData);
                            }
                        }
                        catch(\Exception $error)
                        {
                            return $error->getMessage();
                        }
                    }
                }
            }
            if($status=="Invoiced")
            {
                // dd($status);
                $Delivered=Invoiced::where('companyID',$companyID)->get();
                foreach( $Delivered as  $Delivered_data)
                {
                    if($Delivered_data)
                    {
                        $DeliveredArray=$Delivered_data->load;
                        $ids=array();
                        foreach( $DeliveredArray as $key=> $admin_delivered_id)
                        {
                            $ids[]=$admin_delivered_id['_id'];
                        }
                        $ids=max($ids);
                        $totalDeliveredArray=$ids+1;
                    }
                    else
                    {
                        $totalDeliveredArray=0; 
                    }
                    $accountData[]=array(    
                        '_id' => $data->_id,
                        'active_type' => $data->active_type,
                        'advance_charges' => $data->advance_charges,
                        'broker_driver' => $data->broker_driver,
                        'broker_driver_contact' => $data->broker_driver_contact,
                        'broker_trailer'=>$data->broker_trailer,
                        'broker_truck'=>$data->broker_truck,
                        // 'carDays'=>$data->openingBalance,
                        'carrier_email'=>$data->carrier_email,
                        'carrier_name '=>$data->carrier_name,
                        'carrier_other_modal' =>$data->carrier_other_modal,
                        // 'carrier_rate'=>'',
                        'carrier_parent'=>$data->carrier_parent,
                        'carrier_total'=>$data->carrier_total,
                        'cnno'=>$data->cnno,
                        'company'=>$data->company,
                        'consignee'=>$data->consignee,
                        'consignee_pickup'=>$data->consignee_pickup,
                        'currency'=>$data->currency,
                        // 'custDays'=>'',
                        'customer'=>$data->customer,
                        'customer_email'=>$data->customer_email,
                        'customer_parent'=>$data->customer_parent,
                        'dispatcher'=>$data->dispatcher,
                        'driver_miles_value'=>$data->driver_miles_value,
                        'driver_name'=>$data->driver_name,
                        'driver_other'=>$data->driver_other,
                        'driver_other_modal'=>$data->driver_other_modal,
                        'driver_parent'=>$data->driver_parent,
                        'driver_total'=>$data->driver_total,
                        'empty_mile'=>$data->empty_mile,
                        'empty_miles_value'=>$data->empty_miles_value,
                        'end_location'=>$data->empty_mile,
                        'equipment_type'=>$data->equipment_type,
                        'file'=>$data->file,
                        'flat'=>$data->flat,
                        'flat_rate'=>$data->flat_rate,
                        'fsc'=>$data->fsc,
                        'fsc_percentage'=>$data->fsc_percentage,
                        'isBroker'=>$data->isBroker,
                        'isIfta'=>$data->isIfta,
                        'isIftaVerified'=>$data->isIftaVerified,
                        'is_unit_on'=>$data->is_unit_on,
                        'load_notes'=>$data->load_notes,
                        'loaddata'=>$data->loaddata,
                        'loaded_mile'=>$data->loaded_mile,
                        'loaded_miles_value'=>$data->loaded_miles_value,
                        'other_charges'=>$data->other_charges,
                        'other_charges_modal'=>$data->other_charges_modal,
                        'owner_name'=>$data->owner_name,
                        'owner_other'=>$data->owner_other,
                        'owner_other_modal'=>$data->owner_other_modal,
                        'owner_parent'=>$data->owner_parent,
                        'owner_percentage'=>$data->owner_percentage,
                        'owner_total'=>$data->owner_total,
                        'owner_trailer'=>$data->owner_trailer,
                        'owner_truck'=>$data->owner_truck,
                        'rate'=>$data->rate,
                        'receipt_status'=>$data->receipt_status,
                        'shipper'=>$data->receipt_status,
                        'shipper_pickup'=>$data->shipper_pickup,
                        'start_location'=>$data->start_location,
                        'status'=>"Invoiced",
                        'status_ArrivedConsignee_time'=>$data->status_ArrivedConsignee_time,
                        'status_ArrivedShipper_time'=>$data->status_ArrivedShipper_time,
                        'status_BreakDown_time'=>$data->status_BreakDown_time,
                        'status_Completed_time'=>$data->status_Completed_time,
                        'status_Delivered_time'=>$data->status_Delivered_time,
                        'status_Dispatched_time'=>$data->status_Dispatched_time,
                        'status_Invoiced_time'=>$data->status_Invoiced_time,
                        'status_Loaded_time'=>$data->status_Invoiced_time,
                        'status_OnRoute_time'=>$data->status_OnRoute_time,
                        'status_Open_time'=>$data->status_OnRoute_time,
                        'status_Paid_time'=>$data->status_Paid_time,
                        'status_change_user'=>$data->status_change_user,
                        'tarp'=>$data->tarp,
                        'tarp_select'=>$data->tarp_select,
                        'total_rate'=>$data->total_rate,
                        'trailer'=>'',
                        'truck'=>$data,
                        'typeofloader'=>$data->typeofloader,
                        'units'=>$data->units,
                        'created_by' => Auth::user()->userFirstName,
                        'created_time' => date('d-m-y h:i:s'),
                        'edit_by' =>Auth::user()->userName,
                        'edit_time' =>time(),
                        'deleteStatus' =>"NO",                    
                    ); 
                    // dd( $accountData);
                    if($accountData)
                    {                
                        Invoiced::where(['companyID' =>$companyID])->update([
                        'counter'=> $totalDeliveredArray+1,
                        'load' =>array_merge($DeliveredArray,$accountData) ,
                        ]);
                        $DeliveredDelete=Delivered::where('companyID',$companyID)->first();
                        // dd($DeliveredDelete);
                        $deleteArray=$DeliveredDelete->load;

                        $arrayLength=count($deleteArray);
                        $i=0;
                        $v=0;
                        for ($i=0; $i<$arrayLength; $i++){
                            $id=$DeliveredDelete->load[$i]['_id'];
                            
                            if($id==$data->_id){
                                $v=$i;
                            }
                        }
                        // dd($deleteArray[$v]);
                        // dd($deleteArray);

                        unset($deleteArray[$v]);
                        // dd($deleteArray);
                        $deleteArray = array_values($deleteArray);
                        $data= Delivered::where(['companyID' =>$companyID])->update([
                             'counter'=> count($deleteArray),
                             'load' => $deleteArray,
                             ]);
                        $arrbankData = array('status' => 'success', 'message' => 'Status Changed successfully.'); 
                        return json_encode($arrbankData);
                    }
                    else
                    {
                        try
                        {
                            if(Invoiced::create([
                                '_id' => 1,
                                'companyID' => $companyID,
                                'counter' => 1,
                                'load' => $accountData,
                            ])) 
                            {
                                $arrbankData = array('status' => 'success', 'message' => 'Bank Details added successfully.'); 
                                return json_encode($arrbankData);
                            }
                        }
                        catch(\Exception $error)
                        {
                            return $error->getMessage();
                        }
                    }
                }
            }
                          
        }
        elseif($status=="Invoiced")
        {
            if($status=="Complate")
            {
                $Delivered=Complate::where('companyID',$companyID)->get();
                foreach( $Delivered as  $Delivered_data)
                {
                    if($Delivered_data)
                    {
                        $DeliveredArray=$Delivered_data->load;
                        $ids=array();
                        foreach( $DeliveredArray as $key=> $admin_delivered_id)
                        {
                            $ids[]=$admin_delivered_id['_id'];
                        }
                        $ids=max($ids);
                        $totalDeliveredArray=$ids+1;
                    }
                    else
                    {
                        $totalDeliveredArray=0; 
                    }
                    $accountData[]=array(    
                        '_id' => $data->_id,
                        'active_type' => $data->active_type,
                        'advance_charges' => $data->advance_charges,
                        'broker_driver' => $data->broker_driver,
                        'broker_driver_contact' => $data->broker_driver_contact,
                        'broker_trailer'=>$data->broker_trailer,
                        'broker_truck'=>$data->broker_truck,
                        // 'carDays'=>$data->openingBalance,
                        'carrier_email'=>$data->carrier_email,
                        'carrier_name '=>$data->carrier_name,
                        'carrier_other_modal' =>$data->carrier_other_modal,
                        // 'carrier_rate'=>'',
                        'carrier_parent'=>$data->carrier_parent,
                        'carrier_total'=>$data->carrier_total,
                        'cnno'=>$data->cnno,
                        'company'=>$data->company,
                        'consignee'=>$data->consignee,
                        'consignee_pickup'=>$data->consignee_pickup,
                        'currency'=>$data->currency,
                        // 'custDays'=>'',
                        'customer'=>$data->customer,
                        'customer_email'=>$data->customer_email,
                        'customer_parent'=>$data->customer_parent,
                        'dispatcher'=>$data->dispatcher,
                        'driver_miles_value'=>$data->driver_miles_value,
                        'driver_name'=>$data->driver_name,
                        'driver_other'=>$data->driver_other,
                        'driver_other_modal'=>$data->driver_other_modal,
                        'driver_parent'=>$data->driver_parent,
                        'driver_total'=>$data->driver_total,
                        'empty_mile'=>$data->empty_mile,
                        'empty_miles_value'=>$data->empty_miles_value,
                        'end_location'=>$data->empty_mile,
                        'equipment_type'=>$data->equipment_type,
                        'file'=>$data->file,
                        'flat'=>$data->flat,
                        'flat_rate'=>$data->flat_rate,
                        'fsc'=>$data->fsc,
                        'fsc_percentage'=>$data->fsc_percentage,
                        'isBroker'=>$data->isBroker,
                        'isIfta'=>$data->isIfta,
                        'isIftaVerified'=>$data->isIftaVerified,
                        'is_unit_on'=>$data->is_unit_on,
                        'load_notes'=>$data->load_notes,
                        'loaddata'=>$data->loaddata,
                        'loaded_mile'=>$data->loaded_mile,
                        'loaded_miles_value'=>$data->loaded_miles_value,
                        'other_charges'=>$data->other_charges,
                        'other_charges_modal'=>$data->other_charges_modal,
                        'owner_name'=>$data->owner_name,
                        'owner_other'=>$data->owner_other,
                        'owner_other_modal'=>$data->owner_other_modal,
                        'owner_parent'=>$data->owner_parent,
                        'owner_percentage'=>$data->owner_percentage,
                        'owner_total'=>$data->owner_total,
                        'owner_trailer'=>$data->owner_trailer,
                        'owner_truck'=>$data->owner_truck,
                        'rate'=>$data->rate,
                        'receipt_status'=>$data->receipt_status,
                        'shipper'=>$data->receipt_status,
                        'shipper_pickup'=>$data->shipper_pickup,
                        'start_location'=>$data->start_location,
                        'status'=>"Invoiced",
                        'status_ArrivedConsignee_time'=>$data->status_ArrivedConsignee_time,
                        'status_ArrivedShipper_time'=>$data->status_ArrivedShipper_time,
                        'status_BreakDown_time'=>$data->status_BreakDown_time,
                        'status_Completed_time'=>$data->status_Completed_time,
                        'status_Delivered_time'=>$data->status_Delivered_time,
                        'status_Dispatched_time'=>$data->status_Dispatched_time,
                        'status_Invoiced_time'=>$data->status_Invoiced_time,
                        'status_Loaded_time'=>$data->status_Invoiced_time,
                        'status_OnRoute_time'=>$data->status_OnRoute_time,
                        'status_Open_time'=>$data->status_OnRoute_time,
                        'status_Paid_time'=>$data->status_Paid_time,
                        'status_change_user'=>$data->status_change_user,
                        'tarp'=>$data->tarp,
                        'tarp_select'=>$data->tarp_select,
                        'total_rate'=>$data->total_rate,
                        'trailer'=>'',
                        'truck'=>$data,
                        'typeofloader'=>$data->typeofloader,
                        'units'=>$data->units,
                        'created_by' => Auth::user()->userFirstName,
                        'created_time' => date('d-m-y h:i:s'),
                        'edit_by' =>Auth::user()->userName,
                        'edit_time' =>time(),
                        'deleteStatus' =>"NO",                    
                    ); 
                    if($accountData)
                    {                
                        Complate::where(['companyID' =>$companyID])->update([
                        'counter'=> $totalDeliveredArray+1,
                        'load' =>array_merge($DeliveredArray,$accountData) ,
                        ]);
                        $arrbankData = array('status' => 'success', 'message' => 'Status Changed successfully.'); 
                        return json_encode($arrbankData);


                         $DeliveredDelete=Invoiced::where('companyID',$companyID)->first();
                        // dd($DeliveredDelete);
                        $deleteArray=$DeliveredDelete->load;

                        $arrayLength=count($deleteArray);
                        $i=0;
                        $v=0;
                        for ($i=0; $i<$arrayLength; $i++){
                            $id=$DeliveredDelete->load[$i]['_id'];
                            
                            if($id==$data->_id){
                                $v=$i;
                            }
                        }
                        // dd($deleteArray[$v]);
                        // dd($deleteArray);

                        unset($deleteArray[$v]);
                        $deleteArray = array_values($deleteArray);
                        $data= Invoiced::where(['companyID' =>$companyID])->update([
                             'counter'=> count($deleteArray),
                             'load' => $deleteArray,
                             ]);
                        // dd($deleteArray);
                    }
                    else
                    {
                        try
                        {
                            if(Complate::create([
                                '_id' => 1,
                                'companyID' => $companyID,
                                'counter' => 1,
                                'load' => $accountData,
                            ])) 
                            {
                                $arrbankData = array('status' => 'success', 'message' => 'Bank Details added successfully.'); 
                                return json_encode($arrbankData);
                            }
                        }
                        catch(\Exception $error)
                        {
                            return $error->getMessage();
                        }
                    }
                }
            }
            if($status=="Delivered")
            {
                // dd($status);
                $Delivered=Delivered::where('companyID',$companyID)->get();
                foreach( $Delivered as  $Delivered_data)
                {
                    if($Delivered_data)
                    {
                        $DeliveredArray=$Delivered_data->load;
                        $ids=array();
                        foreach( $DeliveredArray as $key=> $admin_delivered_id)
                        {
                            $ids[]=$admin_delivered_id['_id'];
                        }
                        $ids=max($ids);
                        $totalDeliveredArray=$ids+1;
                    }
                    else
                    {
                        $totalDeliveredArray=0; 
                    }
                    $accountData[]=array(    
                        '_id' => $data->_id,
                        'active_type' => $data->active_type,
                        'advance_charges' => $data->advance_charges,
                        'broker_driver' => $data->broker_driver,
                        'broker_driver_contact' => $data->broker_driver_contact,
                        'broker_trailer'=>$data->broker_trailer,
                        'broker_truck'=>$data->broker_truck,
                        // 'carDays'=>$data->openingBalance,
                        'carrier_email'=>$data->carrier_email,
                        'carrier_name '=>$data->carrier_name,
                        'carrier_other_modal' =>$data->carrier_other_modal,
                        // 'carrier_rate'=>'',
                        'carrier_parent'=>$data->carrier_parent,
                        'carrier_total'=>$data->carrier_total,
                        'cnno'=>$data->cnno,
                        'company'=>$data->company,
                        'consignee'=>$data->consignee,
                        'consignee_pickup'=>$data->consignee_pickup,
                        'currency'=>$data->currency,
                        // 'custDays'=>'',
                        'customer'=>$data->customer,
                        'customer_email'=>$data->customer_email,
                        'customer_parent'=>$data->customer_parent,
                        'dispatcher'=>$data->dispatcher,
                        'driver_miles_value'=>$data->driver_miles_value,
                        'driver_name'=>$data->driver_name,
                        'driver_other'=>$data->driver_other,
                        'driver_other_modal'=>$data->driver_other_modal,
                        'driver_parent'=>$data->driver_parent,
                        'driver_total'=>$data->driver_total,
                        'empty_mile'=>$data->empty_mile,
                        'empty_miles_value'=>$data->empty_miles_value,
                        'end_location'=>$data->empty_mile,
                        'equipment_type'=>$data->equipment_type,
                        'file'=>$data->file,
                        'flat'=>$data->flat,
                        'flat_rate'=>$data->flat_rate,
                        'fsc'=>$data->fsc,
                        'fsc_percentage'=>$data->fsc_percentage,
                        'isBroker'=>$data->isBroker,
                        'isIfta'=>$data->isIfta,
                        'isIftaVerified'=>$data->isIftaVerified,
                        'is_unit_on'=>$data->is_unit_on,
                        'load_notes'=>$data->load_notes,
                        'loaddata'=>$data->loaddata,
                        'loaded_mile'=>$data->loaded_mile,
                        'loaded_miles_value'=>$data->loaded_miles_value,
                        'other_charges'=>$data->other_charges,
                        'other_charges_modal'=>$data->other_charges_modal,
                        'owner_name'=>$data->owner_name,
                        'owner_other'=>$data->owner_other,
                        'owner_other_modal'=>$data->owner_other_modal,
                        'owner_parent'=>$data->owner_parent,
                        'owner_percentage'=>$data->owner_percentage,
                        'owner_total'=>$data->owner_total,
                        'owner_trailer'=>$data->owner_trailer,
                        'owner_truck'=>$data->owner_truck,
                        'rate'=>$data->rate,
                        'receipt_status'=>$data->receipt_status,
                        'shipper'=>$data->receipt_status,
                        'shipper_pickup'=>$data->shipper_pickup,
                        'start_location'=>$data->start_location,
                        'status'=>"Invoiced",
                        'status_ArrivedConsignee_time'=>$data->status_ArrivedConsignee_time,
                        'status_ArrivedShipper_time'=>$data->status_ArrivedShipper_time,
                        'status_BreakDown_time'=>$data->status_BreakDown_time,
                        'status_Completed_time'=>$data->status_Completed_time,
                        'status_Delivered_time'=>$data->status_Delivered_time,
                        'status_Dispatched_time'=>$data->status_Dispatched_time,
                        'status_Invoiced_time'=>$data->status_Invoiced_time,
                        'status_Loaded_time'=>$data->status_Invoiced_time,
                        'status_OnRoute_time'=>$data->status_OnRoute_time,
                        'status_Open_time'=>$data->status_OnRoute_time,
                        'status_Paid_time'=>$data->status_Paid_time,
                        'status_change_user'=>$data->status_change_user,
                        'tarp'=>$data->tarp,
                        'tarp_select'=>$data->tarp_select,
                        'total_rate'=>$data->total_rate,
                        'trailer'=>'',
                        'truck'=>$data,
                        'typeofloader'=>$data->typeofloader,
                        'units'=>$data->units,
                        'created_by' => Auth::user()->userFirstName,
                        'created_time' => date('d-m-y h:i:s'),
                        'edit_by' =>Auth::user()->userName,
                        'edit_time' =>time(),
                        'deleteStatus' =>"NO",                    
                    ); 
                    // dd( $accountData);
                    if($accountData)
                    {                
                        Delivered::where(['companyID' =>$companyID])->update([
                        'counter'=> $totalDeliveredArray+1,
                        'load' =>array_merge($DeliveredArray,$accountData) ,
                        ]);
                        $DeliveredDelete=Invoiced::where('companyID',$companyID)->first();
                        // dd($DeliveredDelete);
                        $deleteArray=$DeliveredDelete->load;

                        $arrayLength=count($deleteArray);
                        $i=0;
                        $v=0;
                        for ($i=0; $i<$arrayLength; $i++){
                            $id=$DeliveredDelete->load[$i]['_id'];
                            
                            if($id==$data->_id){
                                $v=$i;
                            }
                        }
                        // dd($deleteArray[$v]);
                        // dd($deleteArray);

                        unset($deleteArray[$v]);
                        unset($deleteArray[$v]);
                        $deleteArray = array_values($deleteArray);
                        $data= Invoiced::where(['companyID' =>$companyID])->update([
                             'counter'=> count($deleteArray),
                             'load' => $deleteArray,
                             ]);
                        // dd($deleteArray);

                        $arrbankData = array('status' => 'success', 'message' => 'Status Changed successfully.'); 
                        return json_encode($arrbankData);
                    }
                    else
                    {
                        try
                        {
                            if(Delivered::create([
                                '_id' => 1,
                                'companyID' => $companyID,
                                'counter' => 1,
                                'load' => $accountData,
                            ])) 
                            {
                                $arrbankData = array('status' => 'success', 'message' => 'Bank Details added successfully.'); 
                                return json_encode($arrbankData);
                            }
                        }
                        catch(\Exception $error)
                        {
                            return $error->getMessage();
                        }
                    }
                }
            }
        }
        // elseif($status=="Complate")
        // {
        //     if($status=="Invoiced")
        //     {
        //         $Delivered=Invoiced::where('companyID',$companyID)->get();
        //         foreach( $Delivered as  $Delivered_data)
        //         {
        //             if($Delivered_data)
        //             {
        //                 $DeliveredArray=$Delivered_data->load;
        //                 $ids=array();
        //                 foreach( $DeliveredArray as $key=> $admin_delivered_id)
        //                 {
        //                     $ids[]=$admin_delivered_id['_id'];
        //                 }
        //                 $ids=max($ids);
        //                 $totalDeliveredArray=$ids+1;
        //             }
        //             else
        //             {
        //                 $totalDeliveredArray=0; 
        //             }
        //             $accountData[]=array(    
        //                 '_id' => $data->_id,
        //                 'active_type' => $data->active_type,
        //                 'advance_charges' => $data->advance_charges,
        //                 'broker_driver' => $data->broker_driver,
        //                 'broker_driver_contact' => $data->broker_driver_contact,
        //                 'broker_trailer'=>$data->broker_trailer,
        //                 'broker_truck'=>$data->broker_truck,
        //                 // 'carDays'=>$data->openingBalance,
        //                 'carrier_email'=>$data->carrier_email,
        //                 'carrier_name '=>$data->carrier_name,
        //                 'carrier_other_modal' =>$data->carrier_other_modal,
        //                 // 'carrier_rate'=>'',
        //                 'carrier_parent'=>$data->carrier_parent,
        //                 'carrier_total'=>$data->carrier_total,
        //                 'cnno'=>$data->cnno,
        //                 'company'=>$data->company,
        //                 'consignee'=>$data->consignee,
        //                 'consignee_pickup'=>$data->consignee_pickup,
        //                 'currency'=>$data->currency,
        //                 // 'custDays'=>'',
        //                 'customer'=>$data->customer,
        //                 'customer_email'=>$data->customer_email,
        //                 'customer_parent'=>$data->customer_parent,
        //                 'dispatcher'=>$data->dispatcher,
        //                 'driver_miles_value'=>$data->driver_miles_value,
        //                 'driver_name'=>$data->driver_name,
        //                 'driver_other'=>$data->driver_other,
        //                 'driver_other_modal'=>$data->driver_other_modal,
        //                 'driver_parent'=>$data->driver_parent,
        //                 'driver_total'=>$data->driver_total,
        //                 'empty_mile'=>$data->empty_mile,
        //                 'empty_miles_value'=>$data->empty_miles_value,
        //                 'end_location'=>$data->empty_mile,
        //                 'equipment_type'=>$data->equipment_type,
        //                 'file'=>$data->file,
        //                 'flat'=>$data->flat,
        //                 'flat_rate'=>$data->flat_rate,
        //                 'fsc'=>$data->fsc,
        //                 'fsc_percentage'=>$data->fsc_percentage,
        //                 'isBroker'=>$data->isBroker,
        //                 'isIfta'=>$data->isIfta,
        //                 'isIftaVerified'=>$data->isIftaVerified,
        //                 'is_unit_on'=>$data->is_unit_on,
        //                 'load_notes'=>$data->load_notes,
        //                 'loaddata'=>$data->loaddata,
        //                 'loaded_mile'=>$data->loaded_mile,
        //                 'loaded_miles_value'=>$data->loaded_miles_value,
        //                 'other_charges'=>$data->other_charges,
        //                 'other_charges_modal'=>$data->other_charges_modal,
        //                 'owner_name'=>$data->owner_name,
        //                 'owner_other'=>$data->owner_other,
        //                 'owner_other_modal'=>$data->owner_other_modal,
        //                 'owner_parent'=>$data->owner_parent,
        //                 'owner_percentage'=>$data->owner_percentage,
        //                 'owner_total'=>$data->owner_total,
        //                 'owner_trailer'=>$data->owner_trailer,
        //                 'owner_truck'=>$data->owner_truck,
        //                 'rate'=>$data->rate,
        //                 'receipt_status'=>$data->receipt_status,
        //                 'shipper'=>$data->receipt_status,
        //                 'shipper_pickup'=>$data->shipper_pickup,
        //                 'start_location'=>$data->start_location,
        //                 'status'=>"Invoiced",
        //                 'status_ArrivedConsignee_time'=>$data->status_ArrivedConsignee_time,
        //                 'status_ArrivedShipper_time'=>$data->status_ArrivedShipper_time,
        //                 'status_BreakDown_time'=>$data->status_BreakDown_time,
        //                 'status_Completed_time'=>$data->status_Completed_time,
        //                 'status_Delivered_time'=>$data->status_Delivered_time,
        //                 'status_Dispatched_time'=>$data->status_Dispatched_time,
        //                 'status_Invoiced_time'=>$data->status_Invoiced_time,
        //                 'status_Loaded_time'=>$data->status_Invoiced_time,
        //                 'status_OnRoute_time'=>$data->status_OnRoute_time,
        //                 'status_Open_time'=>$data->status_OnRoute_time,
        //                 'status_Paid_time'=>$data->status_Paid_time,
        //                 'status_change_user'=>$data->status_change_user,
        //                 'tarp'=>$data->tarp,
        //                 'tarp_select'=>$data->tarp_select,
        //                 'total_rate'=>$data->total_rate,
        //                 'trailer'=>'',
        //                 'truck'=>$data,
        //                 'typeofloader'=>$data->typeofloader,
        //                 'units'=>$data->units,
        //                 'created_by' => Auth::user()->userFirstName,
        //                 'created_time' => date('d-m-y h:i:s'),
        //                 'edit_by' =>Auth::user()->userName,
        //                 'edit_time' =>time(),
        //                 'deleteStatus' =>"NO",                    
        //             ); 
        //             if($accountData)
        //             {                
        //                 Invoiced::where(['companyID' =>$companyID])->update([
        //                 'counter'=> $totalDeliveredArray+1,
        //                 'load' =>array_merge($DeliveredArray,$accountData) ,
        //                 ]);
        //                 $arrbankData = array('status' => 'success', 'message' => 'Status Changed successfully.'); 
        //                 return json_encode($arrbankData);
        //                  $DeliveredDelete=Completed::where('companyID',$companyID)->first();
        //                 // dd($DeliveredDelete);
        //                 $deleteArray=$DeliveredDelete->load;

        //                 $arrayLength=count($deleteArray);
        //                 $i=0;
        //                 $v=0;
        //                 for ($i=0; $i<$arrayLength; $i++){
        //                     $id=$DeliveredDelete->load[$i]['_id'];
                            
        //                     if($id==$data->_id){
        //                         $v=$i;
        //                     }
        //                 }
        //                 // dd($deleteArray[$v]);
        //                 // dd($deleteArray);

        //                 unset($deleteArray[$v]);
        //                 // dd($deleteArray);
        //             }
        //             else
        //             {
        //                 try
        //                 {
        //                     if(Invoiced::create([
        //                         '_id' => 1,
        //                         'companyID' => $companyID,
        //                         'counter' => 1,
        //                         'load' => $accountData,
        //                     ])) 
        //                     {
        //                         $arrbankData = array('status' => 'success', 'message' => 'Bank Details added successfully.'); 
        //                         return json_encode($arrbankData);
        //                     }
        //                 }
        //                 catch(\Exception $error)
        //                 {
        //                     return $error->getMessage();
        //                 }
        //             }
        //         }
        //     }
        //     if($status=="Delivered")
        //     {
        //         // dd($status);
        //         $Delivered=Delivered::where('companyID',$companyID)->get();
        //         foreach( $Delivered as  $Delivered_data)
        //         {
        //             if($Delivered_data)
        //             {
        //                 $DeliveredArray=$Delivered_data->load;
        //                 $ids=array();
        //                 foreach( $DeliveredArray as $key=> $admin_delivered_id)
        //                 {
        //                     $ids[]=$admin_delivered_id['_id'];
        //                 }
        //                 $ids=max($ids);
        //                 $totalDeliveredArray=$ids+1;
        //             }
        //             else
        //             {
        //                 $totalDeliveredArray=0; 
        //             }
        //             $accountData[]=array(    
        //                 '_id' => $data->_id,
        //                 'active_type' => $data->active_type,
        //                 'advance_charges' => $data->advance_charges,
        //                 'broker_driver' => $data->broker_driver,
        //                 'broker_driver_contact' => $data->broker_driver_contact,
        //                 'broker_trailer'=>$data->broker_trailer,
        //                 'broker_truck'=>$data->broker_truck,
        //                 // 'carDays'=>$data->openingBalance,
        //                 'carrier_email'=>$data->carrier_email,
        //                 'carrier_name '=>$data->carrier_name,
        //                 'carrier_other_modal' =>$data->carrier_other_modal,
        //                 // 'carrier_rate'=>'',
        //                 'carrier_parent'=>$data->carrier_parent,
        //                 'carrier_total'=>$data->carrier_total,
        //                 'cnno'=>$data->cnno,
        //                 'company'=>$data->company,
        //                 'consignee'=>$data->consignee,
        //                 'consignee_pickup'=>$data->consignee_pickup,
        //                 'currency'=>$data->currency,
        //                 // 'custDays'=>'',
        //                 'customer'=>$data->customer,
        //                 'customer_email'=>$data->customer_email,
        //                 'customer_parent'=>$data->customer_parent,
        //                 'dispatcher'=>$data->dispatcher,
        //                 'driver_miles_value'=>$data->driver_miles_value,
        //                 'driver_name'=>$data->driver_name,
        //                 'driver_other'=>$data->driver_other,
        //                 'driver_other_modal'=>$data->driver_other_modal,
        //                 'driver_parent'=>$data->driver_parent,
        //                 'driver_total'=>$data->driver_total,
        //                 'empty_mile'=>$data->empty_mile,
        //                 'empty_miles_value'=>$data->empty_miles_value,
        //                 'end_location'=>$data->empty_mile,
        //                 'equipment_type'=>$data->equipment_type,
        //                 'file'=>$data->file,
        //                 'flat'=>$data->flat,
        //                 'flat_rate'=>$data->flat_rate,
        //                 'fsc'=>$data->fsc,
        //                 'fsc_percentage'=>$data->fsc_percentage,
        //                 'isBroker'=>$data->isBroker,
        //                 'isIfta'=>$data->isIfta,
        //                 'isIftaVerified'=>$data->isIftaVerified,
        //                 'is_unit_on'=>$data->is_unit_on,
        //                 'load_notes'=>$data->load_notes,
        //                 'loaddata'=>$data->loaddata,
        //                 'loaded_mile'=>$data->loaded_mile,
        //                 'loaded_miles_value'=>$data->loaded_miles_value,
        //                 'other_charges'=>$data->other_charges,
        //                 'other_charges_modal'=>$data->other_charges_modal,
        //                 'owner_name'=>$data->owner_name,
        //                 'owner_other'=>$data->owner_other,
        //                 'owner_other_modal'=>$data->owner_other_modal,
        //                 'owner_parent'=>$data->owner_parent,
        //                 'owner_percentage'=>$data->owner_percentage,
        //                 'owner_total'=>$data->owner_total,
        //                 'owner_trailer'=>$data->owner_trailer,
        //                 'owner_truck'=>$data->owner_truck,
        //                 'rate'=>$data->rate,
        //                 'receipt_status'=>$data->receipt_status,
        //                 'shipper'=>$data->receipt_status,
        //                 'shipper_pickup'=>$data->shipper_pickup,
        //                 'start_location'=>$data->start_location,
        //                 'status'=>"Invoiced",
        //                 'status_ArrivedConsignee_time'=>$data->status_ArrivedConsignee_time,
        //                 'status_ArrivedShipper_time'=>$data->status_ArrivedShipper_time,
        //                 'status_BreakDown_time'=>$data->status_BreakDown_time,
        //                 'status_Completed_time'=>$data->status_Completed_time,
        //                 'status_Delivered_time'=>$data->status_Delivered_time,
        //                 'status_Dispatched_time'=>$data->status_Dispatched_time,
        //                 'status_Invoiced_time'=>$data->status_Invoiced_time,
        //                 'status_Loaded_time'=>$data->status_Invoiced_time,
        //                 'status_OnRoute_time'=>$data->status_OnRoute_time,
        //                 'status_Open_time'=>$data->status_OnRoute_time,
        //                 'status_Paid_time'=>$data->status_Paid_time,
        //                 'status_change_user'=>$data->status_change_user,
        //                 'tarp'=>$data->tarp,
        //                 'tarp_select'=>$data->tarp_select,
        //                 'total_rate'=>$data->total_rate,
        //                 'trailer'=>'',
        //                 'truck'=>$data,
        //                 'typeofloader'=>$data->typeofloader,
        //                 'units'=>$data->units,
        //                 'created_by' => Auth::user()->userFirstName,
        //                 'created_time' => date('d-m-y h:i:s'),
        //                 'edit_by' =>Auth::user()->userName,
        //                 'edit_time' =>time(),
        //                 'deleteStatus' =>"NO",                    
        //             ); 
        //             // dd( $accountData);
        //             if($accountData)
        //             {                
        //                 Delivered::where(['companyID' =>$companyID])->update([
        //                 'counter'=> $totalDeliveredArray+1,
        //                 'load' =>array_merge($DeliveredArray,$accountData) ,
        //                 ]);
        //                 $DeliveredDelete=Completed::where('companyID',$companyID)->first();
        //                 // dd($DeliveredDelete);
        //                 $deleteArray=$DeliveredDelete->load;

        //                 $arrayLength=count($deleteArray);
        //                 $i=0;
        //                 $v=0;
        //                 for ($i=0; $i<$arrayLength; $i++){
        //                     $id=$DeliveredDelete->load[$i]['_id'];
                            
        //                     if($id==$data->_id){
        //                         $v=$i;
        //                     }
        //                 }
        //                 // dd($deleteArray[$v]);
        //                 // dd($deleteArray);

        //                 unset($deleteArray[$v]);
        //                 // dd($deleteArray);

        //                 $arrbankData = array('status' => 'success', 'message' => 'Status Changed successfully.'); 
        //                 return json_encode($arrbankData);
        //             }
        //             else
        //             {
        //                 try
        //                 {
        //                     if(Delivered::create([
        //                         '_id' => 1,
        //                         'companyID' => $companyID,
        //                         'counter' => 1,
        //                         'load' => $accountData,
        //                     ])) 
        //                     {
        //                         $arrbankData = array('status' => 'success', 'message' => 'Bank Details added successfully.'); 
        //                         return json_encode($arrbankData);
        //                     }
        //                 }
        //                 catch(\Exception $error)
        //                 {
        //                     return $error->getMessage();
        //                 }
        //             }
        //         }
        //     }
        // }
    }
    public function DeleteaccountManger(Request $request)
    {
        $id=$request->id;
        $companyID=(int)Auth::user()->companyID;
        $status=$request->status;
        if($status=="Delivered")
        { 
            $DeliveredDelete=Delivered::where('companyID',$companyID)->first();
            $deleteArray=$DeliveredDelete->load;
            $arrayLength=count($deleteArray);
            $i=0;
            $v=0;
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$DeliveredDelete->load[$i]['_id'];
                $ids=(array)$ids;
                foreach($ids as $value)
                {
                    if($value==$id)
                    {
                        $v=$i;
                    }
                }
            }
            unset($deleteArray[$v]);
            $deleteArray = array_values($deleteArray);
           $data= Delivered::where(['companyID' =>$companyID])->update([
                'counter'=> count($deleteArray),
                'load' => $deleteArray,
                ]);
                if($data==true)
                {
                    $arr = array('status' => 'success', 'message' => 'Delivered delete successfully.','statusCode' => 200); 
                    return json_encode($arr);
                }

            // $deleteArray_update=[
            // 'counter'=> count($deleteArray),
            // 'load' => $deleteArray,
            // ];
        }
        elseif($status=="Invoiced")
        {
            $DeliveredDelete=Invoiced::where('companyID',$companyID)->first();
            $deleteArray=$DeliveredDelete->load;
            $arrayLength=count($deleteArray);
            $i=0;
            $v=0;
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$DeliveredDelete->load[$i]['_id'];
                $ids=(array)$ids;
                foreach($ids as $value)
                {
                    if($value==$id)
                    {
                        $v=$i;
                    }
                }
            }
            unset($deleteArray[$v]);
            $deleteArray = array_values($deleteArray);
           $data= Invoiced::where(['companyID' =>$companyID])->update([
                'counter'=> count($deleteArray),
                'load' => $deleteArray,
                ]);
                if($data==true)
                {
                    $arr = array('status' => 'success', 'message' => 'Delivered delete successfully.','statusCode' => 200); 
                    return json_encode($arr);
                }
        }
        elseif($status=="Complate")
        {
            $DeliveredDelete=Completed::where('companyID',$companyID)->first();
            $deleteArray=$DeliveredDelete->load;
            $arrayLength=count($deleteArray);
            $i=0;
            $v=0;
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$DeliveredDelete->load[$i]['_id'];
                $ids=(array)$ids;
                foreach($ids as $value)
                {
                    if($value==$id)
                    {
                        $v=$i;
                    }
                }
            }
            unset($deleteArray[$v]);
            $deleteArray = array_values($deleteArray);
           $data= Completed::where(['companyID' =>$companyID])->update([
                'counter'=> count($deleteArray),
                'load' => $deleteArray,
                ]);
                if($data==true)
                {
                    $arr = array('status' => 'success', 'message' => 'Delivered delete successfully.','statusCode' => 200); 
                    return json_encode($arr);
                }
        }
    }
    public function exportInvoices(Request $request){
        // $timezone = $data["timezone"];
        // date_default_timezone_set($timezone);
        // $collection = "Invoiced";
        $companyID=(int)Auth::user()->companyID;
            $show = Invoiced::raw()->aggregate([
                ['$match' => ['companyID' => $companyID]],
                ['$project' => ['load._id' => 1,'load.cnno' => 1,'load.shipper_pickup' => 1,'load.loaddata.customername' => 1,'load.total_rate' => 1,'load.loaddata.loadername' => 1,'load.loaddata.loadertotal' => 1,'load.status_Invoiced_time' => 1,'load.receivedate' => 1,'load.company' => 1,'load.paiddate' => 1,'load.invoice_received_date' => 1,'load.typeofloader' => 1]]
                // ['$project' => ["load._id" => 1,"load.loaddata" => 1,"load.cnno" => 1, "load.shipper_pickup" =>  1, "load.consignee_pickup" => 1,"load.status" => 1,"load.load_notes" => 1,"load.typeofloader" => 1,"load.invoice_received_date" => 1, "load.paiddate" => 1, "load.receivedate" => 1, "load.total_rate" => 1,"load.status_Invoiced_time" => 1]]
            ]);
            
            $p[] = array("Invoice",
                        "Load",
                        "Company Name",
                        "Ship Date",
                        "Customer",
                        "Load Pay",
                        "Type of Loder",
                        "Driver / Carrier /Owner Operator",
                        "Driver / Carrier /Owner Operator Pay",
                        "INV Issue Date",
                        "Rec Due Date",
                        "Rec Status",
                        "Receive Date",
                        "Invoice Received Date",
                        "Pay Due Date",
                        "Pay Status",
                        "Paid Date");
            
            $com = Company::raw()->find(['companyID' =>$companyID]);
            $fuelName = array();
            foreach ($com as $drivername) {
                $driver = $drivername['company'];
                foreach ($driver as $sd) {
                    $customerid = $sd['_id'];
                    $fuelName[$customerid] = $sd['companyName'];
                }
            }

            foreach ($show as $anly) {
                $loaddata = $anly['load'];
                foreach($loaddata as $ld) {
                    $customername = $ld['loaddata']['customername'];
                    $loadername = $ld['loaddata']['loadername'];
                    $loadertotal = $ld['loaddata']['loadertotal'];
                    $Invoice  = $ld['_id'];
                    $Load  = $ld['cnno'];
                    $typeofloder = $ld['typeofloader'];
                    $total_rate  = $ld['total_rate'];
                    if(isset($fuelName[$ld['company']]))
                    {
                        $company_Name  = $fuelName[$ld['company']];
                    }
                    else
                    {
                        $company_Name="";
                    }
                    // print($company_Name);
                    $shipper_pickup  = date('m/d/Y',$ld['shipper_pickup']);
                    $pay_due_time  = date('m/d/Y',$ld['shipper_pickup']+(86400*30));
                    $statusInvoicedTime = $ld['status_Invoiced_time'];
                    if($statusInvoicedTime != "" || $statusInvoicedTime != 0 || !empty($statusInvoicedTime) ){
                        $statusInvoicedTime = date("m/d/Y", $ld['status_Invoiced_time']);
                        $recievedDueDate = $ld['shipper_pickup'] != "" ? date("m/d/Y", strtotime ( '+1 month' ,$ld['shipper_pickup'])) : "NA";
                    }else{
                        $statusInvoicedTime = "NA";
                    }
                    if(array_key_exists('paiddate',$ld)){
                        if($ld['paiddate'] != ''){
                            $paiddate = date('m/d/Y',$ld['paiddate']);
                            $paidstatus = "Yes";
                        }else{
                            $paiddate = "";
                            $paidstatus = "No";
                        }
                    }else{
                        $paiddate = "";
                        $paidstatus = "No";
                    }
                    if(array_key_exists('invoice_received_date',$ld)){
                        if($ld['invoice_received_date'] != ''){
                            $status_Invoiced_time  = date('m/d/Y',$ld['invoice_received_date']);
                            $payDueDate  = date('m/d/Y', strtotime ( '+1 month' ,$ld['invoice_received_date']));
                        }else{
                            $status_Invoiced_time  = '';
                            $payDueDate  = '';
                        }
                        
                    }else{
                        $status_Invoiced_time  = '';
                        $payDueDate  = '';
                    }
                    if(array_key_exists('receivedate',$ld)){
                        if($ld['receivedate'] != ''){
                            $receivedate = date('m/d/Y',$ld['receivedate']);
                            $receivestatus = "Yes";
                        }else{
                            $receivedate = "";
                            $receivestatus = "No";
                        }
                        
                    }else{
                        $receivedate = "";
                        $receivestatus = "No";
                    }
                    $p[] =  array(
                        $Invoice, 
                        $Load, 
                        $company_Name, 
                        $shipper_pickup, 
                        $customername, 
                        $total_rate, 
                        $typeofloder, 
                        $loadername, 
                        $loadertotal, 
                        $statusInvoicedTime,
                        $recievedDueDate,
                        $receivestatus,
                        $receivedate,
                        $status_Invoiced_time,
                        $payDueDate,
                        $paidstatus,
                        $paiddate
                    );
                }
            }   
            echo json_encode($p);
            date_default_timezone_set("UTC");
    }

    
}
