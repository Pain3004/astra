<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipper;
use App\Models\Consignee;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class ShipperController extends Controller
{
    public function getShipper(){
        // $companyId=65;
        $companyId=(int)1;
        // dd($companyId);
        $shipper = Shipper::where('companyID',$companyId)->first();
        //dd($shipper);
       return response()->json($shipper, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
       
    }
    public function storeShipper(Request $request)
    {
        $companyID=(int)1;
        // $companyID=(int)65;
        // dd($request->addressType);
        // if($request->addressType=="shipper")
        // {
            $Shipper = Shipper::where('companyID',$companyID)->get();
            foreach( $Shipper as  $Shipper_data)
            {
                if($Shipper_data)
                {
                    $ShipperArray=$Shipper_data->shipper;
                    $ids=array();
                    foreach( $ShipperArray as $key=> $getFuelCard_data)
                    {
                        $ids[]=$getFuelCard_data['_id'];
                    }
                    $ids=max($ids);
                    $totalShipperArray=$ids+1;
                }
                else
                {
                    $totalShipperArray=0; 
                }
                $ShipperData[]=array(    
                    '_id' => $totalShipperArray,
                    'shipperName' => $request->shipperName,
                    'shipperAddress' => $request->shipperAddress,
                    'shipperLocation' => $request->shipperLocation,
                    'shipperPostal' => $request->shipperPostal,
                    'shipperContact' => $request->shipperContact,
                    'shipperEmail' => $request->shipperEmail,
                    'shipperTelephone' => $request->shipperTelephone,
                    'shipperExt' => $request->shipperExt,
                    'shipperTollFree' => $request->shipperTollFree,
                    'shipperFax' => $request->shipperFax,
                    'shipperShippingHours' => $request->shipperShippingHours,
                    'shipperAppointments' => $request->shipperAppointments,
                    'shipperIntersaction' => $request->shipperIntersaction,
                    'shipperstatus' => $request->shipperstatus,
                    'shippingNotes' => $request->shippingNotes,
                    'internal_note' => $request->internal_note,
                    'counter' =>0,
                    'created_by' => Auth::user()->userFirstName,
                    'created_time' => date('d-m-y h:i:s'),
                    'edit_by' =>Auth::user()->userName,
                    'edit_time' =>time(),
                    'deleteStatus' =>"NO",                    
                ); 
                if($Shipper_data)
                {                
                    Shipper::where(['companyID' =>$companyID])->update([
                    'counter'=> $totalShipperArray+1,
                    'shipper' =>array_merge($ShipperArray,$ShipperData) ,
                    ]);
                    $arrShipper = array('status' => 'success', 'message' => 'Shipper added successfully.'); 
                    return json_encode($arrShipper);
                }
                else
                {
                    try
                    {
                        if(Shipper::create([
                            '_id' => 1,
                            'companyID' => $companyID,
                            'counter' => 1,
                            'shipper' => $currencyData,
                        ])) 
                        {
                            $arrShipper = array('status' => 'success', 'message' => 'Shipper added successfully.'); 
                            return json_encode($arrShipper);
                        }
                    }
                    catch(\Exception $error)
                    {
                        return $error->getMessage();
                    }
                }
            } 
        
            // dd($request->shipperASconsignee);
            if($request->shipperASconsignee==1)
            {
                $Consignee = Consignee::where('companyID',$companyID)->get();
                foreach( $Consignee as  $Consignee_data)
                {
                    if($Consignee_data)
                    {
                        $ConsigneeArray=$Consignee_data->consignee;
                        $ids=array();
                        foreach( $ConsigneeArray as $key=> $getFuelCard_data)
                        {
                            $ids[]=$getFuelCard_data['_id'];
                        }
                        $ids=max($ids);
                        $totalConsigneeArray=$ids+1;
                    }
                    else
                    {
                        $totalConsigneeArray=0; 
                    }
                    $ConsigneeData[]=array(    
                        '_id' => $totalShipperArray,
                        'consigneeName' => $request->shipperName,
                        'consigneeAddress' => $request->shipperAddress,
                        'consigneeLocation' => $request->shipperLocation,
                        'consigneePostal' => $request->shipperPostal,
                        'consigneeContact' => $request->shipperContact,
                        'consigneeEmail' => $request->shipperEmail,
                        'consigneeReceiving'=>'',
                        'consigneeRecivingNote'=>'',
                        'consigneeTelephone' => $request->shipperTelephone,
                        'consigneeExt' => $request->shipperExt,
                        'consigneeTollFree' => $request->shipperTollFree,
                        'consigneeFax' => $request->shipperFax,
                        'consigneeShippingHours' => $request->shipperShippingHours,
                        'consigneeAppointments' => $request->shipperAppointments,
                        'consigneeIntersaction' => $request->shipperIntersaction,
                        'consigneeStatus' => $request->shipperstatus,
                        'consigneeInternalNote' => $request->shippingNotes,
                        'internal_note' => $request->internal_note,
                        'counter' =>0,
                        'created_by' => Auth::user()->userFirstName,
                        'created_time' => date('d-m-y h:i:s'),
                        'edit_by' =>Auth::user()->userName,
                        'edit_time' =>time(),
                        'deleteStatus' =>"NO",                        
                    ); 
                    if($Consignee_data)
                    {                
                        Consignee::where(['companyID' =>$companyID])->update([
                        'counter'=> $totalConsigneeArray+1,
                        'consignee' =>array_merge($ConsigneeArray,$ConsigneeData) ,
                        ]);
                        $arrConsignee = array('status' => 'success', 'message' => 'Consignee added successfully.'); 
                        return json_encode($arrConsignee);
                    }
                    else
                    {
                        try
                        {
                            if(Consignee::create([
                                '_id' => 1,
                                'companyID' => $companyID,
                                'counter' => 1,
                                'consignee' => $currencyData,
                            ])) 
                            {
                                $arrConsignee = array('status' => 'success', 'message' => 'Consignee added successfully.'); 
                                return json_encode($arrConsignee);
                            }
                        }
                        catch(\Exception $error)
                        {
                            return $error->getMessage();
                        }
                    }
                }  
            }  
        // } 
    }
    public function editShipper(Request $request)
    {
        
    }
    public function updateShipper(Request $request)
    {
        
    }
    public function deleteShipper(Request $request)
    {
        
    }
    public function restoreShipper(Request $request)
    {
        
    }

}
