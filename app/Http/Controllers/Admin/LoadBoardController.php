<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Open;
use App\Models\Dispatched;
use App\Models\ArrivedShipper;
use App\Models\Loaded;
use App\Models\OnRoute;
use App\Models\ArrivedConsignee;
use App\Models\Delivered;
use App\Models\BreakDown;
use App\Models\User;
// use App\Models\;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class LoadBoardController extends Controller
{
    public function getLoadboardData(Request $request){
        $companyId=auth::user()->companyID;
        $mergedArray = [];
        $Open = Open::where('companyID',$companyId)->get();
        //dd($Open);
        //$Open = Open::select('load.loaded_miles_value','load.loaddata.shippername','load.loaddata.consigneename','load.created_user','load.created_at','load.edit_by','load.status_change_user.Open','load.dispatcher','load._id','load.tarp','load.empty_miles_value','_id','companyID','load._id','load.isBroker','load.typeofloader','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();
        
        $Dispatched = Dispatched::where('companyID',$companyId)->get();
        //$Dispatched = Dispatched::select('load.loaded_miles_value','load.loaddata.shippername','load.loaddata.consigneename','load.created_user','load.created_at','load.edit_by','load.status_change_user.Dispatched','load.dispatcher','load._id','load.tarp','load.empty_miles_value','_id','companyID','load._id','load.isBroker','load.typeofloader','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();
        
        $ArrivedShipper = ArrivedShipper::where('companyID',$companyId)->get();
        //$ArrivedShipper = ArrivedShipper::select('load.loaded_miles_value','load.loaddata.shippername','load.loaddata.consigneename','load.created_user','load.created_at','load.edit_by','load.status_change_user.Arrived Shipper','load.dispatcher','load._id','load.tarp','load.empty_miles_value','_id','companyID','load._id','load.isBroker','load.typeofloader','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $Loaded = Loaded::where('companyID',$companyId)->get();
        //$Loaded = Loaded::select('load.loaded_miles_value','load.loaddata.shippername','load.loaddata.consigneename','load.created_user','load.created_at','load.edit_by','load.status_change_user.Loaded','load.dispatcher','load._id','load.tarp','_id','load.empty_miles_value','companyID','load._id','load.isBroker','load.typeofloader','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $OnRoute = OnRoute::where('companyID',$companyId)->get();
        //$OnRoute = OnRoute::select('load.loaded_miles_value','load.loaddata.shippername','load.loaddata.consigneename','load.created_user','load.created_at','load.edit_by','load.status_change_user.On Route','load.dispatcher','load._id','load.tarp','_id','load.empty_miles_value','companyID','load._id','load.isBroker','load.typeofloader','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $ArrivedConsignee = ArrivedConsignee::where('companyID',$companyId)->get();
        //$ArrivedConsignee = ArrivedConsignee::select('load.loaded_miles_value','load.loaddata.shippername','load.loaddata.consigneename','load.created_user','load.created_at','load.edit_by','load.status_change_user.Arrived Consignee','load.dispatcher','load._id','load.tarp','load.empty_miles_value','_id','companyID','load._id','load.isBroker','load.typeofloader','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $Delivered = Delivered::where('companyID',$companyId)->get();
        //$Delivered = Delivered::select('load.loaded_miles_value','load.loaddata.shippername','load.loaddata.consigneename','load.created_user','load.created_at','load.edit_by','load.status_change_user.Delivered','load.dispatcher','load._id','load.tarp','load.empty_miles_value','_id','companyID','load._id','load.isBroker','load.typeofloader','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $BreakDown = BreakDown::where('companyID',$companyId)->get();
        //$BreakDown = BreakDown::select('load.loaded_miles_value','load.loaddata.shippername','load.loaddata.consigneename','load.created_user','load.created_at','load.edit_by','load.status_change_user.Break Down','load.dispatcher','load._id','load.tarp','load.empty_miles_value','_id','companyID','load._id','load.isBroker','load.typeofloader','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $user=User::get();
        $data = $Open->concat($Dispatched)->concat($ArrivedShipper)->concat($Loaded)->concat($OnRoute)->concat($ArrivedConsignee)->concat($Delivered)->concat($BreakDown);
        return response()->json(['data'=>$data,'user'=>$user]);
    }

    public function changeStatus(Request $request){
        dd( $request);
        $com_id=(int)$request->com_id;
        $id=(int)$request->id;
        $oldStatus=$request->oldSelectedValue;
        $newStatus=$request->valueSelected;
    //get old Collection
        if($oldStatus == 'Open'){
            $oldCollection = Open::where('companyID',$com_id)->first();
        }elseif($oldStatus == 'Dispatched'){
            $oldCollection = Dispatched::where('companyID',$com_id)->first();
        }elseif($oldStatus == 'Arrived Shipper'){
            $oldCollection = ArrivedShipper::where('companyID',$com_id)->first();
        }elseif($oldStatus == 'Loaded'){
            $oldCollection = Loaded::where('companyID',$com_id)->first();
        }elseif($oldStatus == 'On Route'){
            $oldCollection = OnRoute::where('companyID',$com_id)->first();
        }elseif($oldStatus == 'Arrived Consignee'){
            $oldCollection = ArrivedConsignee::where('companyID',$com_id)->first();
        }elseif($oldStatus == 'Delivered'){
            $oldCollection = Delivered::where('companyID',$com_id)->first();
        }elseif($oldStatus == 'Break Down'){
            $oldCollection = BreakDown::where('companyID',$com_id)->first();
        }
    //get old Collection object
        $loadUp=$oldCollection->load;
        $arrayLength=count($loadUp);
        $j=0;
        $k=0;
        $_id=0;

        for ($j=0; $j<$arrayLength; $j++){
            $_id=$loadUp[$j]['_id'];
            if($_id == $id){                
                $k=$j; 
                break;
            }
        }
    //update status with new status in old Collection        
        $oldCollectionResult=$oldCollection->load[$k];
        $loadUp[$k]['status']=$newStatus;
        $loadUp[$k]['edit_by']=Auth::user()->_id;
        $oldCollection->load = $loadUp;
        $oldCollection->save();
        $oldCollectionResult=$oldCollection->load[$k];
       
        
    // remove from collection
        $oldCollection_load=$oldCollection->load;
        unset($oldCollection_load[$k]);
        $oldCollection_load = array_values($oldCollection_load);

        $oldCollection_load_update=[
            'counter'=> count($oldCollection_load),
            'load' => $oldCollection_load,
        ];
        if($oldStatus == 'Open'){
            Open::where(['companyID' =>$com_id ])->update($oldCollection_load_update);
        }elseif($oldStatus == 'Dispatched'){
            Dispatched::where(['companyID' =>$com_id ])->update($oldCollection_load_update);
        }elseif($oldStatus == 'Arrived Shipper'){
            ArrivedShipper::where(['companyID' =>$com_id ])->update($oldCollection_load_update);
        }elseif($oldStatus == 'Loaded'){
            Loaded::where(['companyID' =>$com_id ])->update($oldCollection_load_update);
        }elseif($oldStatus == 'On Route'){
            OnRoute::where(['companyID' =>$com_id ])->update($oldCollection_load_update);
        }elseif($oldStatus == 'Arrived Consignee'){
            ArrivedConsignee::where(['companyID' =>$com_id ])->update($oldCollection_load_update);
        }elseif($oldStatus == 'Delivered'){
            Delivered::where(['companyID' =>$com_id ])->update($oldCollection_load_update);
        }elseif($oldStatus == 'Break Down'){
            BreakDown::where(['companyID' =>$com_id ])->update($oldCollection_load_update);
        }
    //get new Collection
        if($newStatus == 'Open'){
            $newCollection = Open::where('companyID',$com_id)->first();
        }elseif($newStatus == 'Dispatched'){
            $newCollection = Dispatched::where('companyID',$com_id)->first();
        }elseif($newStatus == 'Arrived Shipper'){
            $newCollection = ArrivedShipper::where('companyID',$com_id)->first();
        }elseif($newStatus == 'Loaded'){
            $newCollection = Loaded::where('companyID',$com_id)->first();
        }elseif($newStatus == 'On Route'){
            $newCollection = OnRoute::where('companyID',$com_id)->first();
        }elseif($newStatus == 'Arrived Consignee'){
            $newCollection = ArrivedConsignee::where('companyID',$com_id)->first();
        }elseif($newStatus == 'Delivered'){
            $newCollection = Delivered::where('companyID',$com_id)->first();
        }elseif($newStatus == 'Break Down'){
            $newCollection = BreakDown::where('companyID',$com_id)->first();
        }

    //add data in new Collection        
        $oldstatusData=array($oldCollectionResult);
        try{
            if($newCollection){
                $totalArray=count($newCollection->load);
            }else{
                $totalArray=0; 
            }

            $data = ['success' => true,'message'=> 'Status Changed successfully'] ;
            
            if($newCollection){
                $newCollectionArray=$newCollection->load;
                $updateData=[
                    'counter'=> $totalArray+1,
                    'load' =>array_merge($newCollectionArray,$oldstatusData) ,
                ];

                if($newStatus == 'Open'){
                    Open::where(['companyID' =>$com_id ])->update($updateData);
                }elseif($newStatus == 'Dispatched'){
                    Dispatched::where(['companyID' =>$com_id ])->update($updateData);
                }elseif($newStatus == 'Arrived Shipper'){
                    ArrivedShipper::where(['companyID' =>$com_id ])->update($updateData);
                }elseif($newStatus == 'Loaded'){
                    Loaded::where(['companyID' =>$com_id ])->update($updateData);
                }elseif($newStatus == 'On Route'){
                    OnRoute::where(['companyID' =>$com_id ])->update($updateData);
                }elseif($newStatus == 'Arrived Consignee'){
                    ArrivedConsignee::where(['companyID' =>$com_id ])->update($updateData);
                }elseif($newStatus == 'Delivered'){
                    Delivered::where(['companyID' =>$com_id ])->update($updateData);
                }elseif($newStatus == 'Break Down'){
                    BreakDown::where(['companyID' =>$com_id ])->update($updateData);
                }
                
                //$data; 
                return response()->json($data);
            }else{
                $updateData=[
                    '_id' => '',
                    'companyID' => $com_id,
                    'counter' => 1,
                    'load' => $oldCollectionResult,
                ];
                // if(Open::create($updateData)) {
                //     $data;
                //    // return response()->json($data);
                // }
                if($newStatus == 'Open'){Open::create($updateData);
                }elseif($newStatus == 'Dispatched'){ Dispatched::create($updateData);
                }elseif($newStatus == 'Arrived Shipper'){ ArrivedShipper::create($updateData);
                }elseif($newStatus == 'Loaded'){ Loaded::create($updateData);
                }elseif($newStatus == 'On Route'){ OnRoute::create($updateData);
                }elseif($newStatus == 'Arrived Consignee'){ ArrivedConsignee::create($updateData);
                }elseif($newStatus == 'Delivered'){ Delivered::create($updateData);
                }elseif($newStatus == 'Break Down'){ BreakDown::create($updateData);
                }
                
                //$data;
                return response()->json($data); 
            }
        } 
        catch(\Exception $error){
            return $error->getMessage();
        }
        
       
    }

    public function addLoadBoard(Request $request){
        // $unserializeData = [];
        // parse_str($request->data,$unserializeData);
        // $shipper_load_type=$unserializeData['shipperName'];
        // $shipper_name=explode('-',$shipper_load_type[1]);
        // dd($shipper_name[0]);
        //die;
        $obj_size=3500;
        $companyID=Auth::user()->companyID;
        $totalArray=0;
        $getCompany = Open::where('companyID',$companyID)->get();
        $totalCompany=count($getCompany);

        //shipper
        $unserializeData = [];
        parse_str($request->data_shipper,$unserializeData);
        
        if(isset($unserializeData['shipperName'])){
            foreach($unserializeData['shipperName'] as $key => $val){
                $shipper_name=explode('-',$unserializeData['shipperName'][$key]);
                $shipper[]=((object)[
                    'shipper_name'=>(string)$shipper_name[0],
                    'shipper_address'=>(string)$unserializeData['shipperaddress'][$key],
                    'shipper_location'=>(string)$unserializeData['shipperLocation'][$key],
                    'shipper_pickup'=>(boolean)strtotime($unserializeData['shipperdate'][$key]),
                    'shipper_picktime'=>(string)$unserializeData['shippertime'][$key],
                    'shipper_load_type'=>(string)$unserializeData['loadType'][$key],
                    'shipper_commodity'=>(string)$unserializeData['shippercommodity'][$key],
                    'shipper_qty'=>(string)$unserializeData['shipperqty'][$key],
                    'shipper_weight'=>(string)$unserializeData['shipperweight'][$key],
                    'shipper_pickup_number'=>(string)$unserializeData['shipperpickup'][$key],
                    'shipper_seq'=>(string)$unserializeData['shipseq'][$key],
                    'shipper_notes'=>(string)$unserializeData['shippernotes'][$key],
                    // 'shipperparent'=>(string)$unserializeData[''][$key],
                    'shipperparent'=>'0',
                ]);        
            }
        }else{
            $shipper=array();
        }
        //consignee
        $unserializeData1 = [];
        parse_str($request->data_consignee,$unserializeData1);
        
        if(isset($unserializeData1['consigneelist'])){
            foreach($unserializeData1['consigneelist'] as $key => $val){
                $consignee_name=explode('-',$unserializeData1['consigneelist'][$key]);
                $consignee[]=((object)[
                    'consignee_name'=>(string)$consignee_name[0],
                    'consignee_address'=>(string)$unserializeData1['consigneeaddress'][$key],
                    'consignee_location'=>(string)$unserializeData1['activeconsignee'][$key],
                    'consignee_pickup'=>(boolean)strtotime($unserializeData1['consigneepickdate'][$key]),
                    'consignee_picktime'=>(string)$unserializeData1['consigneepicktime'][$key],
                    'consignee_load_type'=>(string)$unserializeData1['ctl'][$key],
                    'consignee_commodity'=>(string)$unserializeData1['consigneecommodity'][$key],
                    'consignee_qty'=>(string)$unserializeData1['consigneeqty'][$key],
                    'consignee_weight'=>(string)$unserializeData1['consigneeweight'][$key],
                    'consignee_delivery_number'=>(string)$unserializeData1['consigneedelivery'][$key],
                    'consignee_seq'=>(string)$unserializeData1['consigseq'][$key],
                    'consignee_notes'=>(string)$unserializeData1['deliverynotes'][$key],
                    // 'consigneeparent'=>$unserializeData[''][$key],
                    'consigneeparent'=>'',
                ]);        
            }
        }else{
            $consignee=array();
        }
        //other_charges_modal
        $unserializeData2 = [];
        if(isset($request->data_other_charges)){
            parse_str($request->data_other_charges,$unserializeData2);
        }
        if(isset($unserializeData2['description'])){
            foreach($unserializeData2['description'] as $key => $val){
                $other_charges_modal[]=((object)[
                    'description'=>$unserializeData2['description'][$key],
                    'amount'=>$unserializeData2['amount'][$key],
                ]);        
            }
        }else{
            $other_charges_modal=array();
        }
        //carrier_other_modal
        $unserializeData3 = [];
        if(isset($request->data_carrier_other_modal)){
            parse_str($request->data_carrier_other_modal,$unserializeData3);
        }
        if(isset($unserializeData3['description'])){
            foreach($unserializeData3['description'] as $key => $val){
                $carrier_other_modal[]=((object)[
                    'description'=>$unserializeData3['description'][$key],
                    'advance'=>$unserializeData3['advance'][$key],
                    'amount'=>$unserializeData3['amount'][$key],

                ]);        
            }
        }else{
            $carrier_other_modal=array();
        }

        //driver_other_modal
        $unserializeData4 = [];
        if(isset($request->data_driver_other_modal)){
            parse_str($request->data_driver_other_modal,$unserializeData4);
        }
        if(isset($unserializeData4['description'])){
            foreach($unserializeData4['description'] as $key => $val){
                $driver_other_modal[]=((object)[
                    'description'=>$unserializeData4['description'][$key],
                    'amount'=>$unserializeData4['amount'][$key],
                ]);        
            }
        }else{
            $driver_other_modal=array();
        }
        //owner_other_modal
        $unserializeData5 = [];
        if(isset($request->data_owner_other_modal)){
            parse_str($request->data_owner_other_modal,$unserializeData5);
        }
        if(isset($unserializeData5['description'])){
            foreach($unserializeData5['description'] as $key => $val){
                $owner_other_modal[]=((object)[
                    'description'=>$unserializeData5['description'][$key],
                    'amount'=>$unserializeData5['amount'][$key],
                ]);        
            }
        }else{
            $owner_other_modal=array();
        }
        //owner_other_modal
        $unserializeData6 = [];
        if(isset($request->data_file)){
            parse_str($request->data_file,$unserializeData6);
        }
        if(isset($unserializeData6['file'])){
            foreach($unserializeData6['file'] as $key => $val){
                $file[]=((object)[
                    'file'=>$unserializeData6['file'][$key],
                ]);        
            }
        }else{
            $file=array();
        }
        $customer_email[]=((object)[
            'CustomerEmail'=>(string)$request->CustomerEmail,
            'emailcustomer2'=>(string)$request->emailcustomer2,
            'emailcustomer3'=>(string)$request->emailcustomer3,
        ]);
        $carrier_email[]=((object)[
            'CarrierEmail'=>(string)$request->CarrierEmail,
            'email2'=>(string)$request->email2,
            'email3'=>(string)$request->email3,
        ]);
        $Data[]=array(    
            '_id' => 1,
            'loaddata' => $loaddata=((object)[
                'customername'=>(string)$request->customername,
                'loadername'=>(string)$request->loadername,
                'loadertruck'=>(string)$request->loadertruck,
                'loadertrailer'=>(string)$request->loadertrailer,
                'shippername'=>(string)'',
                'consigneename'=>(string)'',
                'loadertotal'=>(string)$request->loadertotal,
            ]),
            'company' => (string)$request->company,
            'customer' =>(string) $request->customer,
            'dispatcher' =>(string) $request->dispatcher,
            'cnno' => (string)$request->cnno,
            'status' =>(string) $request->status,

            'active_type' =>(string) $request->active_type,
            'rate' =>(double) $request->rate,
            'units' => $request->noofunits,
            'fsc' => (string)$request->fsc,
            'fsc_percentage' =>(string) $request->fsc_percentage,
            'other_charges' =>(string)$request->other_charges,
            'other_charges_modal' => $other_charges_modal, //array
            'total_rate' =>(string) $request->setTotalRate,
            'equipment_type' =>(string) $request->equipment_type,
            'typeofloader' =>(string) $request->typeofLoader,
            'carrier_name' =>(string) $request->carrier_name,
            'flat_rate' =>(double) $request->flat_rate,
            'isIfta'=> (string)$request->isIfta,
            'advance_charges' =>(string) $request->advance_charges,
            'carrier_other_modal' => $carrier_other_modal,//array
            'carrier_total' =>(string) $request->carrier_total,
            'currency' =>(string) $request->currency,
            'driver_name' =>(string) $request->driver_name,
            'truck' => (string)$request->truck,
            'trailer' => (string)$request->trailer,
            'loaded_mile' =>(string) $request->loaded_mile,
            'empty_mile' =>(string) $request->empty_mile,
            'driver_other' =>(string) $request->driver_other,
            'driver_other_modal' => $driver_other_modal,//array
            'tarp' => (string)$request->tarp,
            'flat' =>(string) $request->flat,
            'driver_total' =>(string) $request->driver_total,
            'owner_name' =>(string) $request->owner_name,
            'owner_percentage' =>(string) $request->owner_percentage,
            'owner_truck' =>(string) $request->owner_truck,
            'owner_trailer' =>(string) $request->owner_trailer,
            'owner_other' => (string)$request->owner_other,
            'owner_other_modal' => $owner_other_modal,//array
            'owner_total' =>(string) $request->owner_total,
            'start_location' =>(string) $request->startlocation,
            'end_location' => (string)$request->endlocation,
            'shipper' => $shipper,//array
            'consignee' => $consignee,//array
            'tarp_select' => (string)$request->tarp_select,
            'loaded_miles_value' =>(string) $request->loaded_miles_value,
            'empty_miles_value' =>(string) $request->empty_miles_value,
            'driver_miles_value' =>(string) $request->driver_miles_value,
            'file' => $file,//array
            'load_notes' =>(string) $request->load_notes,

            'carrier_email' => $carrier_email,
            'customer_email' => $customer_email,
            'created_user' =>(int) Auth::User()->_id,
            'created_at' =>(int) strtotime(date('Y-m-d H:i:s')),
            'updated_at' =>(int) '',
            'shipper_pickup' => (boolean)strtotime($unserializeData['shipperdate'][0]),
            'consignee_pickup' => (boolean)strtotime($unserializeData1['consigneepickdate'][0]),
            'status_BreakDown_time' =>(int)0 ,
            'status_Loaded_time' =>(int) 0,
            'status_ArrivedConsignee_time' =>(int) 0,
            'status_ArrivedShipper_time' =>(int) 0,
            'status_Paid_time' =>(int) 0,
            'status_Open_time' =>(int) strtotime(date('Y-m-d H:i:s')),
            'status_OnRoute_time' => (int)0,
            'status_Dispatched_time' =>(int) 0,
            'status_Delivered_time' =>(int) 0,
            'status_Completed_time' =>(int) 0,
            'status_Invoiced_time' =>(int) 0,
            'status_change_user' => array("Open" => Auth::User()->_id,"Dispatched" => "", "Arrived Shipper" => "", "Loaded" => "", "On Route" => "","Arrived Consignee" => "","Delivered" => "", "Completed" => "", "Invoiced" => "", "Break Down" => "","Cancelled" => ""),
            'broker_driver' => (string)$request->broker_driver,
            'broker_driver_contact' =>(string) $request->broker_driver_contact,
            'broker_truck' =>(string) $request->broker_truck,
            'broker_trailer' =>(string) $request->broker_trailer,
            'is_unit_on' => (string)$request->is_unit_on,
            'carrier_parent' =>(string) $request->carrier_parent,
            'customer_parent' =>(string) $request->customer_parent,
            'driver_parent' => (string)$request->driver_parent,
            'owner_parent' => (string)$request->owner_parent,
            'isBroker' => (string)$request->isBroker,
            'isIftaVerified' =>(string)"no",
            'receipt_status' =>(int) 0,
            'cardays' =>(string) $request->custdays,
            'carDays' =>(string) $request->cardays,
            'edit_by' =>(int)'',
                );
        $loads_allCompany=0;
        
        if($getCompany){
            for($j=0; $j<$totalCompany; $j++){
                $total_load=count($getCompany[$j]->load);
                $loads_allCompany=$loads_allCompany+$total_load;
            }
                   
            $Avr_loads_allCompany=$loads_allCompany/$obj_size;
            if(is_float($Avr_loads_allCompany)){
                for($i=0; $i<$totalCompany; $i++){
                    $total_load=count($getCompany[$i]->load);
                    if($total_load<$obj_size){
                        $Array=$getCompany[$i]->load;
                        $_id=$getCompany[$i]->counter+1;
                        $Data[0]['_id']=$_id;
                        Open::where(['companyID' => $companyID])->where(['_id' => $getCompany[$i]->_id])->update([
                            'counter'=> $_id,
                            'load' =>array_merge($Array,$Data) ,
                        ]);
                        $arrr = array('status' => 'success', 'message' => 'Load  added successfully.'); 
                        return json_encode($arrr);
                    }
                }
            }else{
                $_id=$getCompany[$j-1]->counter+1;
                $Data[0]['_id']=$_id;
                try{
                    if(Open::create([
                        '_id' => (string)2,
                        'companyID' => $companyID,
                        'counter' => $_id,
                        'load' =>$Data,
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
        else{
            try{

                if(Open::create([
                    '_id' => 0,
                    'companyID' => $companyID,
                    'counter' => 1,
                    'load' => $Data,
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
}
