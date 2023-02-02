<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivered;
use App\Models\Invoiced;
use App\Models\Completed;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class AccountManagerController extends Controller
{
    public function getAccountDeliverdValue(Request $request){
     $companyId=1;
     $AccountingManager = Delivered::where('companyID',$companyId)->get();  //only for company id one
        // $AccountingManager = Delivered::get();
        return response()->json(['AccountingManager'=>$AccountingManager], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function getAccountInvoiceValue(Request $request){
     $companyId=1;
     $AccountingManager = Invoiced::where('companyID',$companyId)->get();  //only for company id one
        // $AccountingManagerInvoiced = Invoiced::get();
        return response()->json(['AccountingManagerInvoice'=>$AccountingManagerInvoiced], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function getAccountCompletedValue(Request $request){
     $companyId=1;
     $AccountingManager = Invoiced::where('companyID',$companyId)->get();  //only for company id one
        // $AccountingManagerComplete = Completed::get();
        return response()->json(['AccountingManagerComplete'=>$AccountingManagerComplete], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function accountChangeStatus(Request $request)
    {
        $status=$request->status;
        if($status=="Delivered")
        {

        }
        elseif($status=="Delivered")
        {

        }
        // dd($status);
    }

    
}
