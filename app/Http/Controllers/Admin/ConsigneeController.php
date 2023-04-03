<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consignee;
use App\Models\Shipper;
use App\Helpers\AppHelper;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class ConsigneeController extends Controller
{
    public function getConsignee()
    {
        $companyID=(int)Auth::user()->companyID;
        $total_records = 0;
        $cursor = Consignee::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['size' => ['$size' => ['$consignee']],
            ]]
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
                $show1 = Consignee::raw()->aggregate([
                    ['$match' => ["companyID" => $companyID, "_id" => $docid]],
                    ['$project' => ["companyID" => $companyID,"consignee" => ['$slice' => ['$consignee',$end,$start - $end]]]]
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
                $partialdata[]=$arrData2;
                // $partialdata[] = $request->getData($db, $companyID, $paginate[0][0][0][$i]['doc'], $paginate[0][0][0][$i]['end'], $paginate[0][0][0][$i]['start']);
            }
        }
        $completedata[] = $partialdata;
        $completedata[] = $paginate;
        $completedata[] = $total_records;

        echo json_encode($completedata);
       
    }
    public function storeConsignee(Request $request)
    {
       
        $maxLength = 6500;
        $companyID=(int)Auth::user()->companyID;
        if($request->addressType=="consignee")
        {
            $docAvailable = AppHelper::instance()->checkDoc(Consignee::raw(),$companyID,$maxLength);
            
            if($docAvailable != "No"){
            $info = (explode("^",$docAvailable));
            $docId = $info[1];
            $counter = $info[0];

            $cons = array(
                '_id' => AppHelper::instance()->getAdminDocumentSequence($companyID, Consignee::raw(),'consignee',$docId),
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
            } else {
                $id = AppHelper::instance()->getNextSequence("consignee", $db);
                $cons = iterator_to_array($consignee);
                Consignee::raw()->insertOne($cons);
                $masterID = $cons['_id'];
                $cons["consignee"][0]['masterID'] = $masterID;
                echo json_encode($cons["consignee"][0]);
            }
        }
        if($request->shipperASconsignee==1)
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
    }

    public function editConsignee(Request $request)
    {
        $id=(int)$request->id;
        $companyID=(int)Auth::user()->companyID;
        $masterId=(int)$request->comID;
        $cursor = Consignee::raw()->findOne(['companyID' => $companyID,'_id'=>$masterId,'consignee._id' => $id]);
        $consigneeArray=$cursor->consignee;
        $consigneeLength=count($consigneeArray);
        $i=0;
        $v=0;
        for($i=0; $i<$consigneeLength; $i++)
        {
            $ids=$cursor->consignee[$i]['_id'];
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
        $consignee=(array)$cursor->consignee[$v];
        $consignee=array_merge($companyID,$consignee);
         return response()->json($consignee, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function updateConsignee(Request $request)
    {
        // dd($request);
        $id=(int)$request->id;
        $masterId=(int)$request->comID;
        $companyID=(int)Auth::user()->companyID;
        $Consignee=Consignee::raw()->updateOne(['companyID' => $companyID,'_id' => $masterId,'consignee._id' =>  $id], 
         ['$set' => ['consignee.$.consigneeName' => $request->consigneeName,
         'consignee.$.consigneeAddress' => $request->consigneeAddress,
         'consignee.$.consigneeLocation' => $request->consigneeLocation,
         'consignee.$.consigneePostal' => $request->consigneePostal,
         'consignee.$.consigneeContact' => $request->consigneeContact,
         'consignee.$.consigneeEmail' => $request->consigneeEmail,
         'consignee.$.consigneeTelephone' => $request->consigneeTelephone,
         'consignee.$.consigneeExt' => $request->consigneeExt,
         'consignee.$.consigneeTollFree' => $request->consigneeTollFree,
         'consignee.$.consigneeFax' => $request->consigneeFax,
         'consignee.$.consigneeReceiving' => $request->consigneeShippingHours,
         'consignee.$.consigneeAppointments' => $request->consigneeAppointments,
         'consignee.$.consigneeIntersaction' => $request->consigneeIntersaction,
         'consignee.$.consigneeStatus' => $request->consigneestatus,
         'consignee.$.consigneeRecivingNote' => $request->shippingNotes,
        //  'consignee.$.consigneeInternalNote' => $request->shippingNotes,
         'consignee.$.consigneeInternalNote' => $request->internal_note,
         'consignee.$.edit_by' => Auth::user()->userName,
         'consignee.$.edite_time' => time()]]
     );
     if($Consignee==true)
     {
      $arr = array('status' => 'success', 'message' => 'consignee Updated successfully.','statusCode' => 200); 
      return json_encode($arr);
     }
    }
    public function deleteConsignee(Request $request)
    {
        $id=(int)$request->id;
        $companyID=(int)Auth::user()->companyID;
        $masterId=(int)$request->comID;
        $Consignee=Consignee::raw()->updateOne(['companyID' => $companyID,'_id' => $masterId,'consignee._id' =>  $id], 
            ['$set' => ['consignee.$.deleteStatus' => 'YES','consignee.$.deleteUser' => Auth::user()->userName,'consignee.$.deleteTime' => time()]]
        );
        if($Consignee==true)
        {
         $arr = array('status' => 'success', 'message' => 'consignee deleted successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function restoreConsignee(Request $request)
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
            // echo $masterId;
            foreach($shipIds as $ji)
            {
                $cursor = Consignee::raw()->findOne(['companyID' => $companyID,'_id'=>$masterId,'consignee._id' => (int)$ji]);
                $ConsigneeArray=$cursor->consignee;
                $ConsigneeLength=count($ConsigneeArray);
                $i=0;
                $v=0;
                $data=array();
                for($i=0; $i<$ConsigneeLength; $i++)
                {
                    $ids=$cursor->consignee[$i]['_id'];
                    $ids=(array)$ids;
                    foreach($ids as $value)
                    {
                    
                        foreach($shipIds as $shiper_ids)
                        {
                            $shiper_ids= str_replace( array('"', ']' ), ' ', $shiper_ids);
                            if($value==$shiper_ids)
                            {                        
                                // $data[]=$i;
                                $Shipper=Shipper::raw()->updateOne(['companyID' =>$companyID,'_id' => $masterId,'consignee._id' => (int)$ji], 
                                ['$set' => ['consignee.$.deleteStatus' => 'NO','consignee.$.deleteUser' => Auth::user()->userName,'consignee.$.deleteTime' => time()]]
                            ); 
                            }
                        }
                    }
                }
            }
            
                $arr = array('status' => 'success', 'message' => 'Consignee Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
}
