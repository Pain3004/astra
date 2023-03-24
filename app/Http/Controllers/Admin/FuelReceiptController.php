<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuelReceipt;
use App\Models\Invoiced;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use App\Helpers\AppHelper;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class FuelReceiptController extends Controller
{
    public function getFuelReceipt(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $total_records = 0;
        $cursor = FuelReceipt::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['size' => ['$size' => ['$fuel_receipt']],
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
                $docid= $paginate[0][0][0][$i]['doc'];
                $end=$paginate[0][0][0][$i]['end'];
                $start=$paginate[0][0][0][$i]['start'];
                $show1 = FuelReceipt::raw()->aggregate([
                    ['$match' => ["companyID" => $companyID, "_id" => $docid]],
                    ['$project' => ["companyID" => $companyID, "fuel_receipt" => ['$slice' => ['$fuel_receipt', $end, $start - $end]]]],
                ]);
                $arrData1 = "";
                foreach ($show1 as $arrData11) 
                {
                    $arrData1 = $arrData11;
                }
                $arrData1 = array(
                    'arrData1' => $arrData1,
                );
                $partialdata[]= $arrData1;
                // $partialdata[] = $this->getData($db, $companyID, $paginate[0][0][0][$i]['doc'], $paginate[0][0][0][$i]['end'], $paginate[0][0][0][$i]['start']);
            }
        }
        $completedata[] = $partialdata;
        $completedata[] = $paginate;
        $completedata[] = $total_records;
        echo json_encode($completedata);
    }
    public function createFuelReceipt(Request $request)
    {
        $companyId=(int)Auth::user()->companyID;
        $FuelReceipt = FuelReceipt::where('companyID',$companyId)->get();
        return response()->json($FuelReceipt, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function saveFuelReceipt(Request $request)
    {
        $companyId=(int)Auth::user()->companyID;
        // $totalFuelReceiptArray=0;
        // $getFuelReceipt = FuelReceipt::where('companyID',$companyId)->get();
        // foreach($getFuelReceipt as $getFuelReceipt)
        // {
        //     if($getFuelReceipt)
        //     {
           
        //         $FuelReceiptArray=$getFuelReceipt->fuel_receipt;
        //         $totalFuelReceiptArray=count($FuelReceiptArray)+ 1;
        //         $ids_trip=array();
        //         foreach( $FuelReceiptArray as $ids)
        //         {
        //             $ids_trip[]=$ids['_id'];
        //         }
        //         $ids_trip=max($ids_trip);
        //     }
        //     $date=$request->date;
        //     $date = strtotime($date);
        //     $FuelReceiptData[]=array(    
        //         '_id' => $ids_trip+1 ,
        //         'counter' => $ids_trip+1,
        //         'driverName' => $request->driverName,
        //         'driverNumber' => $request->driverNo,
        //         'cardNo' => $request->cardNumber,
        //         'paymentType'=>$request->paymentType,
        //         'category' => $request->fuelVendor,
        //         'fuelType' => $request->fuelType,
        //         'truckNumber' => $request->truckNumber,
        //         'transactionDate'=>$date,
        //         'transactionTime' => $request->transactionTime,
        //         'locationName' => $request->locationName,
        //         'locationCity' => $request->locationCity,
        //         'locationState' => $request->locationState,
        //         'quantity' => $request->quantity,
        //         'amount' => $request->amount,
        //         'totalAmount' => $request->totalAmount,
        //         'transactionDiscount' => $request->transactionDiscount,
        //         'transactionFee' => $request->transactionFee,
        //         'transactionGross' => $request->transactionGross,
        //         'invoiceNo' => $request->invoiceNo,
        //         'insertedTime' => '' ,
        //         'insertedUserId' => '' ,
        //         'deleteStatus' => 'NO' ,
        //         'deleteUser' => '' ,
        //         'deleteTime' => '' ,
        //         'averagedays' =>'' ,
        //         'totalloads' => '' ,

        //     );
               
        //     if($getFuelReceipt)
        //     {
        //         FuelReceipt::where(['companyID' =>$companyId])->update([
        //             'counter'=> $totalFuelReceiptArray,
        //             'fuel_receipt' =>array_merge($FuelReceiptArray,$FuelReceiptData) ,
                    
        //         ]);

        //         $arrCustome = array('status' => 'success', 'message' => 'Fuel Receipt added successfully.'); 
        //         return json_encode($arrCustome);
        //     }
        // }   
        
        
        $maxLength = 6500;
        $docAvailable =AppHelper::instance()->checkDoc(FuelReceipt::raw(),$companyId,$maxLength);
        if($docAvailable != "No")
        {
            $info = (explode("^",$docAvailable));
            $docId = $info[1];
            $counter = $info[0];

            $cons = array(
                '_id'=>AppHelper::instance()->getAdminDocumentSequence($companyId,FuelReceipt::raw(),'fuel_receipt',(int)$docId),
                'counter' => 0,
                'driverName'=>$request->driverName,
                'driverNumber'=>$request->driverNo,
                'cardNo'=>$request->cardNumber,
                'category'=>$request->fuelVendor,
                'fuelType' => $request->fuelType,
                'fuelId' => $request->fuelId,
                'truckNumber'=>$request->truckNumber,
                'transactionDate'=>strtotime($request->date),
                'transactionTime'=>$request->transactionTime,
                'locationName'=>$request->locationName,
                'locationCity'=>$request->locationCity,
                'locationState'=>$request->locationState,
                'quantity'=>$request->quantity,
                'amount'=>$request->amount,
                'totalAmount'=>$request->totalAmount,
                'transactionDiscount'=>$request->transactionDiscount,
                'transactionFee'=>$request->transactionFee,
                'transactionGross'=>$request->transactionGross,
                'invoiceNo'=>$request->invoiceNo,
                'deleteStatus' => "NO",
                'deleteUser' => "",
                'deleteTime' => "",
                'insertedUser' => Auth::user()->userName,
                'insertedTime' => time(),
                // 'duplicateID' => $request->duplicateID,
                // 'fuelcardmain' => $request->fuelcardmain 
            );

            FuelReceipt::raw()->updateOne(['companyID' =>$companyId,'_id'=>(int)$docId],['$push'=>['fuel_receipt'=> $cons]]); 
            $cons['masterID'] = $docId;
            echo json_encode($cons);

        }  
        else
        {
            $id = AppHelper::instance()->getNextSequence("fuel_receipts_ifta", );
            $request->setId($id);
            $cons = iterator_to_array($category);
            FuelReceipt::raw()->insertOne($cons);
            $masterID = $cons['_id'];
            $cons["fuel_receipt"][0]['masterID'] = $masterID;
            echo json_encode($cons["fuel_receipt"][0]);
        }
    }
    public function editFuelReceipt(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->companyID;
        $FuelReceipt=FuelReceipt::where("companyID",$companyID)->first();
        $FuelReceiptArray=$FuelReceipt->fuel_receipt;
        $FuelReceiptLenght=count($FuelReceiptArray);
        $i=0;
        $v=0;
        for($i=0; $i<$FuelReceiptLenght; $i++)
        {
            $ids=$FuelReceipt->fuel_receipt[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value == $id)
                {
                    $v= $i;
                }
            }
        }
        $FuelReceipt->fuel_receipt= $FuelReceiptArray[$v];
        return response()->json($FuelReceipt);  
    }
    public function updateFuelReceipt(Request $request)
    {
        // dd($request->driverName);
        $id=$request->id;
        $companyID=(int)$request->comId;
    //     $fuelReceipt=FuelReceipt::where('companyID',$companyID)->first();
    //     $fuelReceiptArray=$fuelReceipt->fuel_receipt;
    //     $arrayLength=count($fuelReceiptArray);
    //     $i=0;
    //     $v=0;
    //    for ($i=0; $i<$arrayLength; $i++){
    //         $ids=$fuelReceipt->fuel_receipt[$i];
    //         foreach ($ids as $value){
    //             if($value==$id)
    //             {
    //                 $v=$i;
    //             }
    //         }
    //     }
    //     $date=$request->date;
    //     $date = strtotime($date);
    //     $fuelReceiptArray[$v]['driverName' ]= $request->driverName;
    //     $fuelReceiptArray[$v]['paymentType']=$request->paymentType;
    //     $fuelReceiptArray[$v]['driverNumber' ]= $request->driverNo;
    //     $fuelReceiptArray[$v]['cardNo' ]= $request->cardNumber;
    //     $fuelReceiptArray[$v]['category' ]= $request->fuelVendor;
    //     $fuelReceiptArray[$v]['fuelType' ]= $request->fuelType;
    //     $fuelReceiptArray[$v]['truckNumber' ]= $request->truckNumber;
    //     $fuelReceiptArray[$v]['transactionDate']=$date;
    //     $fuelReceiptArray[$v]['transactionTime' ]= $request->transactionTime;
    //     $fuelReceiptArray[$v]['locationName' ]= $request->locationName;
    //     $fuelReceiptArray[$v]['locationCity' ]= $request->locationCity;
    //     $fuelReceiptArray[$v]['locationState' ]= $request->locationState;
    //     $fuelReceiptArray[$v]['quantity' ]= $request->quantity;
    //     $fuelReceiptArray[$v]['amount' ]= $request->amount;
    //     $fuelReceiptArray[$v]['totalAmount' ]= $request->totalAmount;
    //     $fuelReceiptArray[$v]['transactionDiscount' ]= $request->transactionDiscount;
    //     $fuelReceiptArray[$v]['transactionFee' ]= $request->transactionFee;
    //     $fuelReceiptArray[$v]['transactionGross' ]= $request->transactionGross;
    //     $fuelReceiptArray[$v]['invoiceNo' ]= $request->invoiceNo;
    //     $fuelReceiptArray[$v]['insertedTime' ]= '' ;
    //     $fuelReceiptArray[$v]['insertedUserId' ]= '' ;
    //     $fuelReceiptArray[$v]['deleteStatus' ]= 'NO' ;
    //     $fuelReceiptArray[$v]['deleteUser' ]= '' ;
    //     $fuelReceiptArray[$v]['deleteTime' ]= '' ;
    //     $fuelReceiptArray[$v]['averagedays' ]='' ;
    //     $fuelReceiptArray[$v]['totalloads' ]= '' ;
    //     $fuelReceipt->fuel_receipt= $fuelReceiptArray;
    //     if($fuelReceipt->save())
    //     {
    //      $arr = array('status' => 'success', 'message' => 'fuel receipt updated successfully.','statusCode' => 200); 
    //      return json_encode($arr);
    //     }
    }
    public function deleteFuelReceipt(Request $request)
    {
        $id=(int)$request->id;
        $companyID=(int)$request->companyID;
        FuelReceipt::raw()->updateOne(['companyID' => (int) $_SESSION['companyId'],'_id' => (int)$this->documentID, 'fuel_receipt._id' => (int)$this->getId()],
        ['$set' => ['fuel_receipt.$.' . $f_receipt->getCategory() => $f_receipt->gettruckNumber(),'fuel_receipt.$.'.'edit_by' =>  $_SESSION['userName'], 'fuel_receipt.$.'.'edit_time' =>  time()
        ]]
    );
    //     $fuelReceipt=FuelReceipt::where('companyID',$companyID)->first();
    //     $fuelReceiptArray=$fuelReceipt->fuel_receipt;
    //     $arrayLength=count($fuelReceiptArray);
    //     $i=0;
    //     $v=0;
    //    for ($i=0; $i<$arrayLength; $i++){
    //         $ids=$fuelReceipt->fuel_receipt[$i];
    //         foreach ($ids as $value){
    //             if($value==$id)
    //             {
    //                 $v=$i;
    //             }
    //         }
    //     }
    //     $fuelReceiptArray[$v]['deleteStatus'] = "YES";
    //     $fuelReceipt->fuel_receipt= $fuelReceiptArray;
    //     if($fuelReceipt->save())
    //     {
    //      $arr = array('status' => 'success', 'message' => 'fuel receipt Deleted successfully.','statusCode' => 200); 
    //      return json_encode($arr);
    //     }
    }
    public function restoreFuelReceipt(Request $request)
    {
        $fuelReceIds=$request->all_ids;
        $custID=(array)$request->custID;
        foreach($custID as $fuel_re_id)
        {
            $fuel_re_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $fuel_re_id);
            $fuel_re_id=(int)$fuel_re_id;
            $FuelReceipt = FuelReceipt::where('companyID',$fuel_re_id )->first();
            $fuelReceiptArray=$FuelReceipt->fuel_receipt;
            $arrayLength=count($fuelReceiptArray);            
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$FuelReceipt->fuel_receipt[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    $fuelReceIds= str_replace( array('[', ']'), ' ', $fuelReceIds);
                    if(is_string($fuelReceIds))
                    {
                        $fuelReceIds=explode(",",$fuelReceIds);
                    }
                    foreach($fuelReceIds as $fuelReId)
                    {
                        $fuelReId= str_replace( array('"', ']' ), ' ', $fuelReId);
                        if($value==$fuelReId)
                        {                        
                            $data[]=$i; 
                        }
                    }
                }
            }
            foreach($data as $row)
            {
                $fuelReceiptArray[$row]['deleteStatus'] = "NO";
                $FuelReceipt->fuel_receipt= $fuelReceiptArray;
                $save=$FuelReceipt->save();
            }
            if ($save) {
                $arr = array('status' => 'success', 'message' => 'Fuel Receipt Restored successfully.','statusCode' => 200); 
                return json_encode($arr);
            }
        }
    }
   public function getInvoicedNumber(Request $request)
   {
        $companyId=(int)Auth::user()->companyID;
        $Invoiced = Invoiced::where('companyID',$companyId)->get();
        foreach($Invoiced as $row)
        {
            $Invoiced=collect($row->load);
            $Invoiced = $Invoiced->chunk(10);
            $Invoiced= $Invoiced->toArray();
        }
        // dd($Invoiced);
        return response()->json($Invoiced, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
   }
   public function deleteMulFuelReceipt(Request $request)
   {
        $fuelReceIds=$request->all_ids;
        $custID=(array)$request->custID;
        // foreach($custID as $fuel_re_id)
        // {
        //     $fuel_re_id=str_replace( array( '\'', '"',
        //     ',' , ' " " ', '[', ']' ), ' ', $fuel_re_id);
        //     $fuel_re_id=(int)$fuel_re_id;
        //     $FuelReceipt = FuelReceipt::where('companyID',$fuel_re_id )->first();
        //     // dd($FuelReceipt);
        //     $fuelReceiptArray=$FuelReceipt->fuel_receipt;
        //     $arrayLength=count($fuelReceiptArray);            
        //     $i=0;
        //     $v=0;
        //     $data=array();
        //     for ($i=0; $i<$arrayLength; $i++){
        //         $ids=$FuelReceipt->fuel_receipt[$i]['_id'];
        //         $ids=(array)$ids;
        //         foreach ($ids as $value){
        //             $fuelReceIds= str_replace( array('[', ']'), ' ', $fuelReceIds);
        //             if(is_string($fuelReceIds))
        //             {
        //                 $fuelReceIds=explode(",",$fuelReceIds);
        //             }
        //             foreach($fuelReceIds as $fuelReId)
        //             {
        //                 $fuelReId= str_replace( array('"', ']' ), ' ', $fuelReId);
        //                 if($value==$fuelReId)
        //                 {                        
        //                     $data[]=$i; 
        //                 }
        //             }
        //         }
        //     }
        //     // dd($data);
        //     foreach($data as $row)
        //     {
        //         $fuelReceiptArray[$row]['deleteStatus'] = "YES";
        //         $FuelReceipt->fuel_receipt= $fuelReceiptArray;
        //         $save=$FuelReceipt->save();
        //     }
        //     if ($save) {
        //         $arr = array('status' => 'success', 'message' => 'Fuel Receipt Deleted successfully.','statusCode' => 200); 
        //         return json_encode($arr);
        //     }
        // }

        $svalue = $request->all_ids;
        $svalue= str_replace( array('[', ']'), ' ', $svalue);
        if(is_string($svalue))
        {
            $svalue=explode(",",$svalue);
        }
        // dd($svalue);
        $companyID=(int)Auth::user()->companyID;
        $list = [];
        $docId = []; 
        for($i = 0 ; $i < sizeof($svalue); $i++ )
        {
           $toll1=$svalue[$i];
            // $toll1 = (explode(")",$svalue[$i]));
            // print_r($svalue[$i]);
            if(array_key_exists($toll1[1],$docId))
            {
                array_push($docId[$toll1[1]],(int)$toll1[0]);
            }
            else
            {
                $docId[$toll1[1]] = array(0 => (int)$toll1[0]);  
            }
        }     
        $keys = array_keys($docId);      
        for($j = 0; $j<sizeof($docId); $j++)
        {
            $list = $docId[$keys[$j]];
            $dId = $keys[$j];
            $counting = sizeof($list);
            
            FuelReceipt::raw()->updateOne(
                ['companyID' => $companyID,'_id' => (int)$dId],
                ['$set' => ['fuel_receipt.$[elem].deleteStatus' => "YES", 'fuel_receipt.$[elem].deleteUser' =>Auth::user()->userName, 'fuel_receipt.$[elem].deleteTime' => time()]],
                ['multi' => true,'arrayFilters' => [['elem._id' => ['$in' => $list]]]]
            );

            $deleteEntry = FuelReceipt::raw()->updateOne(
                ['companyID' => $companyID,'_id' => (int)$dId],
                ['$pull' => ['fuel_receipt' => ['_id' =>['$in' => $list]]]]);
            FuelReceipt::raw()->updateOne(
                ['companyID' => $companyID,'_id' => (int)$dId],
                ['$inc' => ['counter' => -(int)$counting]]);
                
        }
   }
   public function export_FuelReceipts(Request $request)
   {
        $companyId=(int)Auth::user()->companyID;
        $p[] = array("Driver Name","Driver Number","Card Number","Fuel Vendor","Fuel Type","Transaction Date","Transaction Time","Location Name","Location City", "Location State","Quntity","Amount","Total Amount","Transaction Discount","Transaction Fees", "Transaction Gross", "Invoice No");
       
        $i_fuel = FuelReceipt::raw()->find(['companyID' => $companyId]);
        foreach ($i_fuel as $bdebit) 
        {
            $fuel_R = $bdebit['fuel_receipt'];
            foreach ($fuel_R as $test) 
            {
                $p[] = array(
                    $test['driverName'],
                    $test['driverNumber'],
                    $test['cardNo'],
                    $test['category'],
                    $test['fuelType'],
                    date('m/d/Y',$test['transactionDate']),
                    $test['transactionTime'],
                    $test['locationName'],
                    str_replace(",","",$test['locationCity']),
                    $test['locationState'],
                    $test['quantity'],
                    $test['amount'],
                    $test['totalAmount'],
                    $test['transactionDiscount'],
                    $test['transactionFee'],
                    $test['transactionGross'],
                    $test['invoiceNo'],
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
    // public function import_FuelReceipts (Request $request) 
    // {
      
    //     $data =$request->exceldata;
    //     $length =$request->length;
    //     $maxLength = 6500;
    //     $companyId = (int)Auth::user()->companyID;

    //    $docAvailable = AppHelper::instance()->checkDoc(FuelReceipt::raw(),$companyId,$maxLength);

    //    if($docAvailable !=  "No")
    //    {
    //         $info = (explode("^",$docAvailable));
    //         $docId = $info[1];
    //         $counter = $info[0];

    //         $document = AppHelper::instance()->getDocument($data, $length, $maxLength, $counter);
    //         $p = $document['arrData'];
    //         $q = $document['lastarray'];
 
    //         FuelReceipt::raw()->updateOne(
    //             ['companyID' => $companyId,'_id'=>(int)$docId],
    //             ['$push' => ['fuel_receipt' => ['$each' => $p[0]]]
    //         ]); 
    //         FuelReceipt::raw()->updateOne(['companyID'=> $companyId, '_id' => (int)$docId], 
    //         ['$inc' => ['counter'=>(int)sizeof($p[0])]]);

    //         if(!empty($q[0]))
    //         {
    //             $y1 = sizeof($q[0]);
    //             for($b = 0; $b < $y1 ; $b++)
    //             {
    //               $q[0][$b]['masterID'] = $docId;   
    //             }    
    //            $lid[] = $q[0];
    //         }  
    //         if((!empty($p[1])) && (!empty($q[1])))
    //         {
    //             $did = AppHelper::instance()->getNextSequence("fuel_receipts_ifta");
    //             FuelReceipt::raw()->insertOne(
    //                 array('_id' => $did,
    //                 'companyID' => $companyId,
    //                 'counter' => (int)sizeof($p[1]),
    //                 'fuel_receipt' => $p[1],
    //             ));
    //             $y2 = sizeof($q[1]);
    //             for($b = 0; $b < $y2 ; $b++)
    //             {
    //                 $q[1][$b]['masterID'] = $did;   
    //             }    
    //             $lid[] = $q[1];          
    //         }   
    //         echo json_encode($lid); 
    //     }
    //     else
    //     {

    //         for($i = 0; $i <sizeof($data); $i++)
    //         {
    //             $data[$i]['_id'] = (int) $data[$i]['_id'];  
    //             $data[$i]['counter'] = (int)$data[$i]['counter'];
    //             $data[$i]['amount'] = (float) $data[$i]['amount'];  
    //             $data[$i]['totalAmount'] = (float) $data[$i]['totalAmount'];  
    //             $data[$i]['transactionDate'] = strtotime($data[$i]['transactionDate']);  
    //         }
    //         $docid = AppHelper::instance()->getNextSequence("fuel_receipts_ifta", $db);
    //         FuelReceipt::raw()->insertOne(
    //             array('_id' => $docid,
    //             'companyID' => $companyId,
    //             'counter' => (int)$length,
    //             'fuel_receipt' => $data,
    //         ));
    //         $x = sizeof($data);
    //         if( $x > 100)
    //         {
    //             $lastentry[] = array_slice( $data, $x-100 ,$x );
    //         }
    //         else
    //         {
    //             $lastentry[] = $data;
    //         }
    //         $y = sizeof($lastentry[0]);
    //         for($b = 0; $b < $y ; $b++)
    //         {
    //             $lastentry[0][$b]['masterID'] = $docid;   
    //         }    
    //         $lid[] = $lastentry[0];
    //         echo json_encode($lid);             
    //     }
    // }

    
}
