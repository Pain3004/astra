<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuelCard;
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
    public function getFuelCard(Request $request){
        $companyId=(int)Auth::user()->companyID;
        $FuelCard = FuelCard::where('companyID',$companyId)->first();
        $FuelVendor = FuelVendor::where('companyID',$companyId)->first();
        $driver = Driver::where('companyID',$companyId )->first();


        //     $FactCompany=collect($FactCompany->factoring);
        //     $FactCompany = $FactCompany->chunk(10);
            
        //    $FactCompany= $FactCompany->toArray();


        // $data=FuelCard::where('companyID',$companyId)->aggregate([
        // {
        //         $lookup:{
        //             from: "driver",       // other table name
        //             localField: "ifta_card.cardHolderName",   // name of users table field
        //             foreignField: "driver.driver._id", // name of userinfo table field
        //             as: "driver"         // alias for userinfo table
        //         }
        //     }
        // ]);















//     $result = FuelCard::where('companyID',$companyId)->raw(function($collection) {
//         return $collection->aggregate(array(
//           array( '$lookup' => array(
//             'from' => 'drivers',
//             'localField' => 'driver.driver._id',
//             'foreignField' => '_id',
//             'as' => 'driver'
//           )),
//           array( '$unwind' => array( 
//             'path' => '$driver', 'preserveNullAndEmptyArrays' => True
//           )),
//         //   array( '$match' => array(
//         //     '$or' => array(
//         //       array( 'invoice_number' => array( '$regex' => $search ) ),
//         //       array( 'payment_type' => array( '$regex' => $search ) ),
//         //       array( 'txid' => array( '$regex' => $search ) ),
//         //       array( 'user.usrEmail' => array( '$regex' => $search ) )
//         //     )
//         //   )),
//         //   array( '$skip' => $start ),
//         //   array( '$limit' => $limit )
//         ));
//      });

// dd($result);






       return response()->json(['FuelCard'=>$FuelCard, 'FuelVendor'=>$FuelVendor, 'driver'=>$driver], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function createFuelCard(Request $request)
    {
        request()->validate([       
        ]);       
        $companyId=(int)Auth::user()->companyID;
        $totalFuelCardArray=0;
        $getFuelCard = FuelCard::where('companyID',$companyId)->first();
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
                FuelCard::where(['companyID' =>$companyId])->update([
                    'counter'=> $totalFuelCardArray,
                    'ifta_card' =>array_merge($FuelCardArray,$FuelCardData) ,
                    
                ]);

                $arrCustome = array('status' => 'success', 'message' => 'Fuel card added successfully.'); 
                return json_encode($arrCustome);
            }
            // else
            // {
               
            //     FuelCard::create([
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
        $FuelReceipt=FuelCard::where("companyID",$companyID)->first();
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
        $FuelCard=FuelCard::where('companyID',$companyID)->first();
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

        $FuelCard=FuelCard::where('companyID',$companyID)->first();
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
            $FuelCard = FuelCard::where('companyID',$fuel_re_id )->first();
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
