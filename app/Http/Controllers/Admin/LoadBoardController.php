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
use Auth;
use MongoDB\Driver\Cursor;
// use App\Models\;
use File;
use Image;


use PDF;
// use MongoDB\BSON\ObjectId;
// new \MongoDB\BSON\ObjectID;

use Illuminate\Database\Eloquent\Collection;

class LoadBoardController extends Controller
{

    public function index(Request $request){
        $companyId=Auth::user()->companyID;
        $Carrier = \App\Models\Carrier::select('carrier._id','carrier.name','carrier.deleteStatus')->where('companyID',$companyId)->get();
    //   dd($Carrier[1]);
        $truck = \App\Models\Truckadd::where('companyID',$companyId)->get();
        $Load_type = \App\Models\Load_type::where('companyID',$companyId)->get(); 
        $customer = \App\Models\Customer::where('companyID',$companyId)->get(); 
        $company = \App\Models\Company::select('company.companyName','company._id','company.deleteStatus')->where('companyID',$companyId)->get();
        $EquipmentType = \App\Models\Equipment_add::where('companyID',$companyId)->orderBy('equipment._id')->get(); 
        $driver = \App\Models\Driver::where('companyID',$companyId )->get();
        $TrailerAdminAdd = \App\Models\TrailerAdminAdd::where('companyID',$companyId)->get();
        $Consignee = \App\Models\Consignee::where('companyID',$companyId )->get();

        $user = \App\Models\User::where('id', '!=', Auth::user()->id)->where('deleteStatus',0)->orderBy('_id', 'DESC')->get();
        
        //dd($TrailerAdminAdd);
        return view('layout.Loadboard.Loadboard',['Consignee'=>$Consignee,'trailer'=>$TrailerAdminAdd,'driver'=>$driver,'company'=>$company, 'EquipmentType'=>$EquipmentType,'carrier'=>$Carrier,'truck'=>$truck,'Load_type'=>$Load_type, 'user'=>$user, 'customer'=>$customer]);
    }
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
        // dd($request);
        // die;
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
        if(isset($unserializeData2['otherDescription'])){
            foreach($unserializeData2['otherDescription'] as $key => $val){
                $other_charges_modal[]=((object)[
                    'description'=>$unserializeData2['otherDescription'][$key],
                    'amount'=>$unserializeData2['other_charges'][$key],
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
        if(isset($unserializeData3['Description_car'])){
            foreach($unserializeData3['Description_car'] as $key => $val){
                $carrier_other_modal[]=((object)[
                    'description'=>$unserializeData3['Description_car'][$key],
                    'advance'=>$unserializeData3['Advance_car'][$key],
                    'amount'=>$unserializeData3['Charges_car'][$key],

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
        if(isset($unserializeData4['Description_dri'])){
            foreach($unserializeData4['Description_dri'] as $key => $val){
                $driver_other_modal[]=((object)[
                    'description'=>$unserializeData4['Description_dri'][$key],
                    'amount'=>$unserializeData4['Amount_dri'][$key],
                ]);        
            }
        }else{
            $driver_other_modal=array();
        }
        //owner_other_modal
        $unserializeData5 = [];
        if(isset($request->data_owneroperator_other_modal)){
            parse_str($request->data_owneroperator_other_modal,$unserializeData5);
        }
        if(isset($unserializeData5['Description_own'])){
            foreach($unserializeData5['Description_own'] as $key => $val){
                $owner_other_modal[]=((object)[
                    'description'=>$unserializeData5['Description_own'][$key],
                    'amount'=>$unserializeData5['Amount_own'][$key],
                ]);        
            }
        }else{
            $owner_other_modal=array();
        }
        
       
        $path = public_path().'/CarrierFiles'; 
          // dd($path);       
        if(!File::exists($path)) {
            
        File::makeDirectory($path, $mode = 0777, true, true);
        }
        try{
            if ($files = $request->file('carrierfiles')) {
                    foreach ($request->file('carrierfiles') as $file) {
                    $name =  time().rand(0,1000).$file->getClientOriginalName();
                    $filePath=$file->move($path, $name);
                    $data[] = $name;
                    $size = File::size($filePath);
                    
                        $Carr_file[]=array(
                            '_id' => 0,
                            'mainid' =>'' ,
                            'filename' =>$name ,
                            'originalname' => $file->getClientOriginalName(),
                            'filesize' =>$size ,
                            'targetfilepath' => "CarrierFiles/".$name,
                            'index' =>0,
                        );
                        //   dd($trailerfile);
                    }
                }else{
                    $Carr_file=array();
                }
            }
        
        catch(\Exception $error){
            return $error->getMessage();
        }
        // if(isset($unserializeData6['file'])){
        //     foreach($unserializeData6['file'] as $key => $val){
        //         $file[]=((object)[
        //             'file'=>$unserializeData6['file'][$key],
        //         ]);        
        //     }
        // }else{
        //     $file=array();
        // }
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
            'file' => $Carr_file,//array
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
    public function getCarrier(Request $request){
        $id = (int)$request->carrierId;
        $parent = (int)$request->mainId;
        $payTermId = 0;
        $payDays = 0;
        
        $show1 = \App\Models\Carrier::raw()->aggregate([
            ['$match' => ['companyID' => Auth::user()->companyID]], 
            ['$match' => ['_id' => $parent]], 
            ['$unwind' => ['path' => '$carrier']], 
            ['$match' => ['carrier._id' => $id]]
        ]);
       
        $res = array("instruction" => "","email" => "", "parent" => "", "paydays" => "", "blackListed" => false);
   
        foreach ($show1 as $row) {
            $carrier = array();
            $k = 0;
            $carrier_parent = $row['_id'];
            $carrier[$k] = $row['carrier'];
            $k++;
        
            foreach ($carrier as $row) {
                $now = strtotime("now");
                $liabilityExpiry = strtotime($row['expiryDate']);
                $autoExpiry = strtotime($row['autoInsExpiryDate']);
                $cargoExpiry = strtotime($row['cargoExpiryDate']);
                if($row['insuranceLiabilityCompany'] == "" || $row['insurancePolicyNo'] == "" || $row['expiryDate'] == "" || $row['insuranceTelephone'] == "" || $row['insuranceExt'] =="" || $row['insuranceContactName'] == "" || $row['insuranceLiabilityAmount'] == "" || $row['autoInsuranceCompany'] == "" || $row['autoInsPolicyNo'] == "" || $row['autoInsExpiryDate'] == "" || $row['autoInsTelephone'] == "" || $row['autoInsExt'] == "" || $row['autoInsContactName'] == "" || $row['autoInsLiabilityAmount'] == "" || $row['cargoCompany'] == "" || $row['cargoPolicyNo'] == "" || $row['cargoExpiryDate'] == "" || $row['cargoTelephone'] == "" || $row['cargoExt'] == "" || $row['cargoContactName'] == "" || $row['cargoInsuranceAmt'] == "" || $row['WSIBNo'] == "")
                {
                        $res['instruction'] .=  "- <b style='font-weight:bold;line-height:1.5'>Some insurance fields are empty.</b>"."<br>";
                }
                if(($liabilityExpiry - $now)  <= 2592000){
                        $res['instruction'] .= "- <b style='font-weight:bold;line-height:1.5'>Liability Insurance is Expiring in less than 30 days.</b>"."<br>";
                }
                if(($autoExpiry - $now)  <= 2592000){
                        $res['instruction'] .= "- <b style='font-weight:bold;line-height:1.5'>Auto Insurance is Expiring in less than 30 days.</b>"."<br>";
                }
                if(($cargoExpiry - $now)  <= 2592000){
                        $res['instruction'] .= "- <b style='font-weight:bold;line-height:1.5'>Cargo Insurance is Expiring in less than 30 days.</b>"."<br>";
                } 
        
                if($row['blacklisted']  == "on"){
                        $res['blackListed'] = true;
                        // $res['instruction'] .= "- <b style='color:red;font-weight:bold;line-height:1.5'>This carrier is blacklisted.</b>"."<br>";
                }
        
                $res['email'] = $row['email'];
                $res['parent'] = $carrier_parent;
                $payTermId = $row['paymentTerms'];
            }
        }
    
        $result= \App\Models\Payment_terms::raw()->aggregate([
            ['$match' => ['companyID' =>(int)Auth::user()->companyID]], 
            ['$unwind' => ['path' => '$payment']], 
            ['$match' => ['payment._id' => (int)$payTermId]]
        ]);

        foreach($result as $r) {
        
            $payment = $r['payment'];
            $paymentDays=0;
            if($payment['paymentDays']) {
                $payDays = $payment['paymentDays'];
            }
        }
        $res['paydays'] = $payDays;
        // dd($res);
        echo json_encode($res);
    }

    public function getDriver(Request $request){
        $id = (int)$request->driverId;
        $parent = (int)$request->mainId;
        $show1 =  \App\Models\Driver::raw()->aggregate([
                ['$match'=>['companyID'=>Auth::user()->companyID]],
                ['$unwind' => ['path' => '$driver']],
                ['$match' => ['driver._id' => $id]]
        ]);
        
        foreach ($show1 as $row) {
        $driver = array();
        $k = 0;
        $driver_parent = $row['_id'];
        $driver[$k] = $row['driver'];
        $k++;
        foreach ($driver as $row) {
              $now = strtotime("now");
              $licenseExpiry = $row['driverLicenseExp'];
              $nextMedical = $row['driverNextMedical'];
              $nextDrug = $row['driverNextDrugTest'];
              $passportExpiry = $row['passportExpiry'];
              $fastcardexpiry = $row['fastCardExpiry'];
              $hazmatexpiry = $row['hazmatExpiry'];
              $loadedMile = (string)$row['driverLoadedMile'];
              $emptyMile =(string) $row['driverEmptyMile'];
              $tarp = (string)$row['tarp'];
              $pickrate = $row['pickupRate'];
              $pickafter = $row['pickupAfter'];
              $droprate = $row['dropRate'];
              $dropafter = $row['dropAfter']; 
              $rate = $row['rate'];
              if ($row['percentage']) {
                 $percentage = $row['percentage'];
             } else {
                  $percentage = "";
             }
              
              if((int)$licenseExpiry - $now <= 2592000){
                 echo "- <b style='font-weight:bold;line-height:1.5'>License is Expiring in less than 30 days.</b>"."<br>";
              }
              if(((int)$nextMedical - $now)  <= 2592000){
                 echo "- <b style='font-weight:bold;line-height:1.5'>Next Medical is within 30 days.</b>"."<br>";
              }
              if(((int)$nextDrug - $now)  <= 2592000){
                 echo "- <b style='font-weight:bold;line-height:1.5'>Next Drugtest is within 30 days.</b>"."<br>";
              } 
              if(((int)$passportExpiry - $now)  <= 2592000){
                 echo "- <b style='font-weight:bold;line-height:1.5'>Passport is expiring in 30 days.</b>"."<br>";
              }
              if(((int)$fastcardexpiry - $now)  <= 2592000){
                 echo "- <b style='font-weight:bold;line-height:1.5'>Fast card is expiring in 30 days.</b>"."<br>";
              }
              if(((int)$hazmatexpiry - $now)  <= 2592000){
                 echo "- <b style='font-weight:bold;line-height:1.5'>Hazmat is expiring in 30 days.</b>"."<br>";
              } 
              
              echo "^".$loadedMile."^".$emptyMile."^".$tarp."^".$pickrate."^".$pickafter."^".$droprate."^".$dropafter."^".$rate."^".$driver_parent."^".$percentage;
           }
        }
     }

    public function getOwner(Request $request){
        // dd($request);
        // $id = (int)$data['value'];
        // $mainid = "";
    $id = (int)$request->Id;
    // dd($id);
    $mainid = (int)$request->mainId;
    
    $collection =\App\Models\Owner_operator_driver::raw();
            $show1 = $collection->aggregate([
                ['$lookup' => ['from' => 'driver','localField' => 'companyID','foreignField' => 'companyID', 'as' => 'owner' ]],
                ['$match'=>['companyID'=>(int)Auth::user()->companyID]],
                ['$unwind' => ['path' => '$ownerOperator']],
                // ['$match' => ['ownerOperator.driverId' => $id]],
                // ['$unwind'=>'$owner'],
                // ['$unwind'=>'$owner.driver'],
                // ['$match'=>['owner.driver._id'=>$id]]

            ]);
            // dd($show1);
            $owner = array();
            $ownerOperator = array();
            $trucknumber = 0;
            foreach ($show1 as $row) {
            // dd($row);
            $c = 0;
            $ownerOperator[$c] = $row['ownerOperator'];
            $c++;
            $a = 0;
            $owner[$a] = $row['owner'];
            $a++;
            foreach ($ownerOperator as $row1) {
                    $driverPercentage = $row1['percentage'];
                    $drivertruck = $row1['truckNo'];
                    
                    $collection = \App\Models\Truckadd::raw();
                    $truck1 = $collection->aggregate([
                            ['$match'=>['companyID'=>(int)Auth::user()->companyID]],
                            ['$unwind'=>'$truck'],
                            ['$match'=>['truck._id'=>(int)$drivertruck]]
                    ]);
                
                foreach ($truck1 as $tr) {
                    $truck = array();
                    $k = 0;
                    $truck[$k] = $tr['truck'];
                    $k++;
                    foreach ($truck as $e) {
                        $trucknumber = $e['truckNumber'];
                        
                    }
                }
                    echo $driverPercentage."^".$drivertruck.")".$trucknumber.")";
            }
            
            }
        foreach ($owner as $row2) {
            $b = 0;
            $driver[$b] = $row2['driver'];
            $b++;
            $mainid = $row2['_id'];
            foreach ($driver as $row3) {
                $now = strtotime("now");
                $driverid = $row3['_id'];
                $licenseExpiry = $row3['driverLicenseExp'];
                $nextMedical = $row3['driverNextMedical'];
                $nextDrug = $row3['driverNextDrugTest'];
                $passportExpiry = $row3['passportExpiry'];
                $fastcardexpiry = $row3['fastCardExpiry'];
                $hazmatexpiry = $row3['hazmatExpiry'];
                $loadedMile = $row3['driverLoadedMile'];
                $emptyMile = $row3['driverEmptyMile'];
                echo $mainid.")".$driverid."^";
                if($licenseExpiry - $now <= 2592000){
                echo "- <b style='font-weight:bold;line-height:1.5'>License is Expiring in less than 30 days.</b>"."<br>";
                }
                if(($nextMedical - $now)  <= 2592000){
                echo "- <b style='font-weight:bold;line-height:1.5'>Next Medical is within 30 days.</b>"."<br>";
                }
                if(($nextDrug - $now)  <= 2592000){
                echo "- <b style='font-weight:bold;line-height:1.5'>Next Drugtest is within 30 days.</b>"."<br>";
                } 
                if(($passportExpiry - $now)  <= 2592000){
                echo "- <b style='font-weight:bold;line-height:1.5'>Passport is expiring in 30 days.</b>"."<br>";
                }
                if(($fastcardexpiry - $now)  <= 2592000){
                echo "- <b style='font-weight:bold;line-height:1.5'>Fast card is expiring in 30 days.</b>"."<br>";
                }
                if(($hazmatexpiry - $now)  <= 2592000){
                echo "- <b style='font-weight:bold;line-height:1.5'>Hazmat is expiring in 30 days.</b>"."<br>";
                } 
            }
        }
    }
}
