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
        die;
        $obj_size=3500;
        $companyID=Auth::user()->companyID;
        $totalArray=0;
        $getCompany = Open::where('companyID',$companyID)->get();
        $totalCompany=count($getCompany);
        
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
            'company' => $this->company,
            'customer' => $this->customer,
            'dispatcher' => $this->dispatcher,
            'cnno' => $this->cnno,
            'status' => $this->status,
            'active_type' => $this->active_type,
            'rate' => $this->rate,
            'units' => $this->units,
            'fsc' => $this->fsc,
            'fsc_percentage' => $this->fsc_percentage,
            'other_charges' => $this->other_charges,
            'other_charges_modal' => $this->other_charges_modal,
            'total_rate' => $this->total_rate,
            // 'equipment_type' => $this->equipment_type,
            // 'typeofloader' => $this->typeofLoader,
            // 'carrier_name' => $this->carrier_name,
            // 'flat_rate' => $this->flat_rate,
            // 'isIfta'=> $this->isIfta,
            // 'advance_charges' => $this->advance_charges,
            // 'carrier_other_modal' => $this->carrier_other_modal,
            // 'carrier_total' => $this->carrier_total,
            // 'currency' => $this->currency,
            // 'driver_name' => $this->driver_name,
            // 'truck' => $this->truck,
            // 'trailer' => $this->trailer,
            // 'loaded_mile' => $this->loaded_mile,
            // 'empty_mile' => $this->empty_mile,
            // 'driver_other' => $this->driver_other,
            // 'driver_other_modal' => $this->driver_other_modal,
            // 'tarp' => $this->tarp,
            // 'flat' => $this->flat,
            // 'driver_total' => $this->driver_total,
            // 'owner_name' => $this->owner_name,
            // 'owner_percentage' => $this->owner_percentage,
            // 'owner_truck' => $this->owner_truck,
            // 'owner_trailer' => $this->owner_trailer,
            // 'owner_other' => $this->owner_other,
            // 'owner_other_modal' => $this->owner_other_modal,
            // 'owner_total' => $this->owner_total,
            // 'start_location' => $this->start_location,
            // 'end_location' => $this->end_location,
            // 'shipper' => $this->shipper,
            // 'consignee' => $this->consignee,
            // 'tarp_select' => $this->tarp_select,
            // 'loaded_miles_value' => $this->loaded_miles_value,
            // 'empty_miles_value' => $this->empty_miles_value,
            // 'driver_miles_value' => $this->driver_miles_value,
            // 'file' => $this->file,
            // 'load_notes' => $this->load_notes,
            // 'carrier_email' => $this->carrier_email,
            // 'customer_email' => $this->customer_email,
            // 'created_user' => $_SESSION['userId'],
            // 'created_at' => time(),
            // 'updated_at' => time(),
            // 'shipper_pickup' => $this->shipper[0]['shipper_pickup'],
            // 'consignee_pickup' => $this->consignee[0]['consignee_pickup'],
            // 'status_BreakDown_time' => $this->status_Break_Down_time,
            // 'status_Loaded_time' => $this->status_Loaded_time,
            // 'status_ArrivedConsignee_time' => $this->status_Arrived_Consignee_time,
            // 'status_ArrivedShipper_time' => $this->status_Arrived_Shipper_time,
            // 'status_Paid_time' => $this->status_Paid_time,
            // 'status_Open_time' => $this->status_Open_time,
            // 'status_OnRoute_time' => $this->status_On_Route_time,
            // 'status_Dispatched_time' => $this->status_Dispatched_time,
            // 'status_Delivered_time' => $this->status_Delivered_time,
            // 'status_Completed_time' => $this->status_Completed_time,
            // 'status_Invoiced_time' => $this->status_Invoiced_time,
            // 'status_change_user' => array("Open" => $_SESSION['userId'],"Dispatched" => "", "Arrived Shipper" => "", "Loaded" => "", "On Route" => "","Arrived Consignee" => "","Delivered" => "", "Completed" => "", "Invoiced" => "", "Break Down" => "","Cancelled" => ""),
            // 'broker_driver' => $this->broker_driver,
            // 'broker_driver_contact' => $this->broker_driver_contact,
            // 'broker_truck' => $this->broker_truck,
            // 'broker_trailer' => $this->broker_trailer,
            // 'is_unit_on' => $this->is_unit_on,
            // 'carrier_parent' => $this->carrier_parent,
            // 'customer_parent' => $this->customer_parent,
            // 'driver_parent' => $this->driver_parent,
            // 'owner_parent' => $this->owner_parent,
            // 'isBroker' => $this->isBroker,
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
