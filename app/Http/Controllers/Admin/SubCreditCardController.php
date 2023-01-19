<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCreditCard;
use App\Models\CreditCard;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class SubCreditCardController extends Controller
{
    public function getsubCreditCard(Request $request){
        $companyId=1;
        $SubCreditCard = SubCreditCard::where('companyID',$companyId)->get();  //only for company id one
        $CreditCard = CreditCard::where('companyID',$companyId)->get();  //only for company id one
        // $SubCreditCard = SubCreditCard::get();
        // $CreditCard = CreditCard::get();
       //dd($bankData);
       return response()->json(['SubCreditCard'=>$SubCreditCard, 'CreditCard'=>$CreditCard], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function storesubCreditCard(Request $request)
    {

    }
    public function editsubCreditCard(Request $request)
    {
        
    }
    public function updatesubCreditCard(Request $request)
    {
        
    }
    public function deletesubCreditCard(Request $request)
    {
        
    }
    public function restoresubCreditCard(Request $request)
    {
        
    }

   

    
}
