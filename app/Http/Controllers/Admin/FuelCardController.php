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
use MongoDB\BSON\Regex;
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
        // dd($request->cardType);  
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
                'employeeNo'=>$request->cardHolderName,
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
        $id=(int)$request->id;
        // dd($id);
        $companyID=(int)Auth::user()->companyID;
        $cursor = IftaCardCategory::raw()->findOne(['companyID' => $companyID,'ifta_card._id' => $id]);
        $ifta_cardArray=$cursor->ifta_card;
        $ifta_cardLength=count($ifta_cardArray);
        $l=0;
        $m=0;
        for($l=0; $l<$ifta_cardLength; $l++)
        {
            $ids=$cursor->ifta_card[$l]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $m=$l;
                }
            }
        }    
        $fuelCardId="";
        $fuelCardName="";
        $driverName="";
        $driverId="";
        $driverId=(int)$cursor->ifta_card[$m]->cardHolderName;
       $fuelVenderId=(int)$cursor->ifta_card[$m]->cardType;
        //    dd($driverId);
       if(!empty($driverId))
       {
            $driverData=Driver::raw()->findOne(['companyID' => $companyID,'driver._id' => $driverId]);
            if($driverData !=null)
            {
                $driverArray=$driverData->driver;
                $driverLength=count($driverArray);
                $i=0;
                $v=0;
                $j=0;
                $k=0;
                for($j=0; $j<$driverLength; $j++)
                {
                    $ids=$driverData->driver[$j]['_id'];
                    $ids=(array)$ids;
                    foreach($ids as $value)
                    {
                        if($value==$driverId)
                        {
                            $k=$j;
                        }
                    }
                }   
             
                $driverName=$driverData->driver[$k]->driverName;
                $driverId=$driverData->driver[$k]->_id;
            }
            
       }
       

       if(!empty($fuelVenderId))
       {
            $iftaType = FuelVendor::raw()->findOne(['companyID' => $companyID,'fuelCard._id' => $fuelVenderId]);
            if($iftaType !=null)
            {
                $fuelCardArray=$iftaType->fuelCard;
                $fuelCardLength=count($fuelCardArray);
                $i=0;
                $v=0;
                for($i=0; $i<$fuelCardLength; $i++)
                {
                    $ids=$iftaType->fuelCard[$i]['_id'];
                    $ids=(array)$ids;
                    foreach($ids as $value)
                    {
                        if($value==$fuelVenderId)
                        {
                            $v=$i;
                        }
                    }
                }    
                $fuelCardName=$iftaType->fuelCard[$v]->fuelCardType;
                $fuelCardId=$iftaType->fuelCard[$v]->_id;
            }
            
            
           
       }
       $data=array(
        'fuel_type_id'=>$fuelCardId,
        'fuel_type_name'=>$fuelCardName,
        'driverName'=>$driverName,
        'driverId'=>$driverId
        );
        $ifta_card=(array)$cursor->ifta_card[$m];
        $ifta_card=array_merge($ifta_card,$data);
        return response()->json($ifta_card, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
       
    }
    public function updateFuelCard(Request $request)
    {
        // dd($request->cardType);
        $id=(int)$request->id;
        // dd($id);
        $companyID=(int)Auth::user()->companyID;
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
        $companyID=(int)Auth::user()->companyID;
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
        $companyID=(int)Auth::user()->companyID;
        $fuelReceIds= str_replace( array('[', ']'), ' ', $fuelReceIds);
        if(is_string($fuelReceIds))
        {
            $fuelReceIds=explode(",",$fuelReceIds);
        }                   
        foreach($fuelReceIds as $iftaId)
        {
            $iftaId= str_replace( array('"', ']' ), ' ', $iftaId);
                $IftaCardCategory=IftaCardCategory::raw()->updateOne(['companyID' =>$companyID,'ifta_card._id' => (int)$iftaId], 
                ['$set' => ['ifta_card.$.deleteStatus' => 'NO','ifta_card.$.deleteUser' => Auth::user()->userName,'ifta_card.$.deleteTime' => time()]]
            );
        } 
        $arr = array('status' => 'success', 'message' => 'ifta card Restored successfully.','statusCode' => 200); 
        return json_encode($arr);
    }
    public function searchFuelVendor(Request $request)
    {
        $para = '^' . $request->value;
        $datasearch = new Regex($para, 'i');
        $show = FuelVendor::raw()->aggregate([
            ['$match' => ["companyID" => (int)Auth::user()->companyID]],
            ['$unwind' => '$fuelCard'],
            ['$match' => ['fuelCard.fuelCardType' => $datasearch,"fuelCard.deleteStatus"=>"NO"]],
            ['$project' => ['fuelCard._id' => 1, 'fuelCard.fuelCardType' => 1, 'companyID' => 1]],
            ['$limit' => 50]
        ]);
        $shipper = array();
        $fuelCardList = array();
        foreach ($show as $s) {
            $k = 0;
            $shipper[$k] = $s['fuelCard'];
            $k++;
            foreach ($shipper as $sr) {
                $fuelCardList[] = array("id" => $sr['_id'], "value" => $sr['fuelCardType']);
            }
        }
        echo json_encode($fuelCardList);
    }
}
