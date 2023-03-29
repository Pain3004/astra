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
        $paginate = $helper->paginate($docarray);
        if (!empty($paginate[0][0][0])) 
        {
            for ($i = 0; $i < sizeof($paginate[0][0][0]); $i++) 
            {
                $docid= $paginate[0][0][0][$i]['doc'];
                $end=$paginate[0][0][0][$i]['end'];
                $start=$paginate[0][0][0][$i]['start'];
                $show1 = $db->consignee->aggregate([
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
                // $partialdata[] = $this->getData($db, $companyID, $paginate[0][0][0][$i]['doc'], $paginate[0][0][0][$i]['end'], $paginate[0][0][0][$i]['start']);
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
        $companyId = $companyID=(int)Auth::user()->companyID;
        if($request->addressType=="consignee")
        {
            $docAvailable = $mhelper->checkDoc(Consignee::raw(),$companyId,$maxLength);
            
            if($docAvailable != "No"){
            $info = (explode("^",$docAvailable));
            $docId = $info[1];
            $counter = $info[0];

            $cons = array(
                '_id' => $helper->getAdminDocumentSequence((int)$_SESSION['companyId'], Consignee::raw(),'consignee',$docId),
                'counter' => 0,
                'consigneeName' => $this->consigneeName,
                'consigneeAddress' => $this->consigneeAddress,
                'consigneeLocation' => $this->consigneeLocation,
                'consigneePostal' => $this->consigneePostal,
                'consigneeContact' => $this->consigneeContact,
                'consigneeEmail' => $this->consigneeEmail,
                'consigneeTelephone' => $this->consigneeTelephone,
                'consigneeExt' => $this->consigneeExt,
                'consigneeTollFree' => $this->consigneeTollFree,
                'consigneeFax' => $this->consigneeFax,
                'consigneeReceiving' => $this->consigneeReceiving,
                'consigneeAppointments' => $this->consigneeAppointments,
                'consigneeIntersaction' => $this->consigneeIntersaction,
                'consigneeStatus' => $this->consigneeStatus,
                'consigneeRecivingNote' => $this->consigneeRecivingNote,
                'consigneeInternalNote' => $this->consigneeInternalNote,
                'insertedTime' => time(),
                'insertedUserId' => $_SESSION['userName'],
                'deleteStatus' => "NO",
                'deleteUser' => "",
                'deleteTime' => "",
            );
                Consignee::raw()->updateOne(['companyID' => (int)$_SESSION['companyId'],'_id' => (int)$docId], ['$push' => ['consignee' => $cons]]);
                $cons['masterID'] = $docId;
                echo json_encode($cons);
            } else {
                $id = $helper->getNextSequence("consignee", $db);
                $this->setId($id);
                $cons = iterator_to_array($consignee);
                Consignee::raw()->insertOne($cons);
                $masterID = $cons['_id'];
                $cons["consignee"][0]['masterID'] = $masterID;
                echo json_encode($cons["consignee"][0]);
            }
        }
    }

    public function editConsignee(Request $request)
    {
        $id=$request->id;
        $companyID=(int)65;
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
        $companyID=(int)65;
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
        $id=(int)$request->id;
        $companyID=(int)Auth::user()->companyID;
        $masterId=(int)$request->masterId;
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
        $consiId=$request->id;
        dd($consiId);
        $custID=(array)65;
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
