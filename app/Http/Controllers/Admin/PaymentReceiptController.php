<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\BankDebitCategory;
use App\Models\Company;
use App\Models\PaymentBank;
use Razorpay\Api\Api;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class PaymentReceiptController extends Controller
{
    public function getPaymentReceipt(Request $request){
    //     $companyId=(int)1;
    //     $Driver=Driver::where('companyID',$companyId)->first();
    //     $BankDebitCategory = BankDebitCategory::where('companyID',$companyId)->first();  
    //     $PaymentBank=PaymentBank::all(); 
    //     $Company=Company::where('companyID',$companyId)->first();    
    //    return response()->json(['Driver'=>$Driver, 'BankDebitCategory'=>$BankDebitCategory, 'PaymentBank'=>$PaymentBank,'Company'=>$Company], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function StorePaymentReceipt(Request $request)
    {

    }
    public function razorpay(Request $request)
    {

    }
    public function payment(Request $request)
    {
         $input = $request->all();        
        $api = new Api(env('MIX_PUSHER_APP_KEY'), env('MIX_PUSHER_APP_CLUSTER'));
        dd($api);
        // $payment = $api->payment->fetch($input['razorpay_payment_id']);

        // if(count($input)  && !empty($input['razorpay_payment_id'])) 
        // {
        //     try 
        //     {
        //         $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

        //     } 
        //     catch (\Exception $e) 
        //     {
        //         return  $e->getMessage();
        //         \Session::put('error',$e->getMessage());
        //         return redirect()->back();
        //     }            
        // }
        
        // \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        // return redirect()->back();
    }
  
   

    
}
