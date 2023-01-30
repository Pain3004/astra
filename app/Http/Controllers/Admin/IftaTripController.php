<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoiced;
use App\Models\Consignee;
use App\Models\Truckadd;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class IftaTripController extends Controller
{
    public function getIftaTrip(Request $request){
        $quarter=$request->quarter;
        $year=$request->year;
        
        
        $companyId=1;
        $data = Invoiced::where('companyID',$companyId);
        $startdate="";
        $enddate="";
        if(isset($year))
        {
            $start_date="";
            $end_date="";
            if($quarter==1)
            {
                $start_date="01-01";
                $end_date="03-31 ";
            }
            elseif($quarter==2)
            {
                $start_date="04-01";
                $end_date="06-30";
            }
            elseif($quarter==3)
            {
                $start_date="08-01";
                $end_date="09-30 ";
            }
            elseif($quarter==4)
            {
                $start_date="10-01";
                $end_date="12-31";
            }
            $start_date=$year."-".$start_date;
            $end_date=$year."-".$end_date;
            $startdate = strtotime($start_date);
            $enddate = strtotime($end_date);
        }
        
        $Shipper=$data->first();
       
       return response()->json(['Shipper'=>$Shipper,'startdate'=>$startdate,'enddate'=>$enddate], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function editIftaTrip(Request $request)
    {
        $tripId=$request->iftaTripId;
        $companyId=(int)$request->comId;
        $Invoiced = Invoiced::where('companyID',$companyId)
                            ->select('Invoiced.load.rate')
                            ->first();
                            // dd($Invoiced);
        // echo $tripId . " " .$companyId; 
    }
    public function updateIftaTrip(Request $request)
    {

    }
    public function searchIftaTrip(Request $request)
    {

    }
    public function getgspAPI(Request $request)
    {
        
    }
  
   

    
}
