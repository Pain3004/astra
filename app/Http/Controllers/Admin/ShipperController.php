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
    public function getShipper(Request $request){
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
                $pagina_data= str_replace( array('"',":"," " ,"doc",'start',"end", ']','[','{','}' ), ' ', $request->arr);
                $pagina_data=explode(",",$pagina_data);
                if(!empty($request->arr))
                {
                    $docid=preg_replace('/\s+/',"", $pagina_data[0]);
                    $start=preg_replace('/\s+/',"",$pagina_data[1]);
                    $end=preg_replace('/\s+/',"",$pagina_data[2]);
                    $docid=intval($docid);
                    $start=intval($start);
                    $end=intval($end);
                }
                else
                {
                    $docid= $paginate[0][0][0][$i]['doc'];
                    $end=$paginate[0][0][0][$i]['end'];
                    $start=$paginate[0][0][0][$i]['start'];
                }
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
        $masterId=(int)$request->comID;
        $cursor = Shipper::raw()->findOne(['companyID' => $companyID,'_id'=>$masterId,'shipper._id' => $id]);
        $ShipperArray=$cursor->shipper;
        $ShipperLength=count($ShipperArray);
        $i=0;
        $v=0;
        for($i=0; $i<$ShipperLength; $i++)
        {
            $ids=$cursor->shipper[$i]['_id'];
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
            "companyID"=>$masterId
        ) ;       
        $Shipper=(array)$cursor->shipper[$v];
        $Shipper=array_merge($companyID,$Shipper);
         return response()->json($Shipper, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function updateShipper(Request $request)
    {

        $id=(int)$request->id;
        // dd($request->shipperstatus);
        $companyID=(int)Auth::user()->companyID;
        $masterId=(int)$request->comID;
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
            'shipper.$.shipperStatus' => $request->shipperstatus,
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
        $masterId=(int)$request->comID;
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
        $custID=(array)$request->custID;

        $companyID=Auth::user()->companyID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $masterId=(int)$company_id;
            $shipIds= str_replace( array('[', ']'), ' ', $shipIds);
            if(is_string($shipIds))
            {
                $shipIds=explode(",",$shipIds);
            }
            $cursor = Shipper::raw()->findOne(['companyID' => $companyID,'_id'=>$masterId,'shipper._id' => (int)$shipIds]);
            $ShipperArray=$cursor->shipper;
            $ShipperLength=count($ShipperArray);
            $i=0;
            $v=0;
            $data=array();
            for($i=0; $i<$ShipperLength; $i++)
            {
                $ids=$cursor->shipper[$i]['_id'];
                $ids=(array)$ids;
                foreach($ids as $value)
                {
                   
                    foreach($shipIds as $shiper_ids)
                    {
                        $shiper_ids= str_replace( array('"', ']' ), ' ', $shiper_ids);
                        if($value==$shiper_ids)
                        {                        
                            // $data[]=$i;
                            $Shipper=Shipper::raw()->updateOne(['companyID' =>$companyID,'_id' => $masterId,'shipper._id' => (int)$shiper_ids], 
                            ['$set' => ['shipper.$.deleteStatus' => 'NO','shipper.$.deleteUser' => Auth::user()->userName,'shipper.$.deleteTime' => time()]]
                        ); 
                        }
                    }
                }
            }
            // foreach($data as $row)
            // {

            //     // $ShipperArray[$row]['deleteStatus'] = "NO";
            //     // $cursor->trailer= $ShipperArray;
            //     // $save=$cursor->save();
            // }
            
                $arr = array('status' => 'success', 'message' => 'Shipper Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
       
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
