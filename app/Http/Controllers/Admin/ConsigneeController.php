<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consignee;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class ConsigneeController extends Controller
{
    public function getConsignee(){
        // $companyId=59;
        $companyId=(int)1;
        // dd($companyId);
        $consignee = Consignee::where('companyID',$companyId)->first();
        // dd($consignee);
       return response()->json($consignee, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
       
    }



}
