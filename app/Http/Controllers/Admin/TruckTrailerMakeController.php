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
    $trailer_type = traileradd::where('companyID',1)->get();  //only for company id one
    $Truck_type = Truck_type::where('companyID',1)->get();  //only for company id one
    //$type=$request->type;
    // dd(count($trailer_type));
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
                           'created_time' =>Carbon::now()->timestamp,
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
                           'created_time' =>Carbon::now()->timestamp,
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

    public function editTruckTrailer(Request $request){

        $id=$request->Id;
        $companyID=(int)$request->comID;
        $type=$request->Type;

        if($type=='Truck'){
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
        }
        if($type=='Trailer'){
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
        }
        
        $companyID=array(
            "companyID"=>$companyID,
            "type"=>$type
        ) ;

        $EditData=$Array[$v];
        $dataArray=array_merge($companyID,$EditData);
        return response()->json($dataArray, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);

    }

    public function updatetruckTrailer(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->compID;
        $type=$request->type;

        
        $i=0;
        $v=0;

        if($type=='Truck'){
            $result = Truck_type::where('companyID',$companyID)->first();
            $Array=$result->truck;
            $len=count($Array);

            for($i=0; $i<$len; $i++)
            {
                $ids=$Array[$i]['_id'];
                if($ids==$id)
                {
                    $v=$i;
                }
            }
    
            $Array[$v]['truckType']=$request->name;        
            $Array[$v]['edit_by']=Auth::user()->userFirstName.' '.Auth::user()->userLastName; 
            $Array[$v]['edit_time']=Carbon::now()->timestamp;
            $result->truck=$Array;
    
        }
        if($type=='Trailer'){
            $result = traileradd::where('companyID',$companyID)->first();
            $Array=$result->trailer;
            $len=count($Array); 

            for($i=0; $i<$len; $i++)
            {
                $ids=$Array[$i]['_id'];
                if($ids==$id)
                {
                    $v=$i;
                }
            }
    
            $Array[$v]['trailerType']=$request->name;        
            $Array[$v]['edit_by']=Auth::user()->userFirstName.' '.Auth::user()->userLastName; 
            $Array[$v]['edit_time']=Carbon::now()->timestamp;
            $result->trailer=$Array;
    
        }

        if($result->save())
        {
         $arr = array('status' => 'success', 'message' => 'Truck & Trailer  updated successfully.','statusCode' => 200); 
         return json_encode($arr);
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
   
    public function restoreTruckTrailer(Request $request)
    {
       // dd($request->id);
        $truckId=$request->id;
        $trailerIds=$request->all_ids;
        $dataType=str_replace( array('[', ']'), ' ',$request->dataType);
        $dataType_add=explode(",",$dataType);
        $custID=(array)$request->custID;

        //dd($trailerId);
        // $type=count(($dataType_add));
        // for($t=0; $t<$type; $t++){

        // }
        foreach($dataType_add as $key=>$truckTrailerConTy)
        {
            
            $truckTrailerConTy=str_replace( array('"' ,']'), ' ',$truckTrailerConTy);
            $truckTrailerConTy = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $truckTrailerConTy)));
            //$truckTrailerConTy="shipper";
            
        if($truckTrailerConTy=="Truck")
        {
            foreach($custID as $company_id)
            {
                $company_id=str_replace( array( '\'', '"',
                ',' , ' " " ', '[', ']' ), ' ', $company_id);
                $company_id=(int)$company_id;
            
                $Truck = Truck_type::where('companyID',$company_id )->first();
                $TruckArray=$Truck->truck;
                $arrayLength=count($TruckArray);         
                $i=0;
                $v=0;
                $data=array();
                for ($i=0; $i<$arrayLength; $i++){
                    $ids=$Truck->truck[$i]['_id'];
                    $ids=(array)$ids;
                    
                    foreach ($ids as $value){
                        $trailerIds= str_replace( array('[', ']'), ' ', $trailerIds);
                        if(is_string($trailerIds))
                        {
                            $trailerIds=explode(",",$trailerIds);
                        }
                        foreach($trailerIds as $ship_id)
                        {
                            $ship_id= str_replace( array('"', ']' ), ' ', $ship_id);
                            if($value==$ship_id)
                            {                        
                                $data[]=$i; 
                            }
                        }
                    }
                }
                //
                // dd($data);
                foreach($data as $row)
                {
                    $TruckArray[$row]['deleteStatus'] = "NO";
                    $Truck->truck= $TruckArray;
                    $save=$Truck->save();
                }
                if (isset($save)) {
                    $arr = array('status' => 'success', 'message' => 'Truck Restored successfully.','statusCode' => 200); 
                return json_encode($arr);
                }
            } 
        }
            if($truckTrailerConTy=='Trailer')
            {
                // print_r($truckTrailerConTy);
                foreach($custID as $company_id)
                {
                    $company_id=str_replace( array( '\'', '"',
                    ',' , ' " " ', '[', ']' ), ' ', $company_id);
                    $company_id=(int)$company_id;
                    $Trailer = traileradd::where('companyID',$company_id )->first();
                    $TrailerArray=$Trailer->trailer;
                    $arrayLength=count($TrailerArray);         
                    $i=0;
                    $v=0;
                    $data=array();
                    for ($i=0; $i<$arrayLength; $i++){
                        $ids=$Trailer->trailer[$i]['_id'];
                        $ids=(array)$ids;
                        foreach ($ids as $value){
                            // dd( $trailerIds);
                            $trailerIds= str_replace( array('[', ']'), ' ', $trailerIds);
                            // dd($trailerIds);
                            if(is_string($trailerIds))
                            {
                                $trailerIds=explode(",",$trailerIds);
                            }
                            foreach($trailerIds as $ship_id)
                            {
                                $ship_id= str_replace( array('"', ']' ), ' ', $ship_id);
                                if($value==$ship_id)
                                {                        
                                    $data[]=$i; 
                                }
                            }
                        }
                    }
                    foreach($data as $row)
                    {
                        $TrailerArray[$row]['deleteStatus'] = "NO";
                        $Trailer->trailer= $TrailerArray;
                        $save=$Trailer->save();
                    }
                    if (isset($save)) {
                        $arr = array('status' => 'success', 'message' => 'Trailer Restored successfully.','statusCode' => 200); 
                    return json_encode($arr);
                    }
                }
                
            }
           
           
        }
           
        // dd($request->custID);
       
    }
}
