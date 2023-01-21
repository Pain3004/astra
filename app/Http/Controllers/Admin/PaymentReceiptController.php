<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\BankDebitCategory;
use App\Models\Company;
use App\Models\PaymentBank;
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
  
   

    
}
