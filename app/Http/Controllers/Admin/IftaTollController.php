<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\iftaToll;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class IftaTollController extends Controller
{
    public function getIftaToll(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $total_records = 0;
        $cursor = iftaToll::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['size' => ['$size' => ['$tolls']],
            ]]
        ]);
        $totalarray = $cursor;
        $shippersize = 0;
        $docarray = array();
        foreach ($cursor as $v) 
        {
            $shippersize += (int)$v['size'];
            $docarray[] = array("size" => $v['size'], "id" => $v['_id']);
            $total_records = $shippersize;
        }
        $completedata = array();
        $partialdata = array();
        $paginate = AppHelper::instance()->paginate($docarray);
        if (!empty($paginate[0][0][0])) 
        {
            for ($i = 0; $i < sizeof($paginate[0][0][0]); $i++) 
            {
                $docid=$paginate[0][0][0][$i]['doc'];
                $end=$paginate[0][0][0][$i]['end'];
                $start=$paginate[0][0][0][$i]['start'];
                $show1 = iftaToll::raw()->aggregate([
                    ['$match' => ["companyID" => $companyID, "_id" => $docid]],
                    ['$project' => ["companyID" => $companyID, "tolls" => ['$slice' => ['$tolls', $end, $start - $end]]]]
                ]);
                $arrData1 = "";
                foreach ($show1 as $arrData11) 
                {
                    $arrData1 = $arrData11;
                }
                // return $arrData1 = array(
                //     'arrData1' => $arrData1,
                // );
        
                $partialdata[]= $arrData1;
            }
        }
        $completedata[] = $partialdata;
        $completedata[] = $paginate;
        $completedata[] = $total_records;
        echo json_encode($completedata);
    }
    public function createIftaToll(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        
        $maxLength = 6500;
        $docAvailable = AppHelper::instance()->checkDoc(iftaToll::raw(),$companyId,$maxLength);

        if($docAvailable != "No")
        {
            $info = (explode("^",$docAvailable));
            $docId = $info[1];
            $counter = $info[0];

            $cons = array(
                '_id'=>AppHelper::instance()->getAdminDocumentSequence($companyID,iftaToll::raw(),'tolls',(int)$docId),
                'tollDate' => strtotime($request->$tollDate),
                'transType' => $request->transType,
                'location' => $request->location,
                'transponder' => $request->transponder,
                'licensePlate' => $request->licensePlate,
                'amount' => $request->amount,
                'truckNo' => $request->truckno,
                'invoiceNumber' => $request->invoiceNo,
                'transactionTime' => $request->transactionTime,
                'counter' =>0,
                'deleteStatus' => "NO",
                'deleteUser' => "",
                'deleteTime' => "",
                'insertedUser' => Auth::user()->userName,
                'insertedTime' => time(),
            );
            iftaToll::raw()->updateOne(['companyID' => $companyID,'_id'=>(int)$docId],['$push'=>['tolls'=> $cons]]);
            $cons['masterID'] = $docId;
            echo json_encode($cons);
        }
        else 
        {
            $id = AppHelper::instance()->getNextSequence("toll_data", $db);
            $request->setId($id);
            $cons = iterator_to_array($category);
            iftaToll::raw()->insertOne($cons);
            $masterID = $cons['_id'];
            $cons["tolls"][0]['masterID'] = $masterID;
            echo json_encode($cons["tolls"][0]);
        }
    }
    public function editIftaToll(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;
        $iftaToll=iftaToll::where("companyID",$companyID)->first();
        $iftaTollArray=$iftaToll->tolls;
        $iftaTollLenght=count($iftaTollArray);
        $i=0;
        $v=0;
        for($i=0; $i<$iftaTollLenght; $i++)
        {
            $ids=$iftaToll->tolls[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value == $id)
                {
                    $v= $i;
                }
            }
        }
        $iftaToll->tolls= $iftaTollArray[$v];
        return response()->json($iftaToll);
    }
    public function updateIftaToll(Request $request)
    {
        $id=(int)$request->id;
        $companyID=(int)$request->comId;
        $iftaToll= iftaToll::raw()->updateOne(['companyID' =>$companyID,'_id' => (int)$this->documentID, 'tolls._id' => $id],
            ['$set' => ['tolls.$.tollDate'  => strtotime($request->tollDate),
            'tolls.$.transType'  => $request->transType,
            'tolls.$.location'  => $request->location,
            'tolls.$.transponder'  => $request->transponder,
            'tolls.$.licensePlate'  => $request->licensePlate,
            'tolls.$.amount'  => $request->amount,
            'tolls.$.truckNo'  => $request->truckNo,
            'tolls.$.invoiceNumber'  => $request->invoiceNumber,
            'tolls.$.transactionTime'  => $request->transactionTime,
            'tolls.$.'.'edit_by' =>  Auth::user()->userName, 
            'tolls.$.'.'edit_time' =>  time()
            ]]
        );
        if($iftaToll==true)
        {
            $arr = array('status' => 'success', 'message' => 'Ifta Toll Updated successfully.','statusCode' => 200); 
            return json_encode($arr);
        } 
    
    }
    public function deleteIftaToll(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;
        $iftaToll = iftaToll::where('companyID',$companyID)->first();
        $iftaTollArray=$iftaToll->tolls;
        $fuelLength=count($iftaTollArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$iftaToll->tolls[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        $iftaTollArray[$v]['deleteStatus']="YES";
        $iftaToll->tolls=$iftaTollArray;
        if($iftaToll->save())
        {
         $arr = array('status' => 'success', 'message' => 'Fuel Vendor Ifta Toll delete successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
    }
    public function restoreIftaToll(Request $request)
    {
        $fuel_ids=$request->all_ids;
        // dd($fuel_ids);
        $custID=(array)$request->custID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $iftaToll = iftaToll::where('companyID',$company_id )->first();
            $iftaTollArray=$iftaToll->tolls;
            $arrayLength=count($iftaTollArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$iftaToll->tolls[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    $fuel_ids= str_replace( array('[', ']'), ' ', $fuel_ids);
                    if(is_string($fuel_ids))
                    {
                        $fuel_ids=explode(",",$fuel_ids);
                    }
                    foreach($fuel_ids as $fue_v_id)
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
                $iftaTollArray[$row]['deleteStatus'] = "NO";
                $iftaToll->tolls= $iftaTollArray;
                $save=$iftaToll->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Ifta Toll Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
    }
    public function deleteMultiIftaToll(Request $request)
    {
        $fuel_ids=$request->all_ids;
        $custID=(array)$request->custID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $iftaToll = iftaToll::where('companyID',$company_id )->first();
            $iftaTollArray=$iftaToll->tolls;
            $arrayLength=count($iftaTollArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$iftaToll->tolls[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    $fuel_ids= str_replace( array('[', ']'), ' ', $fuel_ids);
                    if(is_string($fuel_ids))
                    {
                        $fuel_ids=explode(",",$fuel_ids);
                    }
                    foreach($fuel_ids as $fue_v_id)
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
                $iftaTollArray[$row]['deleteStatus'] = "YES";
                $iftaToll->tolls= $iftaTollArray;
                $save=$iftaToll->save();
            }
            if (isset($save)) 
            {
                $arr = array('status' => 'success', 'message' => 'Ifta Toll Deleted successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
    }
   
    public function export_Tolls(Request $request) 
    {
        $companyId=(int)Auth::user()->companyID;
        $p[] = array("Transaction Date","Transaction Type","Location","Transponder","License Plate","Amount","Truck No","Invoice");
        $i_fuel = iftaToll::raw()->find(['companyID' => $companyId]);
        foreach ($i_fuel as $bdebit) 
        {
            $fuel_R = $bdebit['tolls'];
           
            foreach ($fuel_R as $test) 
            {
                $p[] = array(
                    date('m/d/Y',$test['tollDate']),
                    $test['transType'],
                    str_replace(",","",$test['location']),
                    $test['transponder'],
                    $test['licensePlate'],
                    $test['amount'],
                    $test['truckNo'],
                    $test['invoiceNumber'],
                    );
            }
        }
        if (sizeof($p) > 1) 
        {
            echo json_encode($p);
        }
        else
        {
            unset($p);
            $p = "";
            echo json_encode($p);
        }
    }
    // public function import_Tolls(Request $request) 
    // {

    //     $data = $data11['exceldata'];
    //     $length = $data11['length'];
    //     $maxLength = $data11['maxLength'];
    //     $companyId = (int)$_SESSION['companyId'];

    //     $docAvailable = AppHelper::instance()->checkDoc(iftaToll::raw(),$companyId,$maxLength);
    
    //     if($docAvailable !=  "No"){
    //         $info = (explode("^",$docAvailable));
    //         $docId = $info[1];
    //         $counter = $info[0];

    //         $document = AppHelper::instance()->getDocument($data, $length, $maxLength, $counter);
    //         $p = $document['arrData'];
    //         $q = $document['lastarray'];
     
    //         iftaToll::raw()->updateOne(
    //             ['companyID' => (int)$_SESSION['companyId'],'_id'=>(int)$docId],
    //             ['$push' => ['tolls' => ['$each' => $p[0]]]
    //         ]); 
    //         iftaToll::raw()->updateOne(['companyID'=> (int)$_SESSION['companyId'], '_id' => (int)$docId], 
    //         ['$inc' => ['counter'=>(int)sizeof($p[0])]]);

    //         if(!empty($q[0])){
    //             $y1 = sizeof($q[0]);
    //             for($b = 0; $b < $y1 ; $b++){
    //               $q[0][$b]['masterID'] = $docId;   
    //             }    
    //            $lid[] = $q[0];
    //         }  

    //     if((!empty($p[1])) && (!empty($q[1]))){
    //         $did = AppHelper::instance()->getNextSequence("toll_data", $db);
    //         iftaToll::raw()->insertOne(
    //             array('_id' => $did,
    //             'companyID' => $_SESSION['companyId'],
    //             'counter' => (int)sizeof($p[1]),
    //             'tolls' => $p[1],
    //             )
    //         );
    //         $y2 = sizeof($q[1]);
    //             for($b = 0; $b < $y2 ; $b++){
    //             $q[1][$b]['masterID'] = $did;   
    //             }    
    //             $lid[] = $q[1];          
    //         }   
    //         echo json_encode($lid);
    //     }else{

    //         for($i = 0; $i <sizeof($data); $i++){
    //             $data[$i]['_id'] = (int) $data[$i]['_id'];  
    //             $data[$i]['counter'] = (int)$data[$i]['counter'];
    //             $data[$i]['amount'] = (float) $data[$i]['amount'];    
    //             $data[$i]['tollDate'] = (int)strtotime($data[$i]['tollDate']);  
    //         }
    //         $docid = AppHelper::instance()->getNextSequence("toll_data", $db);
    //         iftaToll::raw()->insertOne(
    //             array('_id' => $docid,
    //             'companyID' => $_SESSION['companyId'],
    //             'counter' =>  (int)$length,
    //             'tolls' => $data,
    //             ));
    //             $x = sizeof($data);
    //             if( $x > 100){
    //                 $lastentry[] = array_slice( $data, $x-100 ,$x );
    //             }else{
    //                 $lastentry[] = $data;
    //             }
    //             $y = sizeof($lastentry[0]);
    //                 for($b = 0; $b < $y ; $b++){
    //                     $lastentry[0][$b]['masterID'] = $docid;   
    //                 }    
    //             $lid[] = $lastentry[0];
    //         echo json_encode($lid);  
    //     }
    // }
    
}
