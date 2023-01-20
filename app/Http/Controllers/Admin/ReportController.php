<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoiced;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class ReportController extends Controller
{
    public function createAgingReport(Request $reqest)
    {
        $companyId=1;
        $Invoiced = Invoiced::where('companyID',$companyId)->first();
        return response()->json($Invoiced, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

}
