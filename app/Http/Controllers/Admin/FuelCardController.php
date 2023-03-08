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
use PDF;

use Illuminate\Database\Eloquent\Collection;

class FuelCardController extends Controller
{
    public function getFuelCard(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        // $FuelCard = IftaCardCategory::where('companyID',$companyID)->first();
        // $FuelVendor = FuelVendor::where('companyID',$companyID)->first();
        // $driver = Driver::where('companyID',$companyID )->first();
        //  return response()->json(['FuelCard'=>$FuelCard, 'FuelVendor'=>$FuelVendor, 'driver'=>$driver], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);

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
        request()->validate([       
        ]);       
        $companyId=(int)Auth::user()->companyID;
        $totalFuelCardArray=0;
        $getFuelCard = IftaCardCategory::where('companyID',$companyId)->first();
        $FuelCardArray= $getFuelCard->ifta_card;
        $ids=array();
        foreach( $FuelCardArray as $key=> $getFuelCard_data)
        {
            $ids[]=$getFuelCard_data['_id'];
        }
        $ids=max($ids);
        $totalFuelCardArray=$ids+1;
        // dd($totalFuelCardArray);
        $FuelCardData[]=array(    
                        '_id' => $totalFuelCardArray ,
                        'counter' => $totalFuelCardArray,
                        'cardHolderName' => $request->cardHolderName,
                        'employeeNo' => $request->employeeNo,
                        'iftaCardNo' => $request->iftaCardNo,
                        'cardType' => $request->cardType,
                        'openingfuelBal'=>'',                       
                        'insertedTime' => '' ,
                        'insertedUserId' => '' ,
                        'deleteStatus' => 'NO' ,
                        'deleteUser' => '' ,
                        'deleteTime' => '' ,
                        'averagedays' =>'' ,

                        );
           
            // if($totalFuelCardArray<4){
            if($getFuelCard){
                IftaCardCategory::where(['companyID' =>$companyId])->update([
                    'counter'=> $totalFuelCardArray,
                    'ifta_card' =>array_merge($FuelCardArray,$FuelCardData) ,
                    
                ]);

                $arrCustome = array('status' => 'success', 'message' => 'Fuel card added successfully.'); 
                return json_encode($arrCustome);
            }
            // else
            // {
               
            //     IftaCardCategory::create([
            //         '_id' =>4,
            //         'companyID'=>1,
            //         'ifta_card' => $FuelCardData,
            //         'counter' =>1,
            //         'created_time' => date('d-m-y h:i:s'),
            //         'edit_time' =>time(),
            //         'deleteStatus' =>"NO",
            //     ]);
            // }
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
        $id=$request->id;
        $companyID=(int)$request->comId;
        $FuelCard=IftaCardCategory::where('companyID',$companyID)->first();
        $FuelCardArray=$FuelCard->ifta_card;
        $arrayLength=count($FuelCardArray);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLength; $i++){
            $ids=$FuelCard->ifta_card[$i]['_id'];
            $ids=(array)$ids;
            foreach ($ids as $value){
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }
        $FuelCardArray[$v]['counter' ]= 0;
        $FuelCardArray[$v]['cardHolderName' ]= $request->cardHolderName;
        $FuelCardArray[$v]['employeeNo' ]= $request->employeeNo;
        $FuelCardArray[$v]['iftaCardNo' ]= $request->iftaCardNo;
        $FuelCardArray[$v]['cardType' ]= $request->cardType;
        $FuelCardArray[$v]['openingfuelBal']='';                       
        $FuelCardArray[$v]['insertedTime' ]= '' ;
        $FuelCardArray[$v]['insertedUserId' ]= '' ;
        $FuelCardArray[$v]['deleteStatus' ]= 'NO' ;
        $FuelCardArray[$v]['deleteUser' ]= '' ;
        $FuelCardArray[$v]['deleteTime' ]= '' ;
        $FuelCardArray[$v]['averagedays' ]='' ;
        $FuelCard->ifta_card= $FuelCardArray;
        if($FuelCard->save())
        {
         $arr = array('status' => 'success', 'message' => 'fuel receipt Updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function deleteFuelCard(Request $request)
    {
        // $id=$request->id;
        // $companyID=(int)$request->comId;

        // $card_cat = new FuelCard();
        // $card_cat->setId($id);
        // $card_cat->deleteIftaCard($card_cat, $companyID);
        // if($card_cat->save())
        // {
        //     $arr = array('status' => 'success', 'message' => 'fuel receipt Deleted successfully.','statusCode' => 200); 
        //  return json_encode($arr);
        // }

        $FuelCard=IftaCardCategory::where('companyID',$companyID)->first();
        $FuelCardArray=$FuelCard->ifta_card;
        $arrayLength=count($FuelCardArray);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLength; $i++){
            $ids=$FuelCard->ifta_card[$i]['_id'];
            $ids=(array)$ids;
            foreach ($ids as $value){
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }
        $FuelCardArray[$v]['deleteStatus'] = "YES";
        $FuelCard->ifta_card= $FuelCardArray;
        if($FuelCard->save())
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
