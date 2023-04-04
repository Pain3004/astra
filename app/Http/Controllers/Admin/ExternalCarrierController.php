<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carrier;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use App\Helpers\AppHelper;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class ExternalCarrierController extends Controller
{
    public function getExternalCarrier(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $total_records = 0;
        $cursor = Carrier::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['size' => ['$size' => ['$carrier']],
            ]]
        ]);
        $totalarray = $cursor;
        $docarray = array();
        foreach ($cursor as $v) {
            $docarray[] = array("size" => $v['size'], "id" => $v['_id']);
            $total_records += (int)$v['size'];
        }
        $completedata = array();
        $partialdata = array();
        $paginate =AppHelper::instance()->paginate($docarray);
        if (!empty($paginate[0][0][0])) {
            for ($i = 0; $i < sizeof($paginate[0][0][0]); $i++) {
                $pagina_data= str_replace( array('"',":"," " ,"doc",'start',"end", ']','[','{','}' ), ' ', $request->arr);
                $pagina_data=explode(",",$pagina_data);
                if(!empty($request->arr))
                {
                    $docid=preg_replace('/\s+/',"", $pagina_data[0]);
                    $start=preg_replace('/\s+/',"",$pagina_data[1]);
                    $end=preg_replace('/\s+/',"",$pagina_data[2]);
                    $docid=intval($docid);
                    $start=intval($start);
                    $end=intval($end);
                }
                else
                {
                    $docid= $paginate[0][0][0][$i]['doc'];
                    $end=$paginate[0][0][0][$i]['end'];
                    $start=$paginate[0][0][0][$i]['start'];
                }
                $show1 = Carrier::raw()->aggregate([
                    ['$match' => ["companyID" => $companyID, "_id" => $docid]],
                    ['$project' => ["companyID" => $companyID,"carrier" => ['$slice' => ['$carrier',(int)$end,(int)$start - (int)$end]]]],
                    ['$project' => ["carrier._id" => 1,"carrier.counter" => 1,"carrier.name" => 1,"carrier.address" => 1, "carrier.location" =>  1, "carrier.zip" => 1,"carrier.contactName" => 1,"carrier.email" => 1,"carrier.taxID" => 1
                        ,"carrier.mc" => 1,"carrier.telephone" => 1,"carrier.dot" => 1,"carrier.factoringCompany" => 1,"carrier.paymentTerms" => 1,"carrier.insertedUserId" => 1
                        ,"carrier.insertedTime" => 1,"carrier.edit_by" => 1,"carrier.edit_time" => 1,"carrier.deleteUser" => 1,
                        "carrier.deleteStatus" => 1,"carrier.deleteTime" => 1,"carrier.carrierDoc" => 1, "carrier.blacklisted" => 1]]
                ]);
                $c = 0;
                $arrData1 = "";
                foreach ($show1 as $arrData11) {
                    $arrData1 = $arrData11;
                }
                $arrData2 = array(
                    'arrData1' => $arrData1,
                );
                $partialdata[]= $arrData2;
            }
        }
        $completedata[] = $partialdata;
        $completedata[] = $paginate;
        $completedata[] = $total_records;
        echo json_encode($completedata);
    }
    public function storeExternalCarrier(Request $request)
    {
        // $companyId=(int)Auth::user()->companyID;
        $companyId=(int)25;
        $quantity=$request->quantity;
        $equipment=$request->equipment;
        $quantity=explode(',',$quantity);
        $equipment=explode(',',$equipment);
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
            foreach($quantity as $row)
            {
                foreach($equipment as $r)
                {
                    $equArray[]=array(
                        'quantity'=>$row,
                        'equipment'=>$r,
                    );
                }
            }
            // dd($request->dot);
            $equArray=array($equArray);
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
                'autoInsExpiryDate' => strtotime($request->autoInsExpiryDate),
                'autoInsTelephone' => $request->autoInsTelephone,
                'autoInsExt' => $request->autoInsExt,
                'liabilityContact' => $request->liabilityContact,
                'autoInsLiabilityAmount' => $request->autoInsLiabilityAmount,
                'autoInsuranceNotes' => $request->autoInsuranceNotes,
                'insuranceLiabilityCompany' => $request->insuranceLiabilityCompany,
                'insurancePolicyNo' => $request->insurancePolicyNo,
                'insuranceExpDate' => strtotime($request->insuranceExpDate),
                'insuranceTelephone' => $request->insuranceTelephone,
                'insuranceExt' => $request->insuranceExt,
                'insuranceContactName' => $request->insuranceContactName,
                'insuranceLiabilityAmount' => $request->insuranceLiabilityAmount,
                'insuranceNotes' => $request->insuranceNotes,
                'cargoCompany' => $request->cargoCompany,
                'cargoPolicyNo' => $request->cargoPolicyNo,
                'cargoExpiryDate' => strtotime($request->cargoExpiryDate),
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
                'equipment'=>$equArray,
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
        // dd($request->dot);
        $id=$request->id;
        $companyID=(int)25;
        $quantity=$request->quantity;
        $equipment=$request->equipment;
        $quantity=explode(',',$quantity);
        $equipment=explode(',',$equipment);
        // $companyID=(int)Auth::user()->companyID;
        $Carrier = Carrier::where('companyID',$companyID)->first();
        $CarrierArray=$Carrier->carrier;
        $carriLength=count($CarrierArray);
        $i=0;
        $v=0;
        foreach($quantity as $row)
        {
            foreach($equipment as $r)
            {
                $equArray[]=array(
                    'quantity'=>$row,
                    'equipment'=>$r,
                );
            }
        }
        $equArray=array($equArray);
        // dd($equArray);
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
        $CarrierArray[$v]['autoInsExpiryDate']=strtotime($request->autoInsExpiryDate); 
        $CarrierArray[$v]['autoInsTelephone']=$request->autoInsTelephone; 
        $CarrierArray[$v]['autoInsExt']=$request->autoInsExt; 
        $CarrierArray[$v]['liabilityContact']=$request->liabilityContact; 
        $CarrierArray[$v]['autoInsLiabilityAmount']=$request->autoInsLiabilityAmount; 
        $CarrierArray[$v]['autoInsuranceNotes']=$request->autoInsuranceNotes; 
        $CarrierArray[$v]['insuranceLiabilityCompany']=$request->insuranceLiabilityCompany; 
        $CarrierArray[$v]['insurancePolicyNo']=$request->insurancePolicyNo; 
        $CarrierArray[$v]['insuranceExpDate']=strtotime($request->insuranceExpDate); 
        $CarrierArray[$v]['insuranceTelephone']=$request->insuranceTelephone; 
        $CarrierArray[$v]['insuranceExt']=$request->insuranceExt; 
        $CarrierArray[$v]['insuranceContactName']=$request->insuranceContactName; 
        $CarrierArray[$v]['insuranceLiabilityAmount']=$request->insuranceLiabilityAmount; 
        $CarrierArray[$v]['insuranceNotes']=$request->insuranceNotes; 
        $CarrierArray[$v]['cargoCompany']=$request->cargoCompany; 
        $CarrierArray[$v]['cargoPolicyNo']=$request->cargoPolicyNo; 
        $CarrierArray[$v]['cargoExpiryDate']=strtotime($request->cargoExpiryDate); 
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
        $CarrierArray[$v]['equipment']=$equArray; 
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
        // $Carrier = Carrier::where('companyID',$companyId)->first();
        // // dd($Carrier);
        // $CarrierArray=$Carrier->carrier;
        // $cardLength=count($CarrierArray);
        // $i=0;
        // $v=0;
        // for($i=0; $i<$cardLength; $i++)
        // {
        //     $ids=$Carrier->carrier[$i];
        //     foreach($ids as $value)
        //     {
        //         if($value==$id)
        //         {
        //             $v=$i;
        //         }
        //     }
        // }  
        // $CarrierArray[$v]['deleteStatus']="YES";
        // $Carrier->carrier=$CarrierArray;
        // if($Carrier->save())
        // {
        //  $arr = array('status' => 'success', 'message' => 'External Carrier delete successfully.','statusCode' => 200); 
        //  return json_encode($arr);
        // } 

        
        $Bank=Carrier::raw()->updateOne(['companyID' => $companyId,'carrier._id' => $id], 
        ['$set' => ['carrier.$.deleteStatus' => 'YES','carrier.$.deleteUser' => Auth::user()->userName,'carrier.$.deleteTime' => time()]]
        );
        // dd($Bank);
         if($Bank==true)
        {
         $arr = array('status' => 'success', 'message' => 'External carrier Deleted successfully.','statusCode' => 200); 
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
