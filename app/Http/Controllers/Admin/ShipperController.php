<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipper;
use App\Models\Consignee;
use File;
use App\Helpers\AppHelper;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class ShipperController extends Controller
{
    public function getShipper(){
        $companyID=(int)Auth::user()->companyID;
        $total_records = 0;
        $cursor = Shipper::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['size' => ['$size' => ['$shipper']]]]
        ]);
        $totalarray = $cursor;
        $docarray = array();
        foreach ($cursor as $v) 
        {
            $docarray[] = array("size" => $v['size'], "id" => $v['_id']);
            $total_records += (int)$v['size'];
        }
        $completedata = array();
        $partialdata = array();
        $paginate = AppHelper::instance()->paginate($docarray);
        if (!empty($paginate[0][0][0]))
        {
            for ($i = 0; $i < sizeof($paginate[0][0][0]); $i++) 
            {
                $docid= $paginate[0][0][0][$i]['doc'];
                $end=$paginate[0][0][0][$i]['end'];
                $start=$paginate[0][0][0][$i]['start'];
                $show1 = Shipper::raw()->aggregate([
                    ['$match' => ["companyID" => $companyID, "_id" => $docid]],
                    ['$project' => ["companyID" => $companyID, "shipper" => ['$slice' => ['$shipper', $end, $start - $end ]]]],
                ]);
                $c = 0;
                $arrData1 = "";
                foreach ($show1 as $arrData11) 
                {
                    $arrData1 = $arrData11;
                }
                $arrData2 = array(
                    'arrData1' => $arrData1,
                );
                $partialdata[]= $arrData2;
            }
        }
        $completedata[] = $partialdata;
        $completedata[] = $paginate;
        $completedata[] = $total_records;
        echo json_encode($completedata);
       
    }
    public function storeShipper(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        // if($request->addressType=="shipper")
        // {
        //     $Shipper = Shipper::where('companyID',$companyID)->get();
        //     foreach( $Shipper as  $Shipper_data)
        //     {
        //         if($Shipper_data)
        //         {
        //             // $shipper=collect($shipper->shipper);
        //             // $shipper = $shipper->chunk(10);
        //             $ShipperArray=$Shipper_data->shipper;
        //             $ids=array();
        //             foreach( $ShipperArray as $key=> $getFuelCard_data)
        //             {
        //                 $ids[]=$getFuelCard_data['_id'];
        //             }
        //             $ids=max($ids);
        //             $totalShipperArray=$ids+1;
        //         }
        //         else
        //         {
        //             $totalShipperArray=0; 
        //         }
        //         $ShipperData[]=array(    
        //             '_id' => $totalShipperArray,
        //             'shipperName' => $request->shipperName,
        //             'shipperAddress' => $request->shipperAddress,
        //             'shipperLocation' => $request->shipperLocation,
        //             'shipperPostal' => $request->shipperPostal,
        //             'shipperContact' => $request->shipperContact,
        //             'shipperEmail' => $request->shipperEmail,
        //             'shipperTelephone' => $request->shipperTelephone,
        //             'shipperExt' => $request->shipperExt,
        //             'shipperTollFree' => $request->shipperTollFree,
        //             'shipperFax' => $request->shipperFax,
        //             'shipperShippingHours' => $request->shipperShippingHours,
        //             'shipperAppointments' => $request->shipperAppointments,
        //             'shipperIntersaction' => $request->shipperIntersaction,
        //             'shipperStatus' => $request->shipperstatus,
        //             'shippingNotes' => $request->shippingNotes,
        //             'internalNotes' => $request->internal_note,
        //             'counter' =>0,
        //             'created_by' => Auth::user()->userFirstName,
        //             'created_time' => date('d-m-y h:i:s'),
        //             'edit_by' =>Auth::user()->userName,
        //             'edit_time' =>time(),
        //             'deleteStatus' =>"NO",                    
        //         ); 

                
        //         if($Shipper_data)
        //         {                
        //             Shipper::where(['companyID' =>$companyID])->update([
        //             'counter'=> $totalShipperArray+1,
        //             'shipper' =>array_merge($ShipperArray,$ShipperData) ,
        //             ]);
        //             if($request->shipperASconsignee==1)
        //             {
        //                 $Consignee = Consignee::where('companyID',$companyID)->get();
        //                 foreach( $Consignee as  $Consignee_data)
        //                 {
        //                     if($Consignee_data)
        //                     {
        //                         $ConsigneeArray=$Consignee_data->consignee;
        //                         $ids=array();
        //                         foreach( $ConsigneeArray as $key=> $getFuelCard_data)
        //                         {
        //                             $ids[]=$getFuelCard_data['_id'];
        //                         }
        //                         $ids=max($ids);
        //                         $totalConsigneeArray=$ids+1;
        //                     }
        //                     else
        //                     {
        //                         $totalConsigneeArray=0; 
        //                     }
        //                     $ConsigneeData[]=array(    
        //                         '_id' => $totalShipperArray,
        //                         'consigneeName' => $request->shipperName,
        //                         'consigneeAddress' => $request->shipperAddress,
        //                         'consigneeLocation' => $request->shipperLocation,
        //                         'consigneePostal' => $request->shipperPostal,
        //                         'consigneeContact' => $request->shipperContact,
        //                         'consigneeEmail' => $request->shipperEmail,
        //                         'consigneeReceiving'=>'',
        //                         'consigneeRecivingNote'=>'',
        //                         'consigneeTelephone' => $request->shipperTelephone,
        //                         'consigneeExt' => $request->shipperExt,
        //                         'consigneeTollFree' => $request->shipperTollFree,
        //                         'consigneeFax' => $request->shipperFax,
        //                         'consigneeReceiving' => $request->shipperShippingHours,
        //                         'consigneeAppointments' => $request->shipperAppointments,
        //                         'consigneeIntersaction' => $request->shipperIntersaction,
        //                         'consigneeStatus' => $request->shipperstatus,
        //                         'consigneeInternalNote' => $request->shippingNotes,
        //                         'internal_note' => $request->internal_note,
        //                         'counter' =>0,
        //                         'created_by' => Auth::user()->userFirstName,
        //                         'created_time' => date('d-m-y h:i:s'),
        //                         'edit_by' =>Auth::user()->userName,
        //                         'edit_time' =>time(),
        //                         'deleteStatus' =>"NO",                        
        //                     ); 
        //                     if($Consignee_data)
        //                     {                
        //                         Consignee::where(['companyID' =>$companyID])->update([
        //                         'counter'=> $totalConsigneeArray+1,
        //                         'consignee' =>array_merge($ConsigneeArray,$ConsigneeData) ,
        //                         ]);
        //                         $arrConsignee = array('status' => 'success', 'message' => 'Consignee added successfully.'); 
        //                         return json_encode($arrConsignee);
        //                     }
        //                     else
        //                     {
        //                         try
        //                         {
        //                             if(Consignee::create([
        //                                 '_id' => 1,
        //                                 'companyID' => $companyID,
        //                                 'counter' => 1,
        //                                 'consignee' => $currencyData,
        //                             ])) 
        //                             {
        //                                 $arrConsignee = array('status' => 'success', 'message' => 'Consignee added successfully.'); 
        //                                 return json_encode($arrConsignee);
        //                             }
        //                         }
        //                         catch(\Exception $error)
        //                         {
        //                             return $error->getMessage();
        //                         }
        //                     }
        //                 }  
        //             }  



        //             $arrShipper = array('status' => 'success', 'message' => 'Shipper added successfully.'); 
        //             return json_encode($arrShipper);
        //         }
        //         else
        //         {
        //             try
        //             {
        //                 if(Shipper::create([
        //                     '_id' => 1,
        //                     'companyID' => $companyID,
        //                     'counter' => 1,
        //                     'shipper' => $currencyData,
        //                 ])) 
        //                 {
        //                     $arrShipper = array('status' => 'success', 'message' => 'Shipper added successfully.'); 
        //                     return json_encode($arrShipper);
        //                 }
        //             }
        //             catch(\Exception $error)
        //             {
        //                 return $error->getMessage();
        //             }
        //         }
        //     } 
        // } 




        $maxLength = 6500;
        if($request->addressType=="shipper")
        {
            $docAvailable = AppHelper::instance()->checkDoc(Shipper::raw(),$companyID,$maxLength);
            
            if($docAvailable != "No")
            {
                $info = (explode("^",$docAvailable));
                $docId = $info[1];
                $counter = $info[0];

                $cons = array(
                    '_id' => AppHelper::instance()->getAdminDocumentSequence($companyID, Shipper::raw(),'shipper',(int)$docId),
                    'counter' => 0,
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
                    'shipperStatus' => $request->shipperStatus,
                    'shippingNotes' => $request->shippingNotes,
                    'internalNotes' => $request->internal_note,
                    'insertedTime' => time(),
                    'insertedUserId' =>Auth::user()->userName,
                    'deleteStatus' => "NO",
                    'deleteUser' => "",
                    'deleteTime' => "",
                );
                Shipper::raw()->updateOne(['companyID' => $companyID,'_id' => (int)$docId], ['$push' => ['shipper' => $cons]]);
                $cons['masterID'] = $docId;
                echo json_encode($cons);
            } 
            else 
            {
                $id = AppHelper::instance()->getNextSequence("shipper", $db);
                $request->setId($id);
                $cons = iterator_to_array($shipper);
                Shipper::raw()->insertOne($cons);
                $masterID = $cons['_id'];
                $cons["shipper"][0]['masterID'] = $masterID;
                echo json_encode($cons["shipper"][0]);
            }
        }
        if($request->shipperASconsignee==1)
        {
            $docAvailable = AppHelper::instance()->checkDoc(Consignee::raw(),$companyId,$maxLength);
            
            if($docAvailable != "No")
            {
                $info = (explode("^",$docAvailable));
                $docId = $info[1];
                $counter = $info[0];

                $cons = array(
                    '_id' => AppHelper::instance()->getAdminDocumentSequence($companyID, Consignee::raw(),'shipper',(int)$docId),
                    'counter' => 0,
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
                    'consigneeStatus' => $request->shipperStatus,
                    'consigneeInternalNote' => $request->shippingNotes,
                    'internal_note' => $request->internalNotes,
                    'insertedTime' => time(),
                    'insertedUserId' =>Auth::user()->userName,
                    'deleteStatus' => "NO",
                    'deleteUser' => "",
                    'deleteTime' => "",
                );
                Consignee::raw()->updateOne(['companyID' => $companyID,'_id' => (int)$docId], ['$push' => ['consignee' => $cons]]);
                $cons['masterID'] = $docId;
                echo json_encode($cons);
            } 
            else 
            {
                $id = AppHelper::instance()->getNextSequence("consignee", $db);
                $request->setId($id);
                $cons = iterator_to_array($shipper);
                Consignee::raw()->insertOne($cons);
                $masterID = $cons['_id'];
                $cons["consignee"][0]['masterID'] = $masterID;
                echo json_encode($cons["consignee"][0]);
            }
        }
       
    }
    public function editShipper(Request $request)
    {
        $id=(int)$request->id;
        $companyID=(int)Auth::user()->companyID;
        $masterId=(int)$request->masterId;
        $cursor = Shipper::raw()->aggregate([
            ['$match' => ['companyID' => $companyID,'_id'=>$masterId,'shipper._id' => $id]],
            ['$project' => ['size' => ['$size' => ['$shipper']]]]
        ]);
        dd($cursor);
        // $Shipper = Shipper::where('companyID',$companyID)->first();
        // // dd($Shipper );
        // $ShipperArray=$Shipper->shipper;
        // $ShipperLength=count($ShipperArray);
        // $i=0;
        // $v=0;
        // for($i=0; $i<$ShipperLength; $i++)
        // {
        //     $ids=$Shipper->shipper[$i]['_id'];
        //     $ids=(array)$ids;
        //     foreach($ids as $value)
        //     {
        //         if($value==$id)
        //         {
        //             $v=$i;
        //         }
        //     }
        // }
        // $companyID=array(
        //     "companyID"=>$companyID
        // ) ;       
        // $Shipper=$Shipper->shipper[$v];
        // $Shipper=array_merge($companyID,$Shipper);
        //  return response()->json($Shipper, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function updateShipper(Request $request)
    {

        $id=(int)$request->id;
        $companyID=(int)Auth::user()->companyID;
        $masterId=(int)$request->masterId;
        $Shipper=Shipper::raw()->updateOne(['companyID' =>$companyID,'_id' => $masterId,'shipper._id' => $id], 
            ['$set' => ['shipper.$.shipperName' => $request->shipperName,
            'shipper.$.shipperAddress' => $request->shipperAddress,
            'shipper.$.shipperLocation' => $request->shipperLocation,
            'shipper.$.shipperPostal' => $request->shipperPostal,
            'shipper.$.shipperContact' => $request->shipperContact,
            'shipper.$.shipperEmail' => $request->shipperEmail,
            'shipper.$.shipperTelephone' => $request->shipperTelephone,
            'shipper.$.shipperExt' => $request->shipperExt,
            'shipper.$.shipperTollFree' => $request->shipperTollFree,
            'shipper.$.shipperFax' => $request->shipperFax,
            'shipper.$.shipperShippingHours' => $request->shipperShippingHours,
            'shipper.$.shipperAppointments' => $request->shipperAppointments,
            'shipper.$.shipperIntersaction' => $request->shipperIntersaction,
            'shipper.$.shipperStatus' => $request->shipperStatus,
            'shipper.$.shippingNotes' => $request->shippingNotes,
            'shipper.$.internalNotes' => $request->internal_note,
            'shipper.$.edit_by' => Auth::user()->userName,
            'shipper.$.edit_time' => time()]]
        );
        if($Shipper==true)
        {
         $arr = array('status' => 'success', 'message' => 'shipper Updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function deleteShipper(Request $request)
    {
        $id=(int)$request->id;
        $companyID=(int)Auth::user()->companyID;
        $masterId=(int)$request->masterId;
        $Shipper=Shipper::raw()->updateOne(['companyID' =>$companyID,'_id' => $masterId,'shipper._id' => $id], 
            ['$set' => ['shipper.$.deleteStatus' => 'YES','shipper.$.deleteUser' => Auth::user()->userName,'shipper.$.deleteTime' => time()]]
        );
        if($Shipper==true)
        {
         $arr = array('status' => 'success', 'message' => 'shipper deleted successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function restoreShipper(Request $request)
    {
        $shipIds=$request->all_ids;
        $dataType=str_replace( array('[', ']'), ' ',$request->dataType);
        $dataType_add=explode(",",$dataType);
        $custID=(array)$request->custID;
        $address="shipper";
        foreach($dataType_add as $key=>$shipAndConTy)
        {
            $shipAndConTy=str_replace( array('"' ,']'), ' ',$shipAndConTy);
            $shipAndConTy = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $shipAndConTy)));
            if($shipAndConTy=='shipper')
            {
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
                            $shipIds= str_replace( array('[', ']'), ' ', $shipIds);
                            // dd($shipIds);
                            if(is_string($shipIds))
                            {
                                $shipIds=explode(",",$shipIds);
                            }
                            foreach($shipIds as $fue_v_id)
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
    public function importExcel(Request $request)
    {
        $data = $data11['exceldata'];
        $length = $data11['length'];
        $maxLength = $data11['maxLength'];
        $companyId = (int)$_SESSION['companyId'];

        $docAvailable = AppHelper::instance()->checkDoc(Shipper::raw(),$companyId,$maxLength);
        
      if($docAvailable != "No"){
        $info = (explode("^",$docAvailable));
        $docId = $info[1];
        $counter = $info[0];

        $document = AppHelper::instance()->getDocument($data, $length, $maxLength, $counter);

            $p = $document['arrData'];
            $q = $document['lastarray'];

                Shipper::raw()->updateOne(
                    ['companyID' => (int)$companyId, '_id' => (int)$docId],
                    ['$push' => ['shipper' => ['$each' => $p[0]]]
                    ]);
                Shipper::raw()->updateOne(['companyID' => (int)$companyId, '_id' => (int)$docId],
                    ['$inc' => ['counter' => (int)sizeof($p[0])]]);

                    if(!empty($q[0])){
                        $y1 = sizeof($q[0]);
                        for($b = 0; $b < $y1 ; $b++){
                          $q[0][$b]['masterID'] = $docId;   
                        }    
                       $lid[] = $q[0];
                    }  
                    
        if((!empty($p[1])) && (!empty($q[1]))){
            $did = AppHelper::instance()->getNextSequence("shipper", $db);
                Shipper::raw()->insertOne(
                    array('_id' => $did,
                        'companyID' => $_SESSION['companyId'],
                        'counter' => (int)sizeof($p[1]),
                        'shipper' => $p[1],
                    ));
                    $y2 = sizeof($q[1]);
                    for($b = 0; $b < $y2 ; $b++){
                      $q[1][$b]['masterID'] = $did;   
                  }    
                 $lid[] = $q[1];          
            }   
            echo json_encode($lid);   
         }else{
            for ($i = 0; $i < sizeof($data); $i++) {
                $data[$i]['_id'] = (int)$data[$i]['_id']; 
                $data[$i]['counter'] = (int)$data[$i]['counter'];
            }
                $docid = AppHelper::instance()->getNextSequence("shipper", $db);
                Shipper::raw()->insertOne(
                array('_id' => $docid,
                    'companyID' => $_SESSION['companyId'],
                    'counter' => (int)$length,
                    'shipper' => $data,
                ));
                
                $x = sizeof($data);
                if( $x > 100){
                    $lastentry[] = array_slice( $data, $x-100 ,$x );
                }else{
                    $lastentry[] = $data;
                }
                $y = sizeof($lastentry[0]);
                    for($b = 0; $b < $y ; $b++){
                        $lastentry[0][$b]['masterID'] = $docid;   
                    }    
                $lid[] = $lastentry[0];
                echo json_encode($lid); 
        }
    }
    
    
   
    public function exportShipper(Request $request)
    {
        $p[] = array("Shipper Name *","Address *","Location","Postal / Zip*","Contact Name","Contact Email","Telephone","Ext","Toll Free","Fax","Shipping Hours","Appointments Yes/no","Major Intersection/Directions","Status *","Shipping Notes","Internal Notes");
            
        $shipper = Shipper::raw()->find(['companyID' => $_SESSION['companyId']]);
        foreach ($shipper as $ship) {
            $show = $ship['shipper'];
         foreach ($show as $s) {
                $p[] = array($s['shipperName'],$s['shipperAddress'],$s['shipperLocation'],$s['shipperPostal'],
                            $s['shipperContact'],$s['shipperEmail'],$s['shipperTelephone'],$s['shipperExt'],
                            $s['shipperTollFree'],$s['shipperFax'],$s['shipperShippingHours'],$s['shipperAppointments'],
                            $s['shipperIntersaction'],$s['shipperStatus'],$s['shippingNotes'],$s['internalNotes']
                );
            }
        }
        if (sizeof($p) > 1) {
            echo json_encode($p);
       }else{
            unset($p);
            $p = "";
            echo json_encode($p);
       }
    }

}
