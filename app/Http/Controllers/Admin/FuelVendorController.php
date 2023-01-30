<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuelVendor;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class FuelVendorController extends Controller
{
    public function getFuelVendor(Request $request){
        $companyId=1;
        $FuelVendor = FuelVendor::where('companyID',$companyId)->first();
       // dd($FuelVendor);
        return response()->json($FuelVendor, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function createFuelVendor(Request $request)
    {
        $companyID=(int)1;
        // dd($request->fuelCardType);
        $FuelVendor = FuelVendor::where('companyID',$companyID)->get();
        foreach( $FuelVendor as  $FuelVendor_data)
        {
            if($FuelVendor_data)
            {
                $FuelVendorArray=$FuelVendor_data->fuelCard;
                $ids=array();
                foreach( $FuelVendorArray as $key=> $getFuelCard_data)
                {
                    $ids[]=$getFuelCard_data['_id'];
                }
                $ids=max($ids);
                $totalFuelVendorArray=$ids+1;
            }
            else
            {
                $totalFuelVendorArray=0; 
            }
            $openingDate=$request->openingDate;
            $openingDate = strtotime($openingDate);
            $FuelVendorData[]=array(    
                '_id' => $totalFuelVendorArray,
                'fuelCardType' => $request->fuelCardType,
                'openingDate' => $openingDate,
                'openingBalance' => $request->openingBalance,
                'currentBalance' => $request->currentBalance,
                'counter' =>0,
                'created_by' => Auth::user()->userFirstName,
                'created_time' => date('d-m-y h:i:s'),
                'edit_by' =>Auth::user()->userName,
                'edit_time' =>time(),
                'deleteStatus' =>"NO",                    
            ); 
            if($FuelVendor_data)
            {                
                FuelVendor::where(['companyID' =>$companyID])->update([
                'counter'=> $totalFuelVendorArray+1,
                'fuelCard' =>array_merge($FuelVendorArray,$FuelVendorData) ,
                ]);
                $arrFuelVendor = array('status' => 'success', 'message' => 'Fuel Vendor added successfully.'); 
                return json_encode($arrFuelVendor);
            }
            else
            {
                try
                {
                    if(FuelVendor::create([
                        '_id' => 1,
                        'companyID' => $companyID,
                        'counter' => 1,
                        'fuelCard' => $currencyData,
                    ])) 
                    {
                        $arrFuelVendor = array('status' => 'success', 'message' => 'Fuel Vendor added successfully.'); 
                        return json_encode($arrFuelVendor);
                    }
                }
                catch(\Exception $error)
                {
                    return $error->getMessage();
                }
            }
        }    
    }
    public function editFuelVendor(Request $request)
    {
        $id=$request->fuelCard;
        $companyID=(int)$request->compID;
        $FuelVendor = FuelVendor::where('companyID',$companyID)->first();
        // dd($FuelVendor );
        $FuelVendorArray=$FuelVendor->fuelCard;
        $fuelLength=count($FuelVendorArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$FuelVendor->fuelCard[$i]['_id'];
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
        $FuelVendor=$FuelVendor->fuelCard[$v];
        $FuelVendor=array_merge($companyID,$FuelVendor);
         return response()->json($FuelVendor, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function updateFuelVendor(Request $request)
    {
        $id=$request->fuel_id;
        // dd($id);
        $companyID=(int)$request->compID;
        $FuelVendor = FuelVendor::where('companyID',$companyID)->first();
        $FuelVendorArray=$FuelVendor->fuelCard;
        $fuelLength=count($FuelVendorArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$FuelVendor->fuelCard[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        // dd($request->fuelCardType);
        $openingDate=$request->openingDate;
        $openingDate = strtotime($openingDate);
        $FuelVendorArray[$v]['fuelCardType']=$request->fuelCardType;        
        $FuelVendorArray[$v]['currentBalance']=$request->currentBalance;
        $FuelVendorArray[$v]['openingDate']=$openingDate;
        $FuelVendorArray[$v]['openingBalance']=$request->openingBalance;
        $FuelVendor->fuelCard=$FuelVendorArray;
        // dd($FuelVendor->fuelCard);
        if($FuelVendor->save())
        {
         $arr = array('status' => 'success', 'message' => 'Fuel Vendor updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function deleteFuelVendor(Request $request)
    {
        
        $id=$request->id;
        $companyID=(int)$request->compID;
        $FuelVendor = FuelVendor::where('companyID',$companyID)->first();
        $FuelVendorArray=$FuelVendor->fuelCard;
        $fuelLength=count($FuelVendorArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$FuelVendor->fuelCard[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        $FuelVendorArray[$v]['deleteStatus']="YES";
        $FuelVendor->fuelCard=$FuelVendorArray;
        if($FuelVendor->save())
        {
         $arr = array('status' => 'success', 'message' => 'Fuel Vendor delete successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
    }
    public function restoreFuelVendor(Request $request)
    {
        $fuel_ids=$request->all_ids;
        // dd($fuel_ids);
        $custID=(array)$request->custID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $FuelVendor = FuelVendor::where('companyID',$company_id )->first();
            $FuelVendorArray=$FuelVendor->fuelCard;
            $arrayLength=count($FuelVendorArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$FuelVendor->fuelCard[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    // dd( $fuel_ids);
                    $fuel_ids= str_replace( array('[', ']'), ' ', $fuel_ids);
                    // dd($fuel_ids);
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
                $FuelVendorArray[$row]['deleteStatus'] = "NO";
                $FuelVendor->fuelCard= $FuelVendorArray;
                $save=$FuelVendor->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Fuel Vendor Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
      
      
    }
    
}
