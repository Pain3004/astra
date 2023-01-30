<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrier;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class ExternalCarrierController extends Controller
{
    public function getExternalCarrier(Request $request)
    {
        $companyId=59;
        $Carrier = Carrier::where('companyID',$companyId)
        ->get();
       
        return response()->json($Carrier, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function storeExternalCarrier(Request $request)
    {
    }
    public function editExternalCarrier(Request $request)
    {
        $id=$request->id;
        $companyId=$request->comId;
    }
    public function updateExternalCarrier(Request $request)
    {
        $id=$request->id;
        $companyId=$request->comId;
    }
    public function deleteExternalCarrier(Request $request)
    {
        $id=$request->id;
        $companyId=(int)$request->comId;
        $Carrier = Carrier::where('companyID',$companyId)->first();
        // dd($Carrier);
        $CarrierArray=$Carrier->carrier;
        $cardLength=count($CarrierArray);
        $i=0;
        $v=0;
        for($i=0; $i<$cardLength; $i++)
        {
            $ids=$Carrier->carrier[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        $CarrierArray[$v]['deleteStatus']="YES";
        $Carrier->carrier=$CarrierArray;
        if($Carrier->save())
        {
         $arr = array('status' => 'success', 'message' => 'External Carrier delete successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
    }
    public function restoreExternalCarrier(Request $request)
    {
        $cardIds=$request->all_ids;
        $custID=(array)$request->custID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $Carrier = Carrier::where('companyID',$company_id )->first();
            $CarrierArray=$Carrier->carrier;
            $arrayLength=count($CarrierArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$Carrier->carrier[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    $cardIds= str_replace( array('[', ']'), ' ', $cardIds);
                    if(is_string($cardIds))
                    {
                        $cardIds=explode(",",$cardIds);
                    }
                    foreach($cardIds as $credit_card_id)
                    {
                        $credit_card_id= str_replace( array('"', ']' ), ' ', $credit_card_id);
                        if($value==$credit_card_id)
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
                $CarrierArray[$row]['deleteStatus'] = "NO";
                $Carrier->carrier= $CarrierArray;
                $save=$Carrier->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'External Carrier Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
    }



}
