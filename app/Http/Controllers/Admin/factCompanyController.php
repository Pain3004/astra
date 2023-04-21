<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Factoring_company_add;
use App\Models\bank_debit_category;
use App\Models\PaymentBank;
use App\Models\Payment_terms;
use App\Models\Currency_add;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use App\Helpers\AppHelper;
use Auth;
use App\Models\Company;
use App\Models\Bank;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class factCompanyController extends Controller
{
    public function getFactCompany()
    {
        $companyID=(int)Auth::user()->companyID;
        $total_records = 0;
        $cursor = Factoring_company_add::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['size' => ['$size' => ['$factoring']],
            ]]
        ]);
        $totalarray = $cursor;
        $docarray = array();
        foreach ($cursor as $v) 
        {
            $docarray[] = array("size" => $v['size'], "id" => $v['_id']);
            $total_records += (int)$v['size'];
        }
        $completedata = array();
        $partialdata = array();
        $paginate = AppHelper::instance()->paginate($docarray);
        if (!empty($paginate[0][0][0]))
        {
            for ($i = 0; $i < sizeof($paginate[0][0][0]); $i++) 
            {
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
                $collection = Currency_add::raw();
                $card = $collection->find(["companyID" => $companyID]);
                $currency = array();
                foreach ($card as $dr) 
                {
                    $currency_array = $dr['currency'];
                    foreach ($currency_array as $da) 
                    {
                        $card_id = $da['_id'];
                        $currency[$card_id] = $da['currencyType'];
                    }
                }
                $collection = Payment_terms::raw();
                $card = $collection->find(["companyID" => $companyID]);
                $payment = array();
                foreach ($card as $dr) 
                {
                    $card_array = $dr['payment'];
                    foreach ($card_array as $da) 
                    {
                        $card_id = $da['_id'];
                        $payment[$card_id] = $da['paymentTerm'];
                    }
                }
                $show1 = Factoring_company_add::raw()->aggregate([
                    ['$match' => ["companyID" => $companyID, "_id" => $docid]],
                    ['$project' => ["companyID" => $companyID, "factoring" => ['$slice' => ['$factoring', $end, $start - $end]]]],
                ]);
                $arrData1 = "";
                foreach ($show1 as $row) 
                {
                    $mainID = $row;
                }
                $arrData1 = array(
                    'mainID' => $mainID,
                    'currencyType' => $currency,
                    'paymentTerm' => $payment,
                );
                $partialdata[] = $arrData1;
            }
        }
        $completedata[] = $partialdata;
        $completedata[] = $paginate;
        $completedata[] = $total_records;
        echo json_encode($completedata);
       
    }
    public function editFactCompany(Request $request)
    {
        $id=$request->id;
        $companyID=(int)Auth::user()->companyID;
        // dd($companyID);
        $Factoring_company_add = Factoring_company_add::where('companyID',$companyID)->first();
        $Factoring_company_addArray=$Factoring_company_add->factoring;
        $facComLength=count($Factoring_company_addArray);
        $i=0;
        $v=0;
        for($i=0; $i<$facComLength; $i++)
        {
            $ids=$Factoring_company_add->factoring[$i]['_id'];
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
        $Factoring_company_add=$Factoring_company_add->factoring[$v];
        $Factoring_company_add=array_merge($companyID,$Factoring_company_add);
         return response()->json($Factoring_company_add, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function updateFactCompany(Request $request)
    {
        $id=$request->id;
        // dd($id);
        $companyID=(int)Auth::user()->companyID;
        $Factoring_company_add = Factoring_company_add::where('companyID',$companyID)->first();
        $facComArray=$Factoring_company_add->factoring;
        $FactLength=count($facComArray);
        $i=0;
        $v=0;
        for($i=0; $i<$FactLength; $i++)
        {
            $ids=$Factoring_company_add->factoring[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        $facComArray[$v]['factoringCompanyname']=$request->factoringCompanyname;
        $facComArray[$v]['address']=$request->address;
        $facComArray[$v]['location']=$request->location;
        $facComArray[$v]['primaryContact']=$request->primaryContact;
        $facComArray[$v]['telephone']=$request->telephone;
        $facComArray[$v]['zip']=$request->zip;
        $facComArray[$v]['ext']=$request->ext;
        $facComArray[$v]['fax']=$request->fax;
        $facComArray[$v]['tollFree']=$request->tollFree;
        $facComArray[$v]['email']=$request->email;
        $facComArray[$v]['secondaryContact']=$request->secondaryContact;
        $facComArray[$v]['factoringtelephone']=$request->factoringtelephone;
        $facComArray[$v]['extFactoring']=$request->extFactoring;
        $facComArray[$v]['currencySetting']=$request->currencySetting;
        $facComArray[$v]['paymentTerms']=$request->paymentTerms;
        $facComArray[$v]['taxID']=$request->taxID;
        $facComArray[$v]['internalNote']=$request->internalNote;
        $Factoring_company_add->factoring=$facComArray;
        if($Factoring_company_add->save())
        {
         $arr = array('status' => 'success', 'message' => 'Factring Company updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function deleteFactCompany(Request $request)
    {
        $id=(int)$request->id;
        $masterId=(int)$request->masterId;
        $companyID=(int)Auth::user()->companyID;
        $factoring=Factoring_company_add::raw()->updateOne(['companyID' => $companyID,'_id' => $masterId,'factoring._id' =>  $id], 
        ['$set' => ['factoring.$.deleteStatus' => 'YES','factoring.$.deleteUser' => Auth::user()->userName,'factoring.$.deleteTime' => time()]]
        );
        if($factoring==true)
        {
            $arr = array('status' => 'success', 'message' => 'factoring deleted successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
    }
    public function restoreFactCompany(Request $request)
    {
        $fuelReceIds=$request->all_ids;
        $custID=(array)$request->custID;
        $companyID=(int)Auth::user()->companyID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $masterId=(int)$company_id;
            $fuelReceIds= str_replace( array('[', ']'), ' ', $fuelReceIds);
            if(is_string($fuelReceIds))
            {
                $fuelReceIds=explode(",",$fuelReceIds);
            }
            // dd((int)$fuelReceIds);
            foreach($fuelReceIds as $r)
            {
                $r=str_replace( array( '\'', '"',
                ',' , ' " " ', '[', ']' ), ' ', $r);
                $r = preg_replace('/\s+/', ' ', $r);
                $Factoring_company_add=Factoring_company_add::raw()->updateOne(['companyID' =>$companyID,'_id' => $masterId,'factoring._id' => (int)$r], 
                ['$set' => ['factoring.$.deleteStatus' => 'NO','factoring.$.deleteUser' => Auth::user()->userName,'factoring.$.deleteTime' => time()]]
                ); 
            }
           
        }
        if($Factoring_company_add==true)
        {
            $arr = array('status' => 'success', 'message' => 'factoring Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
        // foreach($custID as $fuel_re_id)
        // {
        //     $fuel_re_id=str_replace( array( '\'', '"',
        //     ',' , ' " " ', '[', ']' ), ' ', $fuel_re_id);
        //     $fuel_re_id=(int)$fuel_re_id;
        //     $Factoring_company_add = Factoring_company_add::where('companyID',$fuel_re_id )->first();
        //     $Factoring_company_addArray=$Factoring_company_add->factoring;
        //     $arrayLength=count($Factoring_company_addArray);            
        //     $i=0;
        //     $v=0;
        //     $data=array();
        //     for ($i=0; $i<$arrayLength; $i++){
        //         $ids=$Factoring_company_add->factoring[$i]['_id'];
        //         $ids=(array)$ids;
        //         foreach ($ids as $value){
        //             $fuelReceIds= str_replace( array('[', ']'), ' ', $fuelReceIds);
        //             if(is_string($fuelReceIds))
        //             {
        //                 $fuelReceIds=explode(",",$fuelReceIds);
        //             }
        //             foreach($fuelReceIds as $fuelReId)
        //             {
        //                 $fuelReId= str_replace( array('"', ']' ), ' ', $fuelReId);
        //                 if($value==$fuelReId)
        //                 {                        
        //                     $data[]=$i; 
        //                 }
        //             }
        //         }
        //     }
        //     foreach($data as $row)
        //     {
        //         $Factoring_company_addArray[$row]['deleteStatus'] = "NO";
        //         $Factoring_company_add->factoring= $Factoring_company_addArray;
        //         $save=$Factoring_company_add->save();
        //     }
        //     if ($save) {
        //         $arr = array('status' => 'success', 'message' => 'Fuel Factring Company successfully.','statusCode' => 200); 
        //         return json_encode($arr);
        //     }
        // }
    }



}
