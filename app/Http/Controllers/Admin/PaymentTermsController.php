<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment_terms;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Collection;

class PaymentTermsController extends Controller
{
    public function getPaymentTerms(Request $request){
        $companyId=1;
        $PaymentTterms = Payment_terms::where('companyID',$companyId)->get();  //only for company id one
       //$PaymentTterms = Payment_terms::get();
       return response()->json(['PaymentTterms'=>$PaymentTterms], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function editPayTerms(Request $request){

        $id=$request->Id;
        $companyID=(int)$request->comID;

        $result = Payment_terms::where('companyID',$companyID)->first();
        $Array=$result->payment;
        $len=count($Array);
        $i=0;
        $v=0;
        for($i=0; $i<$len; $i++)
        {
            $ids=$Array[$i]['_id'];
            if($ids==$id)
            {
                $v=$i;
            }
        }
        
        $companyID=array(
            "companyID"=>$companyID
        ) ;

        $EditData=$Array[$v];
        $dataArray=array_merge($companyID,$EditData);
        return response()->json($dataArray, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);

    }

    public function updatePaymentTerm(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->compID;

        $result = Payment_terms::where('companyID',$companyID)->first();
        $Array=$result->payment;
        $len=count($Array);
        $i=0;
        $v=0;
        for($i=0; $i<$len; $i++)
        {
            $ids=$Array[$i]['_id'];
            if($ids==$id)
            {
                $v=$i;
            }
        }

        $Array[$v]['paymentTerm']=$request->name;        
        $Array[$v]['paymentDays']=$request->days;
        $Array[$v]['updated_by']=Auth::user()->userFirstName.' '.Auth::user()->userLastName; 
        $Array[$v]['updated_time']=Carbon::now()->timestamp;

        $result->payment=$Array;
        // dd($FuelVendor->fuelCard);
        if($result->save())
        {
         $arr = array('status' => 'success', 'message' => 'Payment Terms  updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }

    public function deletePayTerms(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;

        $result = Payment_terms::where('companyID',$companyID)->first();
        // dd($result);
        $Array=$result->payment;
        $len=count($Array);
        $i=0;
        $v=0;
        for($i=0; $i<$len; $i++)
        {
            $ids=$Array[$i]['_id'];
            if($ids==$id)
            {
                $v=$i;
            }
        }

        $Array[$v]['deleteStatus']="Yes";  
        $Array[$v]['deleteUser']=Auth::user()->userFirstName.' '.Auth::user()->userLastName; 
        $Array[$v]['deleteTime']=date('d-m-y h:i:s');       
        
        $result->payment=$Array;
        // dd($FuelVendor->fuelCard);
        if($result->save())
        {
         $arr = array('status' => 'success', 'message' => 'Payment Terms deleted successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }

    
}
