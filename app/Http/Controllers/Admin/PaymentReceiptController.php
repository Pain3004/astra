<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoiced;
use App\Models\Completed;
use App\Models\ReceiptTracker;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class PaymentReceiptController extends Controller
{
    public function getPaymentReceipt(Request $request){
        $companyId=1;
        $ReceiptTracker = ReceiptTracker::all();   
        $data=Completed::all();    
       return response()->json($ReceiptTracker, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
  
   

    
}
