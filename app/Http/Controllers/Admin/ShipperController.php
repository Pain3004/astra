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
        $consignee = Consignee::where('companyID',$companyId)->first();

        //dd($shipper);
       return response()->json(['shipper'=>$shipper,'consignee'=>$consignee], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
       
    }
    public function storeShipper(Request $request)
    {
        $companyID=(int)1;
        // $companyID=(int)65;
        // dd($request->addressType);
        if($request->addressType=="shipper")
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
                                'consigneeReceiving' => $request->shipperShippingHours,
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


       
    }
    public function editShipper(Request $request)
    {
        $id=$request->id;
        $companyID=(int)1;
        $Shipper = Shipper::where('companyID',$companyID)->first();
        // dd($Shipper );
        $ShipperArray=$Shipper->shipper;
        $ShipperLength=count($ShipperArray);
        $i=0;
        $v=0;
        for($i=0; $i<$ShipperLength; $i++)
        {
            $ids=$Shipper->shipper[$i]['_id'];
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
        $Shipper=$Shipper->shipper[$v];
        $Shipper=array_merge($companyID,$Shipper);
         return response()->json($Shipper, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function updateShipper(Request $request)
    {
        $id=$request->id;
        $companyID=(int)1;
        $Shipper = Shipper::where('companyID',$companyID)->first();
        $ShipperArray=$Shipper->shipper;
        $fuelLength=count($ShipperArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$Shipper->shipper[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }
        // dd($request);
         $ShipperArray[$v]['shipperName'] = $request->shipperName;  
         $ShipperArray[$v]['shipperAddress'] = $request->shipperAddress;    
         $ShipperArray[$v]['shipperLocation'] = $request->shipperLocation;  
         $ShipperArray[$v]['shipperPostal'] = $request->shipperPostal;  
         $ShipperArray[$v]['shipperContact'] = $request->shipperContact;    
         $ShipperArray[$v]['shipperEmail'] = $request->shipperEmail;    
         $ShipperArray[$v]['shipperTelephone'] = $request->shipperTelephone;    
         $ShipperArray[$v]['shipperExt'] = $request->shipperExt;    
         $ShipperArray[$v]['shipperTollFree'] = $request->shipperTollFree;  
         $ShipperArray[$v]['shipperFax'] = $request->shipperFax;    
         $ShipperArray[$v]['shipperShippingHours'] = $request->shipperShippingHours;    
         $ShipperArray[$v]['shipperAppointments'] = $request->shipperAppointments;  
         $ShipperArray[$v]['shipperIntersaction'] = $request->shipperIntersaction;  
         $ShipperArray[$v]['shipperStatus'] = $request->shipperstatus;  
         $ShipperArray[$v]['shippingNotes'] = $request->shippingNotes;  
         $ShipperArray[$v]['internalNotes'] = $request->internal_note;   
        $Shipper->shipper=$ShipperArray;
        if($Shipper->save())
        {
         $arr = array('status' => 'success', 'message' => 'shipper updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function deleteShipper(Request $request)
    {
        $id=$request->id;
        $companyID=(int)1;
        $Shipper = Shipper::where('companyID',$companyID)->first();
        $ShipperArray=$Shipper->shipper;
        $fuelLength=count($ShipperArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$Shipper->shipper[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }
         $ShipperArray[$v]['deleteStatus'] = "YES";   
        $Shipper->shipper=$ShipperArray;
        if($Shipper->save())
        {
         $arr = array('status' => 'success', 'message' => 'shipper deleted successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function restoreShipper(Request $request)
    {
        $consiId=$request->id;
        $shipIds=$request->all_ids;
        $dataType=str_replace( array('[', ']'), ' ',$request->dataType);
        $dataType_add=explode(",",$dataType);
        $custID=(array)$request->custID;
        $address="shipper";
        foreach($dataType_add as $key=>$shipAndConTy)
        {
            $shipAndConTy=str_replace( array('"' ,']'), ' ',$shipAndConTy);
            $shipAndConTy = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $shipAndConTy)));
            // $shipAndConTy="shipper";
        //    dd($shipAndConTy);
            if($shipAndConTy=='shipper')
            {
                // print_r($shipAndConTy);
                foreach($custID as $company_id)
                {
                    $company_id=str_replace( array( '\'', '"',
                    ',' , ' " " ', '[', ']' ), ' ', $company_id);
                    $company_id=(int)$company_id;
                    $Shipper = Shipper::where('companyID',$company_id )->first();
                    $ShipperArray=$Shipper->shipper;
                    $arrayLength=count($ShipperArray);         
                    $i=0;
                    $v=0;
                    $data=array();
                    for ($i=0; $i<$arrayLength; $i++){
                        $ids=$Shipper->shipper[$i]['_id'];
                        $ids=(array)$ids;
                        foreach ($ids as $value){
                            // dd( $shipIds);
                            $shipIds= str_replace( array('[', ']'), ' ', $shipIds);
                            // dd($shipIds);
                            if(is_string($shipIds))
                            {
                                $shipIds=explode(",",$shipIds);
                            }
                            foreach($shipIds as $ship_id)
                            {
                                $ship_id= str_replace( array('"', ']' ), ' ', $ship_id);
                                if($value==$ship_id)
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
                        $ShipperArray[$row]['deleteStatus'] = "NO";
                        $Shipper->shipper= $ShipperArray;
                        $save=$Shipper->save();
                    }
                    if (isset($save)) {
                        $arr = array('status' => 'success', 'message' => 'Shipper Restored successfully.','statusCode' => 200); 
                    return json_encode($arr);
                    }
                }
                
            }
            if($shipAndConTy=="consignee")
            {
                // echo "<br> </br>";
                // print_r($shipAndConTy);
                // dd($shipAndConTy);
                foreach($custID as $company_id)
                {
                    // echo "consignee";
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
           
        // dd($request->custID);
       
    }

}
