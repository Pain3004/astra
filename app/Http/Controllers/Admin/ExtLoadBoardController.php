<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Open;
use App\Models\Dispatched;
use App\Models\ArrivedShipper;
use App\Models\Loaded;
use App\Models\OnRoute;
use App\Models\ArrivedConsignee;
use App\Models\Delivered;
use App\Models\BreakDown;
use App\Models\User;
use Auth;
use Error;
use MongoDB\Driver\Cursor;
// use App\Models\;
use File;
use MongoDB\BSON\Regex;
use Image;
use Illuminate\Support\Arr;


use PDF;
// use MongoDB\BSON\ObjectId;
// new \MongoDB\BSON\ObjectID;

use Illuminate\Database\Eloquent\Collection;

class ExtLoadBoardController extends Controller
{

    public function getExtLoadboardData(Request $request){
        $companyId=auth::user()->companyID;
        $mergedArray = [];
        $Open = Open::where('companyID',$companyId)->get();
        $Dispatched = Dispatched::where('companyID',$companyId)->get();
        $ArrivedShipper = ArrivedShipper::where('companyID',$companyId)->get();
        $Loaded = Loaded::where('companyID',$companyId)->get();
        $OnRoute = OnRoute::where('companyID',$companyId)->get();
        $ArrivedConsignee = ArrivedConsignee::where('companyID',$companyId)->get();
        $Delivered = Delivered::where('companyID',$companyId)->get();
        $BreakDown = BreakDown::where('companyID',$companyId)->get();
        $user=User::get();
        $data = $Open->concat($Dispatched)->concat($ArrivedShipper)->concat($Loaded)->concat($OnRoute)->concat($ArrivedConsignee)->concat($Delivered)->concat($BreakDown);
        // dd( $data);
        return response()->json(['data'=>$data,'user'=>$user]);
    }
}
