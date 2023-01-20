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
// use App\Models\;
// use App\Models\;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class LoadBoardController extends Controller
{
    public function getLoadboardData(Request $request){
        $companyId=1;
        $mergedArray = [];
        //$Open = Open::get();
        $Open = Open::select('_id','companyID','load._id','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();
        
        $Dispatched = Dispatched::select('_id','companyID','load._id','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();
        
        $ArrivedShipper = ArrivedShipper::select('_id','companyID','load._id','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $Loaded = Loaded::select('_id','companyID','load._id','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $OnRoute = OnRoute::select('_id','companyID','load._id','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $ArrivedConsignee = ArrivedConsignee::select('_id','companyID','load._id','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $Delivered = Delivered::select('_id','companyID','load._id','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $BreakDown = BreakDown::select('_id','companyID','load._id','load.cnno','load.status','load.shipper_pickup','load.consignee_pickup','load.loaddata.customername','load.loaddata.loadername','load.shipper.shipper_location','load.consignee.consignee_location','load.loaddata.loadertruck','load.loaddata.loadertrailer','load.total_rate','load.carrier_total','load.company')->where('companyID',$companyId)->get();

        $data = $Open->concat($Dispatched)->concat($ArrivedShipper)->concat($Loaded)->concat($OnRoute)->concat($ArrivedConsignee)->concat($Delivered)->concat($BreakDown);
        //dd($data);
        return response()->json($data);
        
        //return response()->json(['Open'=>$Open, 'Dispatched'=>$Dispatched, 'ArrivedShipper'=>$ArrivedShipper, 'Loaded'=>$Loaded, 'OnRoute'=>$OnRoute, 'ArrivedConsignee'=>$ArrivedConsignee, 'Delivered'=>$Delivered, 'BreakDown'=>$BreakDown], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
        
    }

    public function changeStatus(Request $request){
    //dd($request);
    $com_id=(int)$request->com_id;
    $id=(int)$request->id;
    $old_collection=(object)$request->oldSelectedValue;
    $collection=$request->valueSelected;
    $data = Open::where('companyID',$com_id)->get();
dd($data);

    }

    
}
