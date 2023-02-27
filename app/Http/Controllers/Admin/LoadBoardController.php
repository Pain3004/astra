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
        $companyId=1;
        $mergedArray = [];
        $Open = Open::where('companyID',$companyId)->get();
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

        $unserializeData = [];
        parse_str($request->data,$unserializeData);
        
        if(isset($unserializeData['shipperName'])){
        foreach($unserializeData['shipperName'] as $key => $val){
        
            $shipper[]=((object)[
                $shipper_name=explode('-',$unserializeData['shipperName'][$key]),
                'shipper_name'=>$shipper_name[0],
                'shipper_address'=>$unserializeData['shipperaddress'][$key],
                'shipper_location'=>$unserializeData['shipperLocation'][$key],
                'shipper_pickup'=>strtotime($unserializeData['shipperdate'][$key]),
                'shipper_picktime'=>$unserializeData['shippertime'][$key],
                'shipper_load_type'=>$unserializeData['loadType'][$key],
                'shipper_commodity'=>$unserializeData['shippercommodity'][$key],
                'shipper_qty'=>$unserializeData['shipperqty'][$key],
                'shipper_weight'=>$unserializeData['shipperweight'][$key],
                'shipper_pickup_number'=>$unserializeData['shipperpickup'][$key],
                'shipper_seq'=>$unserializeData['shipseq'][$key],
                'shipper_notes'=>$unserializeData['shippernotes'][$key],
                // 'shipperparent'=>$unserializeData[''][$key],
                'shipperparent'=>'0',
            ]);        
        }
    }else{
        $shipper=array();
    }

        $Data[]=array(    
            '_id' => 1,
            'loaddata' => $loaddata=((object)[
                'customername'=>$request->customername,
                'loadername'=>$request->loadername,
                'loadertruck'=>$request->loadertruck,
                'loadertrailer'=>$request->loadertrailer,
                'shippername'=>'',
                'consigneename'=>'',
                'loadertotal'=>$request->loadertotal,
            ]),
            'company' => $request->company,
            'customer' => $request->customer,
            'dispatcher' => $request->dispatcher,
            'cnno' => $request->cnno,
            'status' => $request->status,
            'active_type' => $request->active_type,
            'rate' => $request->rate,
            'units' => $request->units,
            'fsc' => $request->fsc,
            'fsc_percentage' => $request->fsc_percentage,
            // 'other_charges' => $request->other_charges,
            // 'other_charges_modal' => $request->other_charges_modal,
            'total_rate' => $request->total_rate,
            'equipment_type' => $request->equipment_type,
            'typeofloader' => $request->typeofLoader,
            // 'carrier_name' => $request->carrier_name,
            // 'flat_rate' => $request->flat_rate,
            // 'isIfta'=> $request->isIfta,
            // 'advance_charges' => $request->advance_charges,
            // 'carrier_other_modal' => $request->carrier_other_modal,
            // 'carrier_total' => $request->carrier_total,
            // 'currency' => $request->currency,
            'driver_name' => $request->driver_name,
            'truck' => $request->truck,
            'trailer' => $request->trailer,
            'loaded_mile' => $request->loaded_mile,
            'empty_mile' => $request->empty_mile,
            // 'driver_other' => $request->driver_other,
            // 'driver_other_modal' => $request->driver_other_modal,
            'tarp' => $request->tarp,
            'flat' => $request->flat,
            'driver_total' => $request->driver_total,
            'owner_name' => $request->owner_name,
            'owner_percentage' => $request->owner_percentage,
            'owner_truck' => $request->owner_truck,
            'owner_trailer' => $request->owner_trailer,
            // 'owner_other' => $request->owner_other,
            // 'owner_other_modal' => $request->owner_other_modal,
            // 'owner_total' => $request->owner_total,
            // 'start_location' => $request->start_location,
            // 'end_location' => $request->end_location,
            'shipper' => $shipper,
            // 'consignee' => $request->consignee,
            // 'tarp_select' => $request->tarp_select,
            // 'loaded_miles_value' => $request->loaded_miles_value,
            // 'empty_miles_value' => $request->empty_miles_value,
            // 'driver_miles_value' => $request->driver_miles_value,
            // 'file' => $request->file,
            // 'load_notes' => $request->load_notes,
            // 'carrier_email' => $request->carrier_email,
            // 'customer_email' => $request->customer_email,
            // 'created_user' => $_SESSION['userId'],
            // 'created_at' => strtotime(date('Y-m-d H:i:s')),
            // 'updated_at' => strtotime(date('Y-m-d H:i:s')),
            // 'shipper_pickup' => $request->shipper[0]['shipper_pickup'],
            // 'consignee_pickup' => $request->consignee[0]['consignee_pickup'],
            // 'status_BreakDown_time' => $request->status_Break_Down_time,
            // 'status_Loaded_time' => $request->status_Loaded_time,
            // 'status_ArrivedConsignee_time' => $request->status_Arrived_Consignee_time,
            // 'status_ArrivedShipper_time' => $request->status_Arrived_Shipper_time,
            // 'status_Paid_time' => $request->status_Paid_time,
            // 'status_Open_time' => $request->status_Open_time,
            // 'status_OnRoute_time' => $request->status_On_Route_time,
            // 'status_Dispatched_time' => $request->status_Dispatched_time,
            // 'status_Delivered_time' => $request->status_Delivered_time,
            // 'status_Completed_time' => $request->status_Completed_time,
            // 'status_Invoiced_time' => $request->status_Invoiced_time,
            // 'status_change_user' => array("Open" => $_SESSION['userId'],"Dispatched" => "", "Arrived Shipper" => "", "Loaded" => "", "On Route" => "","Arrived Consignee" => "","Delivered" => "", "Completed" => "", "Invoiced" => "", "Break Down" => "","Cancelled" => ""),
            // 'broker_driver' => $request->broker_driver,
            // 'broker_driver_contact' => $request->broker_driver_contact,
            // 'broker_truck' => $request->broker_truck,
            // 'broker_trailer' => $request->broker_trailer,
            // 'is_unit_on' => $request->is_unit_on,
            // 'carrier_parent' => $request->carrier_parent,
            // 'customer_parent' => $request->customer_parent,
            // 'driver_parent' => $request->driver_parent,
            // 'owner_parent' => $request->owner_parent,
            // 'isBroker' => $request->isBroker,
            // 'isIftaVerified' => "no",
            // 'receipt_status' => 0,
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
