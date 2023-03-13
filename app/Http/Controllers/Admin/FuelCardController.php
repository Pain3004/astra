<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuelCard;
use App\Models\IftaCardCategory;
use App\Models\FuelVendor;
use App\Models\Driver;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use App\Helpers\AppHelper;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class FuelCardController extends Controller
{
    public function getFuelCard(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $total_records = 0;
        $cursor = IftaCardCategory::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['size' => ['$size' => ['$ifta_card']],
            ]]
        ]);
        foreach ($cursor as $v) {
            $total_records += (int)$v['size'];
        }
        $completedata = array();
        $partialdata = array();
        if(!empty($total_records)){
            $collection = Driver::raw();
        $cldriver = $collection->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['driver._id' => 1,'driver.driverName'=>1]]
        ]);
        $driverName = array();
        foreach ($cldriver as $dr) {
            $driver_array = $dr['driver'];
            foreach ($driver_array as $da) {
                $driver_id = $da['_id'];
                $driverName[$driver_id] = $da['driverName'];
            }
        }
        $collection = FuelVendor::raw();
        $card = $collection->find(["companyID" => $companyID]);
        $fuelCardType = array();
        foreach ($card as $dr) {
            $card_array = $dr['fuelCard'];
            foreach ($card_array as $da) {
                $card_id = $da['_id'];
                $fuelCardType[$card_id] = $da['fuelCardType'];
            }
        }
        $collection = IftaCardCategory::raw();
        $show1 = $collection->find(array('companyID' => $companyID));
        $arrData1 = "";
        foreach ($show1 as $row) {
            $mainID = $row;
        }
        $arrData1 = array(
            'mainID' => $mainID,
            'driverName' => $driverName,
            'fuelCardType' => $fuelCardType,
        );
        $partialdata[]= $arrData1;
        // $partialdata[] = $this->getData($db, $companyID);
        }
        $completedata[] = $partialdata;
        $completedata[] = $total_records;
        echo json_encode($completedata);
    }
    public function createFuelCard(Request $request)
    {       
        $companyID=(int)Auth::user()->companyID;
        $masterhelper = new AppHelper();
        $collection = IftaCardCategory::raw();
                $criteria = array(
                   'companyID' => $companyID,
                );
                $doc = $collection->findOne($criteria);
                $masterID = $doc['_id'];
        if (!empty($doc)) 
        {
            $cons = array(
                '_id'=>$masterhelper->getMasterDocumentSequence($companyID,IftaCardCategory::raw(),'ifta_card'),
                'counter'=> 0,
                'cardHolderName'=>$request->cardHolderName,
                'employeeNo'=>$request->employeeNo,
                'iftaCardNo'=>$request->iftaCardNo,
                'cardType'=>$request->cardType,
                'insertedTime' => time(),
                'insertedUserId' => Auth::user()->userName,
                'deleteStatus' => "NO",
                'deleteUser' => "",
                'deleteTime' => "",
            );
            IftaCardCategory::raw()->updateOne(['companyID' => $companyID],['$push'=>['ifta_card'=> $cons]]);
            $cons['masterID'] = $masterID;
            $fuelCardType = $masterhelper->fuelCardArray($request->cardType);
            $driverName = $masterhelper->driverArray($request->cardHolderName);
            $fullData = array(
                'mainarray' => $cons,
                'fuelCardType' => $fuelCardType,
                'driverName' => $driverName,
            );
            echo json_encode($fullData);

        } 
        else 
        {
            $id = $helper->getNextSequence("ifta_card_cat", DB::raw());
            $this->setId($id);
            $cons = iterator_to_array($category);
            IftaCardCategory::raw()->insertOne($cons);
            $masterID = $cons['_id'];
            $cons["ifta_card"][0]['masterID'] = $masterID;
            $fuelCardType = $masterhelper->fuelCardArray($db,$this->cardType);
            $driverName = $masterhelper->driverArray($db,$this->cardHolderName);
            $fullData = array(
                'mainarray' => $cons["ifta_card"][0],
                'fuelCardType' => $fuelCardType,
                'driverName' => $driverName,
            );
            echo json_encode($fullData);
        }
    }
    public function editFuelCard(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;
        $FuelReceipt=IftaCardCategory::where("companyID",$companyID)->first();
        $FuelReceiptArray=$FuelReceipt->ifta_card;
        $FuelReceiptLenght=count($FuelReceiptArray);
        $i=0;
        $v=0;
        for($i=0; $i<$FuelReceiptLenght; $i++)
        {
            $ids=$FuelReceipt->ifta_card[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value == $id)
                {
                    $v= $i;
                }
            }
        }
        $FuelReceipt->ifta_card= $FuelReceiptArray[$v];
        return response()->json($FuelReceipt);  
    }
    public function updateFuelCard(Request $request)
    {
        $id=(int)$request->id;
        $companyID=(int)$request->comId;
    //     $FuelCard=IftaCardCategory::where('companyID',$companyID)->first();
    //     $FuelCardArray=$FuelCard->ifta_card;
    //     $arrayLength=count($FuelCardArray);
    //     $i=0;
    //     $v=0;
    //    for ($i=0; $i<$arrayLength; $i++){
    //         $ids=$FuelCard->ifta_card[$i]['_id'];
    //         $ids=(array)$ids;
    //         foreach ($ids as $value){
    //             if($value==$id)
    //             {
    //                 $v=$i;
    //             }
    //         }
    //     }
    //     $FuelCardArray[$v]['counter' ]= 0;
    //     $FuelCardArray[$v]['cardHolderName' ]= $request->cardHolderName;
    //     $FuelCardArray[$v]['employeeNo' ]= $request->employeeNo;
    //     $FuelCardArray[$v]['iftaCardNo' ]= $request->iftaCardNo;
    //     $FuelCardArray[$v]['cardType' ]= $request->cardType;
    //     $FuelCardArray[$v]['openingfuelBal']='';                       
    //     $FuelCardArray[$v]['insertedTime' ]= '' ;
    //     $FuelCardArray[$v]['insertedUserId' ]= '' ;
    //     $FuelCardArray[$v]['deleteStatus' ]= 'NO' ;
    //     $FuelCardArray[$v]['deleteUser' ]= '' ;
    //     $FuelCardArray[$v]['deleteTime' ]= '' ;
    //     $FuelCardArray[$v]['averagedays' ]='' ;
    //     $FuelCard->ifta_card= $FuelCardArray;
        $FuelCard=IftaCardCategory::raw()->updateOne(['companyID' => $companyID,'ifta_card._id' => $id], 
        ['$set' => ['ifta_card.$.cardHolderName' => $request->cardHolderName,
        'ifta_card.$.employeeNo' => $request->employeeNo,
        'ifta_card.$.iftaCardNo' => $request->iftaCardNo,
        'ifta_card.$.cardType' => $request->cardType,
        'ifta_card.$.edit_by' => Auth::user()->userName,
        'ifta_card.$.edit_time' => time()]]
        );
        if($FuelCard==true)
        {
            $arr = array('status' => 'success', 'message' => 'fuel receipt Deleted successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
    }
    public function deleteFuelCard(Request $request)
    {
        $id=(int)$request->id;
        $companyID=(int)$request->comId;

        $FuelCard=IftaCardCategory::raw()->updateOne(['companyID' => $companyID,'ifta_card._id' => $id], 
        ['$set' => ['ifta_card.$.deleteStatus' => 'YES','ifta_card.$.deleteUser' => Auth::user()->userName,'ifta_card.$.deleteTime' => time()]]
        );
        if($FuelCard==true)
        {
            $arr = array('status' => 'success', 'message' => 'fuel receipt Deleted successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
    }
    public function restoreFuelCard(Request $request)
    {
        $fuelReceIds=$request->all_ids;
        $custID=(array)$request->custID;
        foreach($custID as $fuel_re_id)
        {
            $fuel_re_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $fuel_re_id);
            $fuel_re_id=(int)$fuel_re_id;
            $FuelCard = IftaCardCategory::where('companyID',$fuel_re_id )->first();
            $FuelCardArray=$FuelCard->ifta_card;
            $arrayLength=count($FuelCardArray);            
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$FuelCard->ifta_card[$i]['_id'];
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
                $FuelCardArray[$row]['deleteStatus'] = "NO";
                $FuelCard->ifta_card= $FuelCardArray;
                $save=$FuelCard->save();
            }
            if ($save) {
                $arr = array('status' => 'success', 'message' => 'Fuel Card Restored successfully.','statusCode' => 200); 
                return json_encode($arr);
            }
        }
    }
   

    
}
