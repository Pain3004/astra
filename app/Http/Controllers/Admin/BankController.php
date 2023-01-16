<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class BankController extends Controller
{
    public function getBankData(Request $request){
        $companyId=(int)1;
        //$bankData = Bank::where('deleteStatus','NO')->get();
        $bankData = Bank::where('companyID',$companyId)->get();
       //dd($bankData);
       return response()->json($bankData, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function createBankData(Request $request)
    {
        $companyId=(int)1;
        $bankData=Bank::where('companyID',$companyId)->get();
        // dd($bankData);
        foreach( $bankData as  $bankData_data)
        {
            // dd($bankData_data);
            if($bankData_data)
            {
                $bankDataArray=$bankData_data->admin_bank;
                $ids=array();
                foreach( $bankDataArray as $key=> $admin_bank_id)
                {
                    $ids[]=$admin_bank_id['_id'];
                }
                $ids=max($ids);
                $totalbankDataArray=$ids+1;
            }
            else
            {
                $totalbankDataArray=0; 
            }
            $bankDataData[]=array(    
                '_id' => $totalbankDataArray,
                'bankName' => $request->bankName,
                'bankAddresss' => $request->bankAddresss,
                'accountHolder' => $request->accountHolder,
                'accountNo' => $request->accountNo,
                'routingNo'=>$request->routingNo,
                'openingBalDate'=>$request->openingBalDate,
                'openingBalance'=>$request->openingBalance,
                'currentcheqNo'=>$request->currentcheqNo,
                'counter' =>0,
                'created_by' => Auth::user()->userFirstName,
                'created_time' => date('d-m-y h:i:s'),
                'edit_by' =>Auth::user()->userName,
                'edit_time' =>time(),
                'deleteStatus' =>"NO",                    
            ); 
            // dd( $bankDataData);
            if($bankData_data)
            {                
                Bank::where(['companyID' =>$companyId])->update([
                'counter'=> $totalbankDataArray+1,
                'admin_bank' =>array_merge($bankDataArray,$bankDataData) ,
                ]);
                $arrbankData = array('status' => 'success', 'message' => 'Bank Details added successfully.'); 
                return json_encode($arrbankData);
            }
            else
            {
                try
                {
                    if(Bank::create([
                        '_id' => 1,
                        'companyID' => $companyID,
                        'counter' => 1,
                        'admin_bank' => $bankDataData,
                    ])) 
                    {
                        $arrbankData = array('status' => 'success', 'message' => 'Bank Details added successfully.'); 
                        return json_encode($arrbankData);
                    }
                }
                catch(\Exception $error)
                {
                    return $error->getMessage();
                }
            }
        }

    }
    public function editBankData(Request $request)
    {        
        $id=$request->bankId;
        $companyID=(int)$request->compID;
        $Bank = Bank::where('companyID',$companyID)->first();
        // dd($Bank );
        $BankArray=$Bank->admin_bank;
        $fuelLength=count($BankArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$Bank->admin_bank[$i]['_id'];
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
        $Bank=$Bank->admin_bank[$v];
        $Bank=array_merge($companyID,$Bank);
         return response()->json($Bank, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);

    }
    public function updateBankData(Request $request)
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
    public function deleteBankData(Request $request)
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

   

    
}
