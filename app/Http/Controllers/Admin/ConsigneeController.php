<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consignee;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class ConsigneeController extends Controller
{
    public function getConsignee(){
        // $companyId=59;
        $companyId=(int)1;
        // dd($companyId);
        $consignee = Consignee::where('companyID',$companyId)->first();
        // dd($consignee);
       return response()->json($consignee, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
       
    }
    public function storeConsignee(Request $request)
    {
        $companyID=(int)1;
        // dd($request);
        if($request->addressType=="consignee")
        {
            // dd($request);
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
                    '_id' => $totalConsigneeArray,
                    'consigneeName' => $request->shipperName,
                    'consigneeAddress' => $request->shipperAddress,
                    'consigneeLocation' => $request->shipperLocation,
                    'consigneePostal' => $request->shipperPostal,
                    'consigneeContact' => $request->shipperContact,
                    'consigneeEmail' => $request->shipperEmail,
                    'consigneeTelephone' => $request->shipperTelephone,
                    'consigneeExt' => $request->shipperExt,
                    'consigneeTollFree' => $request->shipperTollFree,
                    'consigneeFax' => $request->shipperFax,
                    'consigneeReceiving' => $request->shipperShippingHours,
                    'consigneeAppointments' => $request->shipperAppointments,
                    'consigneeIntersaction' => $request->shipperIntersaction,
                    'consigneeStatus' => $request->shipperstatus,
                    'consigneeRecivingNote' => $request->shippingNotes,
                    'consigneeInternalNote' => $request->internal_note,
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
                    if($request->shipperASconsignee==1)
                    {
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
                                'shipperStatus' => $request->shipperstatus,
                                'shippingNotes' => $request->shippingNotes,
                                'internalNotes' => $request->internal_note,
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
                    }  



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
    }

    public function editConsignee(Request $request)
    {
        $id=$request->id;
        $companyID=(int)1;
        $Consignee = Consignee::where('companyID',$companyID)->first();
        // dd($Consignee );
        $ConsigneeArray=$Consignee->consignee;
        $ConsigneeLength=count($ConsigneeArray);
        $i=0;
        $v=0;
        for($i=0; $i<$ConsigneeLength; $i++)
        {
            $ids=$Consignee->consignee[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }
        $companyID=array(
            "companyID"=>$companyID
        ) ;       
        $Consignee=$Consignee->consignee[$v];
        $Consignee=array_merge($companyID,$Consignee);
         return response()->json($Consignee, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function updateConsignee(Request $request)
    {
        $id=$request->fuel_id;
        // dd($id);
        $companyID=(int)1;
        $Consignee = Consignee::where('companyID',$companyID)->first();
        $ConsigneeArray=$Consignee->consignee;
        $fuelLength=count($ConsigneeArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$Consignee->consignee[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
         $ConsigneeArray[$v]['consigneeName'] = $request->consigneeName;
         $ConsigneeArray[$v]['consigneeAddress'] = $request->consigneeAddress;
         $ConsigneeArray[$v]['consigneeLocation'] = $request->consigneeLocation;
         $ConsigneeArray[$v]['consigneePostal'] = $request->consigneePostal;
         $ConsigneeArray[$v]['consigneeContact'] = $request->consigneeContact;
         $ConsigneeArray[$v]['consigneeEmail'] = $request->consigneeEmail;
         $ConsigneeArray[$v]['consigneeTelephone'] = $request->consigneeTelephone;
         $ConsigneeArray[$v]['consigneeExt'] = $request->consigneeExt;
         $ConsigneeArray[$v]['consigneeTollFree'] = $request->consigneeTollFree;
         $ConsigneeArray[$v]['consigneeFax'] = $request->consigneeFax;
         $ConsigneeArray[$v]['consigneeReceiving'] = $request->consigneeShippingHours;
         $ConsigneeArray[$v]['consigneeAppointments'] = $request->consigneeAppointments;
         $ConsigneeArray[$v]['consigneeIntersaction'] = $request->consigneeIntersaction;
         $ConsigneeArray[$v]['consigneeStatus'] = $request->consigneestatus;
         $ConsigneeArray[$v]['consigneeRecivingNote'] = $request->shippingNotes;
         $ConsigneeArray[$v]['consigneeInternalNote'] = $request->internal_note;
     
        $Consignee->consignee=$ConsigneeArray;
        if($Consignee->save())
        {
         $arr = array('status' => 'success', 'message' => 'Consignee updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function deleteConsignee(Request $request)
    {
        $id=$request->id;
        $companyID=(int)1;
        $Consignee = Consignee::where('companyID',$companyID)->first();
        $ConsigneeArray=$Consignee->consignee;
        $fuelLength=count($ConsigneeArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$Consignee->consignee[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }
         $ConsigneeArray[$v]['deleteStatus'] = "YES";   
        $Consignee->consignee=$ConsigneeArray;
        if($Consignee->save())
        {
         $arr = array('status' => 'success', 'message' => 'consignee deleted successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function restoreConsignee(Request $request)
    {
        $consiId=$request->id;
        dd($consiId);
        $custID=(array)1;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $Consignee = Consignee::where('companyID',$company_id )->first();
            $ConsigneeArray=$Consignee->consignee;
            $arrayLength=count($ConsigneeArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$Consignee->consignee[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    // dd( $consiId);
                    $consiId= str_replace( array('[', ']'), ' ', $consiId);
                    // dd($consiId);
                    if(is_string($consiId))
                    {
                        $consiId=explode(",",$consiId);
                    }
                    foreach($consiId as $fue_v_id)
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
                $ConsigneeArray[$row]['deleteStatus'] = "NO";
                $Consignee->consignee= $ConsigneeArray;
                $save=$Consignee->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Consignee Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
     
    }



}
