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
        $companyId=(int)Auth::user()->companyID;
        $Carrier = Carrier::where('companyID',$companyId)->get();
        foreach( $Carrier as  $Carrier_data)
        {
            if($Carrier_data)
            {
                $CarrierArray=$Carrier_data->carrier;
                $ids=array();
                foreach( $CarrierArray as $key=> $getCarrierIds)
                {
                    $ids[]=$getCarrierIds['_id'];
                }
                $ids=max($ids);
                $totalCarrierArray=$ids+1;
            }
            else
            {
                $totalCarrierArray=0; 
            }
            $openingDate=$request->openingDate;
            $openingDate = strtotime($openingDate);
            $CarrierData[]=array(    
                '_id' => $totalCarrierArray,
                'name' => $request->name,
                'address' => $request->address,
                'location' => $request->location,
                'zip' => $request->zip,
                'contactName' => $request->contactName,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'ext' => $request->ext,
                'tollfree' => $request->tollfree,
                'fax' => $request->fax,
                'paymentTerms' => $request->paymentTerms,
                'taxID' => $request->taxID,
                'mc' => $request->mc,
                'dot' => $request->dot,
                'factoringParent' => $request->factoringParent,
                'factoringCompany' => $request->factoringCompany,
                'carrierNotes' => $request->carrierNotes,
                'blacklisted' => $request->blacklisted,
                'corporation' => $request->corporation,
                'autoInsuranceCompany' => $request->autoInsuranceCompany,
                'autoInsPolicyNo' => $request->autoInsPolicyNo,
                'autoInsExpiryDate' => $request->autoInsExpiryDate,
                'autoInsTelephone' => $request->autoInsTelephone,
                'autoInsExt' => $request->autoInsExt,
                'liabilityContact' => $request->liabilityContact,
                'autoInsLiabilityAmount' => $request->autoInsLiabilityAmount,
                'autoInsuranceNotes' => $request->autoInsuranceNotes,
                'insuranceLiabilityCompany' => $request->insuranceLiabilityCompany,
                'insurancePolicyNo' => $request->insurancePolicyNo,
                'insuranceExpDate' => $request->insuranceExpDate,
                'insuranceTelephone' => $request->insuranceTelephone,
                'insuranceExt' => $request->insuranceExt,
                'insuranceContactName' => $request->insuranceContactName,
                'insuranceLiabilityAmount' => $request->insuranceLiabilityAmount,
                'insuranceNotes' => $request->insuranceNotes,
                'cargoCompany' => $request->cargoCompany,
                'cargoPolicyNo' => $request->cargoPolicyNo,
                'cargoExpiryDate' => $request->cargoExpiryDate,
                'cargoTelephone' => $request->cargoTelephone,
                'cargoExt' => $request->cargoExt,
                'cargoContactName' => $request->cargoContactName,
                'cargoInsuranceAmt' => $request->cargoInsuranceAmt,
                'cargoNotes' => $request->cargoNotes,
                'WSIBNo' => $request->WSIBNo,
                'primaryName'=>$request->primaryName,
                'primaryTelephone' => $request->primaryTelephone,
                'primaryEmail' => $request->primaryEmail,
                'secondaryName' => $request->secondaryName,
                'secondaryTelephone' => $request->secondaryTelephone,
                'secondaryEmail' => $request->secondaryEmail,
                'primaryNotes' => $request->primaryNotes,
                'sizeOfFleet' => $request->sizeOfFleet,
                'carrierDoc'=>array(),
                'equipment'=>array(),
                'created_by' => Auth::user()->userFirstName,
                'created_time' => date('d-m-y h:i:s'),
                'edit_by' =>Auth::user()->userName,
                'edit_time' =>time(),
                'deleteStatus' =>"NO",                    
            ); 
            if($Carrier_data)
            {                
                Carrier::where(['companyID' =>$companyId])->update([
                'counter'=> $totalCarrierArray+1,
                'carrier' =>array_merge($CarrierArray,$CarrierData) ,
                ]);
                $arrCarrier = array('status' => 'success', 'message' => 'External Carrier  added successfully.'); 
                return json_encode($arrCarrier);
            }
            else
            {
                try
                {
                    if(Carrier::create([
                        '_id' => 1,
                        'companyID' => $companyId,
                        'counter' => 1,
                        'carrier' => $currencyData,
                    ])) 
                    {
                        $arrCarrier = array('status' => 'success', 'message' => 'External Carrier added successfully.'); 
                        return json_encode($arrCarrier);
                    }
                }
                catch(\Exception $error)
                {
                    return $error->getMessage();
                }
            }
        }
    }
    public function editExternalCarrier(Request $request)
    {
        $id=$request->id;
        $companyId=(int)$request->comId;
        $Carrier = Carrier::where('companyID',$companyId)->first();
        // dd($Carrier );
        $CarrierArray=$Carrier->carrier;
        $carLength=count($CarrierArray);
        $i=0;
        $v=0;
        for($i=0; $i<$carLength; $i++)
        {
            $ids=$Carrier->carrier[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }
        $companyId=array(
            "companyID"=>$companyId
        ) ;       
        $Carrier=$Carrier->carrier[$v];
        $Carrier=array_merge($companyId,$Carrier);
         return response()->json($Carrier, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function updateExternalCarrier(Request $request)
    {
        $id=$request->id;
        $companyID=(int)Auth::user()->companyID;
        $Carrier = Carrier::where('companyID',$companyID)->first();
        $CarrierArray=$Carrier->carrier;
        $carriLength=count($CarrierArray);
        $i=0;
        $v=0;
        for($i=0; $i<$carriLength; $i++)
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
        $CarrierArray[$v]['name']=$request->name; 
        $CarrierArray[$v]['address']=$request->address; 
        $CarrierArray[$v]['location']=$request->location; 
        $CarrierArray[$v]['zip']=$request->zip; 
        $CarrierArray[$v]['contactName']=$request->contactName; 
        $CarrierArray[$v]['email']=$request->email; 
        $CarrierArray[$v]['telephone']=$request->telephone; 
        $CarrierArray[$v]['ext']=$request->ext; 
        $CarrierArray[$v]['tollfree']=$request->tollfree; 
        $CarrierArray[$v]['fax']=$request->fax; 
        $CarrierArray[$v]['paymentTerms']=$request->paymentTerms; 
        $CarrierArray[$v]['taxID']=$request->taxID; 
        $CarrierArray[$v]['mc']=$request->mc; 
        $CarrierArray[$v]['dot']=$request->dot; 
        $CarrierArray[$v]['factoringParent']=$request->factoringParent; 
        $CarrierArray[$v]['factoringCompany']=$request->factoringCompany; 
        $CarrierArray[$v]['carrierNotes']=$request->carrierNotes; 
        $CarrierArray[$v]['blacklisted']=$request->blacklisted; 
        $CarrierArray[$v]['corporation']=$request->corporation; 
        $CarrierArray[$v]['autoInsuranceCompany']=$request->autoInsuranceCompany; 
        $CarrierArray[$v]['autoInsPolicyNo']=$request->autoInsPolicyNo; 
        $CarrierArray[$v]['autoInsExpiryDate']=$request->autoInsExpiryDate; 
        $CarrierArray[$v]['autoInsTelephone']=$request->autoInsTelephone; 
        $CarrierArray[$v]['autoInsExt']=$request->autoInsExt; 
        $CarrierArray[$v]['liabilityContact']=$request->liabilityContact; 
        $CarrierArray[$v]['autoInsLiabilityAmount']=$request->autoInsLiabilityAmount; 
        $CarrierArray[$v]['autoInsuranceNotes']=$request->autoInsuranceNotes; 
        $CarrierArray[$v]['insuranceLiabilityCompany']=$request->insuranceLiabilityCompany; 
        $CarrierArray[$v]['insurancePolicyNo']=$request->insurancePolicyNo; 
        $CarrierArray[$v]['insuranceExpDate']=$request->insuranceExpDate; 
        $CarrierArray[$v]['insuranceTelephone']=$request->insuranceTelephone; 
        $CarrierArray[$v]['insuranceExt']=$request->insuranceExt; 
        $CarrierArray[$v]['insuranceContactName']=$request->insuranceContactName; 
        $CarrierArray[$v]['insuranceLiabilityAmount']=$request->insuranceLiabilityAmount; 
        $CarrierArray[$v]['insuranceNotes']=$request->insuranceNotes; 
        $CarrierArray[$v]['cargoCompany']=$request->cargoCompany; 
        $CarrierArray[$v]['cargoPolicyNo']=$request->cargoPolicyNo; 
        $CarrierArray[$v]['cargoExpiryDate']=$request->cargoExpiryDate; 
        $CarrierArray[$v]['cargoTelephone']=$request->cargoTelephone; 
        $CarrierArray[$v]['cargoExt']=$request->cargoExt; 
        $CarrierArray[$v]['cargoContactName']=$request->cargoContactName; 
        $CarrierArray[$v]['cargoInsuranceAmt']=$request->cargoInsuranceAmt; 
        $CarrierArray[$v]['cargoNotes']=$request->cargoNotes; 
        $CarrierArray[$v]['WSIBNo']=$request->WSIBNo; 
        $CarrierArray[$v]['primaryName']=$request->primaryName;
        $CarrierArray[$v]['primaryTelephone']=$request->primaryTelephone;
        $CarrierArray[$v]['primaryEmail']=$request->primaryEmail; 
        $CarrierArray[$v]['secondaryName']=$request->secondaryName; 
        $CarrierArray[$v]['secondaryTelephone']=$request->secondaryTelephone;  
        $CarrierArray[$v]['secondaryEmail']=$request->secondaryEmail; 
        $CarrierArray[$v]['primaryNotes']=$request->primaryNotes; 
        $CarrierArray[$v]['sizeOfFleet']=$request->sizeOfFleet; 
        $Carrier->carrier=$CarrierArray;
        // dd($Carrier->carrier);
        if($Carrier->save())
        {
         $arr = array('status' => 'success', 'message' => 'External Carrier updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }


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