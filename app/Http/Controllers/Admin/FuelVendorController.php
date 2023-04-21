<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuelVendor;
use App\Helpers\AppHelper;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;
use DB;

use Illuminate\Database\Eloquent\Collection;

class FuelVendorController extends Controller
{
    public function getFuelVendor(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;

        $total_records = 0;
        $cursor = FuelVendor::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['size' => ['$size' => ['$fuelCard']],
            ]]
        ]);
        foreach ($cursor as $v) {
            $total_records =$v['size'];
        }
        $completedata = array();
        $partialdata = array();
        if(!empty($total_records))
        {
            $show1 =FuelVendor::raw()->find(['companyID' =>$companyID]);
            $c = 0;
            $arrData1 = "";
            foreach ($show1 as $arrData11) {
                $arrData1 = $arrData11;
            }
            return  $partialdata[] = array(
                'arrData1' => $arrData1,
            );
            // $partialdata[] = $this->getData($db, $companyID);
        }
        $completedata[] = $partialdata;
        $completedata[] = $total_records;
        echo json_encode($completedata);
    }
    public function createFuelVendor(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $collection = FuelVendor::raw();
        $criteria = array(
           'companyID' =>$companyID,
        );
        $doc = $collection->findOne($criteria);
        $masterID = $doc['_id'];
        if (!empty($doc)) 
        {
            $cons = array(
                '_id' =>AppHelper::instance()->getMasterDocumentSequence($companyID, $collection,'fuelCard'),
                'fuelCardType' => $request->fuelCardType,
                'openingDate' => strtotime($request->openingDate),
                'openingBalance' => $request->openingBalance,
                'currentBalance' => $request->currentBalance,
                'counter' => 0,
                'created_by' => Auth::user()->userName,
                'created_time' => time(),
                'deleteStatus' => "NO",
                'deleteUser' => "",
                'deleteTime' => "",
            );
            $query = FuelVendor::raw()->updateOne(['companyID' => $companyID], ['$push' => ['fuelCard' => $cons]]);
            if($query)
            {
                $cons['masterID'] = $masterID;
                echo json_encode($cons);
            }
            else
            {
                $msg = "error";
                echo json_encode($msg);
            }   
        } 
        else 
        {
            $id = AppHelper::instance()->getNextSequence("fuel_Card_Type", DB::raw());
            $this->setId($id);
            $cons = iterator_to_array($category);
            $query = FuelVendor::raw()->insertOne($cons);
            if($query)
            {
                $masterID = $cons['_id'];
                $cons["fuelCard"][0]['masterID'] = $masterID;
                echo json_encode($cons["fuelCard"][0]);
            }
            else
            {
                $msg = "error";
                echo json_encode($msg);
            } 
        }
    }
    public function editFuelVendor(Request $request)
    {
        $id=(int)$request->fuelCard;
        $companyID=(int)Auth::user()->companyID;
        $cursor = FuelVendor::raw()->findOne(['companyID' => $companyID,'fuelCard._id' => $id]);
        $fuelCardArray=$cursor->fuelCard;
        $fuelCardLength=count($fuelCardArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelCardLength; $i++)
        {
            $ids=$cursor->fuelCard[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }    
        $fuelCard=(array)$cursor->fuelCard[$v];
        return response()->json($fuelCard, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function updateFuelVendor(Request $request)
    {
        $id=(int)$request->fuel_id;
        $companyID=(int)Auth::user()->companyID;
        $upQuery = FuelVendor::raw()->updateOne(['companyID' => $companyID, 'fuelCard._id' => $id],
            ['$set' => ['fuelCard.$.fuelCardType'  => $request->fuelCardType, 
            // 'fuelCard.$.currentBalance'  => $request->currentBalance, 
            'fuelCard.$.openingDate'  => strtotime($request->openingDate), 
            // 'fuelCard.$.openingBalance'  => $request->openingBalance,
            'fuelCard.$.edit_by' =>  Auth::user()->userName, 
            'fuelCard.$.edit_time' =>  time()
            ]]
        );
        if($upQuery)
        {
            echo "success";
        }
        else
        {
            echo "error";
        }
    }
    public function deleteFuelVendor(Request $request)
    {
        
        $id=(int)$request->id;
        $companyID=(int)Auth::user()->companyID;
        $delQuery = FuelVendor::raw()->updateOne(['companyID' => $companyID,'fuelCard._id' => $id], 
            ['$set' => ['fuelCard.$.deleteStatus' => 'YES','fuelCard.$.deleteUser' => Auth::user()->userName,'fuelCard.$.deleteTime' => time()]]
        );
        if($delQuery)
        {
            echo "success";
        }
        else
        {
            echo "error";
        }
    }
    public function restoreFuelVendor(Request $request)
    {
        $fuel_ids=$request->all_ids;
        $companyID=(int)Auth::user()->companyID;
        $fuel_ids= str_replace( array('[', ']'), ' ', $fuel_ids);
        if(is_string($fuel_ids))
        {
            $fuel_ids=explode(",",$fuel_ids);
        }                   
        foreach($fuel_ids as $iftaId)
        {
            $iftaId= str_replace( array('"', ']' ), ' ', $iftaId);
                $FuelVendor=FuelVendor::raw()->updateOne(['companyID' =>$companyID,'fuelCard._id' => (int)$iftaId], 
                ['$set' => ['fuelCard.$.deleteStatus' => 'NO','fuelCard.$.deleteUser' => Auth::user()->userName,'fuelCard.$.deleteTime' => time()]]
            );
        }
            
          
            
        $arr = array('status' => 'success', 'message' => 'fuelCard Restored successfully.','statusCode' => 200); 
        return json_encode($arr);
                
    }
    public function export_fuelVendor(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $p[] = array("Name of Card ","Opening Date","Opening Balance","Current Balance");
         
        $FuelVendor =FuelVendor::raw()->find(['companyID' => $companyID]);
        foreach ($FuelVendor as $bdebit) 
        {
            $fuelVen = $bdebit['fuelCard'];   
            foreach ($fuelVen as $test) 
            {
                $p[] = array(
                    $test['fuelCardType'],
                    date('m-d-Y',$test['openingDate']),
                    $test['openingBalance'],
                    $test['currentBalance'],
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
    
}
