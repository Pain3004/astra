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
       return response()->json($FactCompany, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
       
    }
    public function editFactCompany(Request $request)
    {

    }
    public function updateFactCompany(Request $request)
    {
        
    }
    public function deleteFactCompany(Request $request)
    {
        
    }
    public function restoreFactCompany(Request $request)
    {
        
    }


}
