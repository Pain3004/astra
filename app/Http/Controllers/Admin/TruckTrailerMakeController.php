<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\traileradd;
use App\Models\Truck_type;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Collection;

class TruckTrailerMakeController extends Controller
{
    public function getTruckTrailerMake(Request $request){
    $companyId=1;
    $trailer_type = traileradd::where('companyID',$companyId)->get();  //only for company id one
    $Truck_type = Truck_type::where('companyID',$companyId)->get();  //only for company id one
    //$trailer_add = traileradd::get();
    //$Truck_type = Truck_type::get();
       return response()->json(['trailer_type'=>$trailer_type,'Truck_type'=>$Truck_type], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function addTruckTrailer(Request $request)
    {
        $companyID=1;
        $total_Truck_Array=0;
        $getCompany_Truck = Truck_type::where('companyID',$companyID)->first();
        $getCompany_Trailer = traileradd::where('companyID',$companyID)->first();
        //dd($getCompany_Truck);
        //truck
        if($request->type == 'Truck'){
            if($getCompany_Truck){
                $Truck_Array=$getCompany_Truck->truck;
                //dd($Truck_Array);
                $total_Truck_Array=count($Truck_Array)+ 1;
            }
      
            $Truck_Data[]=array(    
                           '_id' => count($Truck_Array),
                           'truckType' => $request->tt_name,
                           'counter' => 0,
                           'created_by' => Auth::user()->userFirstName.' '.Auth::user()->userLastName, 
                           'created_at' =>Carbon::now()->timestamp,
                           'deleteStatus' => 'NO',
                           'deleteUser' => '',
                           'deleteTime' => '',
                           );
    
            if($getCompany_Truck){
                Truck_type::where(['companyID' => $companyID])->update([
                    'counter'=> $total_Truck_Array,
                    'truck' =>array_merge($Truck_Array,$Truck_Data) ,
                ]);
    
                $arrr_Truck = array('status' => 'success', 'message' => 'Truck Type added successfully.'); 
                return json_encode($arrr_Truck);
            }else{
                try{
                        if(Truck_type::create([
                            // 'companyID' => (int)$_SESSION['companyId'],
                            '_id' => 0,
                            'companyID' => $companyID,
                            'counter' => 1,
                            'truck' => $Truck_Data,
                        ])) {
                            $arrr_Truck = array('status' => 'success', 'message' => 'Equipment Type added successfully.'); 
                            return json_encode($arrr_Truck);
                        }
                }
                catch(\Exception $error){
                    return $error->getMessage();
                }
            }
        }
        
        //trailer
        if($request->type == 'Trailer'){
            if($getCompany_Trailer){
                $Trailer_Array=$getCompany_Trailer->trailer;
                $total_Trailer_Array=count($Trailer_Array)+ 1;
            }
      
            $Trailer_Data[]=array(    
                           '_id' => count($Trailer_Array),
                           'trailerType' => $request->tt_name,
                           'counter' => 0,
                           'created_by' => Auth::user()->userFirstName.' '.Auth::user()->userLastName, 
                           'created_at' =>Carbon::now()->timestamp,
                           'deleteStatus' => 'NO',
                           'deleteUser' => '',
                           'deleteTime' => '',
                           );
    
                    
            if($getCompany_Trailer){
                traileradd::where(['companyID' => $companyID])->update([
                    'counter'=> $total_Trailer_Array,
                    'trailer' =>array_merge($Trailer_Array,$Trailer_Data) ,
                ]);
    
                $arrr_Trailer = array('status' => 'success', 'message' => 'Truck Type added successfully.'); 
                return json_encode($arrr_Trailer);
            }else{
                try{
                        if(traileradd::create([
                            // 'companyID' => (int)$_SESSION['companyId'],
                            '_id' => 0,
                            'companyID' => $companyID,
                            'counter' => 1,
                            'trailer' => $Trailer_Data,
                        ])) {
                            $arrr_Trailer = array('status' => 'success', 'message' => 'Equipment Type added successfully.'); 
                            return json_encode($arrr_Trailer);
                        }
                }
                catch(\Exception $error){
                    return $error->getMessage();
                }
            }
        }
   }

   public function deleteTruckTrailer(Request $request)
   {
       $type=$request->type;
       $id=$request->id;
       $companyID=(int)$request->comId;

       if($type=="Truck"){
        //dd("truck");
        $result = Truck_type::where('companyID',$companyID)->first();
        $Array=$result->truck;
        $len=count($Array);
        $i=0;
        $v=0;
        for($i=0; $i<$len; $i++)
        {
            $ids=$Array[$i]['_id'];
            if($ids==$id)
            {
                $v=$i;
            }
        }
 
        $Array[$v]['deleteStatus']="Yes";  
        $Array[$v]['deleteUser']=Auth::user()->userFirstName.' '.Auth::user()->userLastName; 
        $Array[$v]['deleteTime']=Carbon::now()->timestamp;       
        $result->truck=$Array;
        if($result->save())
        {
            $arr = array('status' => 'success', 'message' => 'Truck Trailer Deleted successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
       }
       else if($type=="Trailer"){
        // dd("Trailer");
        $result = traileradd::where('companyID',$companyID)->first();
        $Array=$result->trailer;
        $len=count($Array);
        $i=0;
        $v=0;
        for($i=0; $i<$len; $i++)
        {
            $ids=$Array[$i]['_id'];
            if($ids==$id)
            {
                $v=$i;
            }
        }
 
        $Array[$v]['deleteStatus']="Yes";  
        $Array[$v]['deleteUser']=Auth::user()->userFirstName.' '.Auth::user()->userLastName; 
        $Array[$v]['deleteTime']=Carbon::now()->timestamp;       
        $result->trailer=$Array;
        if($result->save())
        {
            $arr = array('status' => 'success', 'message' => 'Truck Trailer Deleted successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
       }
       
       // dd($FuelVendor->fuelCard);
       
   }
    
}
