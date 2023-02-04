<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Factoring_company_add;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class factCompanyController extends Controller
{
    public function getFactCompany(){
        $companyId=(int)Auth::user()->companyID;
        $FactCompany = Factoring_company_add::where('companyID',$companyId)->first();
        $FactCompany=collect($FactCompany->factoring);
        $FactCompany = $FactCompany->chunk(4);
       $FactCompany= $FactCompany->toArray();
    //    dd($FactCompany);
       return response()->json(['FactCompany'=>$FactCompany], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
       
    }
    public function editFactCompany(Request $request)
    {
        $id=$request->id;
        $companyID=(int)Auth::user()->companyID;
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
        $id=$request->id;
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
        $facComArray[$v]['deleteStatus']="YES";
        $Factoring_company_add->factoring=$facComArray;
        if($Factoring_company_add->save())
        {
         $arr = array('status' => 'success', 'message' => 'Factring Company deleted successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    public function restoreFactCompany(Request $request)
    {
        $fuelReceIds=$request->all_ids;
        $custID=(array)$request->custID;
        foreach($custID as $fuel_re_id)
        {
            $fuel_re_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $fuel_re_id);
            $fuel_re_id=(int)$fuel_re_id;
            $Factoring_company_add = Factoring_company_add::where('companyID',$fuel_re_id )->first();
            $Factoring_company_addArray=$Factoring_company_add->factoring;
            $arrayLength=count($Factoring_company_addArray);            
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$Factoring_company_add->factoring[$i]['_id'];
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
                $Factoring_company_addArray[$row]['deleteStatus'] = "NO";
                $Factoring_company_add->factoring= $Factoring_company_addArray;
                $save=$Factoring_company_add->save();
            }
            if ($save) {
                $arr = array('status' => 'success', 'message' => 'Fuel Factring Company successfully.','statusCode' => 200); 
                return json_encode($arr);
            }
        }
    }


}
