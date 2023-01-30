<?php

namespace App\Http\Controllers\Admin;

use App\Models\traileradd;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use App\Models\TrailerAdminAdd;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;
use File;
use Image;
use Auth;
use PDF;

class TrailerAdminAddController extends Controller
{
    public function getTrailer()
    {
        $companyId=1;
        $traileradd = traileradd::where('companyID',$companyId)->first();
        $TrailerAdminAdd = TrailerAdminAdd::where('companyID',$companyId)->first();
        // $traileradd=traileradd::get();
        // $TrailerAdminAdd=TrailerAdminAdd::get();
        // dd($TrailerAdminAdd);
        return response()->json(['trailer'=>$traileradd,'trailer_type'=>$TrailerAdminAdd], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
        
    }
    public function addTrailerData(Request $request)
    {
        request()->validate([
            //'trailer_number' => 'required',
            // 'trailertype' => 'required',
            // 'license_plate' => 'required',
            // 'plate_expiry' => 'required',
            // 'vin' => 'required',
        ]);  
        $path = public_path().'/TrailerFile'; 
        // dd($path);       
        if(!File::exists($path)) {
           
          File::makeDirectory($path, $mode = 0777, true, true);
          }
          $privilege=Auth::user()->privilege;
         
          try{
            // dd($request->file('file'));
                if ($files = $request->file('file')) {
                    foreach ($request->file('file') as $file) {
                    // dd($file);
                      
                      $name =  time().rand(0,1000).$file->getClientOriginalName();
                      $filePath=$file->move(public_path().'/TrailerFile/', $name);
                      $data[] = $name;
                      $size = File::size($filePath);
                      
                      $trailerfile[]=array(
                          '_id' => 0,
                          'mainid' =>'' ,
                          'status' => 'trailer_admin_add',
                          'filename' =>$name ,
                          'originalname' => $file->getClientOriginalName(),
                          'filesize' =>$size ,
                          'targetfilepath' => "TrailerFile/".$name,
                          'index' =>0,
                          'companyId' => 1,
                          'privilege' => $privilege,
                      );
                    //   dd($trailerfile);
                  }
                }
            }
           
          catch(\Exception $error){
              return $error->getMessage();
          } 
            
        try{
             

            $Trailer=TrailerAdminAdd::all();
            $companyID=(int)1;

            $getTrailer = TrailerAdminAdd::where('companyID',$companyID)->first();
                if($getTrailer){
                    $totalTrailerArray=count($getTrailer->trailer);
                }else{
                    $totalTrailerArray=0; 
                }
                if(isset($trailerfile)){
                    $trailerDoc=array($trailerfile);
                }else{
                    $trailerDoc=array();
                }
                // dd($request->plate_expiry);
            
            $trailerData[]=array(    
                    '_id' => $totalTrailerArray,
                    //'_id' => new ObjectId(),
                    'counter' => 0,
                    'trailerNumber' => $request->trailer_number,
                    'trailerType' => $request->trailerType,
                    'licenseType' => $request->license_plate,
                    'plateExpiry' =>  strtotime($request->plate_expiry),
                    'inspectionExpiration' =>  strtotime($request->inspection),
                    'status' => $request->status,
                    'model' => $request->model,
                    'year' => $request->year,
                    'axies' => $request->axies,
                    'registeredState' => $request->RegisteredState,
                    'vin' => $request->vin,
                    'dot' =>  strtotime($request->dot),
                    'activationDate' =>  strtotime($request->activation),
                    'internalNotes' => $request->internal_note,
                    'trailerDoc' => $trailerDoc,                   
                    'insertedTime' => time(),
                    'insertedUserId' =>Auth::user()->_id,
                    'deleteStatus' => "NO",
                    'edit_by' =>Auth::user()->userName,
                    'edit_time' =>'',
                        
                );
                if($getTrailer){
                    $trailerArray=$getTrailer->trailer;
                    TrailerAdminAdd::where(['companyID' =>$companyID ])->update([
                        'counter'=> $totalTrailerArray+1,
                        'trailer' =>array_merge($trailerArray,$trailerData) ,
                    ]);

                    $data = [
                        'success' => true,
                        'message'=> 'Trailer added successfully'
                    ] ;
                    
                    return response()->json($data);
                }else{
                    if(TrailerAdminAdd::create([
                        '_id' => new ObjectId(),
                        'companyID' => $companyID,
                        'counter' => $totalTrailerArray+1,
                        'trailer' => $trailerData,
                    ])) {
                        $data = [
                            'success' => true,
                            'message'=> 'trailer added successfully'
                            ] ;
                            return response()->json($data);
                    }
                }
        } 
        catch(\Exception $error){
            return $error->getMessage();
        }
    }
    public function trailer_getTrailertype()
    {
        $companyId=1;   
        $truck_type = traileradd::where('companyID',$companyId)->first();    
        return response()->json($truck_type, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function trailer_addTrailertype(Request $request)
    {
        $companyID=1;
        // dd($request->trailer_type_name);
        $getTrailer = traileradd::where('companyID',$companyID)->first();
        if($getTrailer){
            $totalTrailerArray=count($getTrailer->trailer);
        }else{
            $totalTrailerArray=0; 
        }
        $trailerData[]=array(    
            '_id' => $totalTrailerArray,
            //'_id' => new ObjectId(),
            'counter' => 2,
            'trailerType' => $request->trailerType,
            'deleteStatus' => "NO",
            'deleteUser'=>"",
                
        );
        $trailerArray=$getTrailer->trailer;
        // dd($trailerArray);
        if(traileradd::where(['companyID' =>$companyID ])->update([
            'companyID' => $companyID,
            'counter' => $totalTrailerArray+1,
            'trailer' =>array_merge($trailerArray,$trailerData) , 
        ])) {
            $data = [
                'success' => true,
                'message'=> 'trailer added successfully'
                ] ;
                return response()->json($data);
        }
       
    }
    public function edit_trailer(Request $request)
    {
        $id=$request->id;
        $companyID=1;
        $trailerType=traileradd::where('companyID',$companyID)->first();
        // dd($trailerType);
        $trailerTyperArray=$trailerType->trailer;
        $trailerTypeLength=count($trailerTyperArray);
        $traileradd=TrailerAdminAdd::where('companyID',$companyID)->first();
        $trailerArray=$traileradd->trailer;
        $arrayLength=count($trailerArray);
        // dd($arrayLength);
        $i=0;
        $v=0;
        $j=0;
        $h=0;
       for ($i=0; $i<$arrayLength; $i++){
            $ids=$traileradd->trailer[$i]['_id'];
            $ids=(array)$ids;
            // dd($id);
                foreach ($ids as $value){
                    // dd($value);
                    if($value==$id){
                        $v=$i;
                     }
                }
       }
       
       for ($j=0; $j<$trailerTypeLength; $j++){
        $ids=$trailerType->trailer[$j];
        // dd($id);
            foreach ($ids as $value){
                // dd($value);
                if($value==$id){
                    $h=$j;
                 }
            }
        }
        $trailerTypeData=$trailerType->trailer[$h];
       $trailerEditData=$traileradd->trailer[$v];
       $data=array_merge($trailerTypeData,$trailerEditData);
    //    dd($data);
    return response()->json($data); 
    }
    public function updateTrailer(Request $request)
    {
        request()->validate([
            // 'trailer_number' => 'required',
            // 'trailertype' => 'required',
            // 'license_plate' => 'required',
            // 'plate_expiry' => 'required',
            // 'vin' => 'required',
        ]);  
        $path = public_path().'/TrailerFile';        
        if(!File::exists($path)) {
           
          File::makeDirectory($path, $mode = 0777, true, true);
          }
          $privilege=Auth::user()->privilege;
          try{
            // dd($trailerfiles);
              if ($files = $request->file('file')) {
                  foreach ($request->file('file') as $file) {
                    // dd($files);
                      
                      $name =  time().rand(0,1000).$file->getClientOriginalName();
                      $filePath=$file->move(public_path().'/TrailerFile/', $name);
                      $data[] = $name;
                      $size = File::size($filePath);
                      
                      $trailerfile[]=array(
                          '_id' => 0,
                          'mainid' =>'' ,
                          'status' => 'trailer_admn_add',
                          'filename' =>$name ,
                          'originalname' => $file->getClientOriginalName(),
                          'filesize' =>$size ,
                          'targetfilepath' => "TrailerFile/".$name,
                          'index' =>0,
                          'companyId' => 1,
                          'privilege' => $privilege,
                      );
                  }
              }
          }
          catch(\Exception $error){
              return $error->getMessage();
          }  
        $companyID=(int)1;
        $id=$request->id;
        $traileradd=TrailerAdminAdd::where('companyID',$companyID)->first();
        $trailerArray=$traileradd->trailer;
        $arrayLength=count($trailerArray);

        $Trailer=TrailerAdminAdd::all();
            $getTrailer = TrailerAdminAdd::where('companyID',$companyID)->first();
                if($getTrailer){
                    $totalTrailerArray=count($getTrailer->trailer);
                }else{
                    $totalTrailerArray=0; 
                }
                if(isset($trailerfile)){
                    $trailerDoc=array($trailerfile);
                }else{
                    $trailerDoc=array();
                }
        // dd($trailerDoc);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLength; $i++){
            $ids=$traileradd->trailer[$i]['_id'];
            $ids=(array)$ids;
                foreach ($ids as $value){
                    if($value==$id){
                        $v=$i;
                     }
                }
       }
    //    $trailerDoc=$trailerfile;
    //    dd($request->axies);
       $trailerArray[$v]['trailerNumber'] = $request->trailer_number;
       $trailerArray[$v]['trailerType'] = $request->trailertypeId;
       $trailerArray[$v]['licenseType'] = $request->license_plate;
       $trailerArray[$v]['plateExpiry'] =  strtotime($request->plate_expiry);
       $trailerArray[$v]['inspectionExpiration'] =  strtotime($request->inspection);
       $trailerArray[$v]['status'] = $request->status;
       $trailerArray[$v]['model'] = $request->model;
       $trailerArray[$v]['year'] = $request->year;
       $trailerArray[$v]['axies'] = $request->axies;
       $trailerArray[$v]['registeredState'] = $request->RegisteredState;
       $trailerArray[$v]['vin'] = $request->vin;
       $trailerArray[$v]['dot'] =  strtotime($request->dot);
       $trailerArray[$v]['activationDate'] =  strtotime($request->activation);
       $trailerArray[$v]['internalNotes'] = $request->internal_note;
       $trailerArray[$v]['trailerDoc'] = $trailerDoc;                   
       $trailerArray[$v]['insertedTime'] = time();
       $trailerArray[$v]['insertedUserId'] =Auth::user()->_id;
       $trailerArray[$v]['deleteStatus'] = "NO";
       $trailerArray[$v]['edit_by'] =Auth::user()->userName;
       $trailerArray[$v]['edit_time'] ='';
        $traileradd->trailer= $trailerArray;
      
       if($traileradd->save())
       {
        $arr = array('status' => 'success', 'message' => 'Trailer updated successfully.','statusCode' => 200); 
        return json_encode($arr);
       }
    }
    public function deleteTrailer(Request $request)
    {
        $companyID=(int)1;
        $id=$request->id;
        $companyID=(int)1;
        $id=$request->id;
        $traileradd=TrailerAdminAdd::where('companyID',$companyID)->first();
        $trailerArray=$traileradd->trailer;
        $arrayLength=count($trailerArray);
        // dd($arrayLength);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLength; $i++){
            $ids=$traileradd->trailer[$i];
                foreach ($ids as $value){
                    if($value==$id){
                        $v=$i;
                     }
                }
       }
    
       $trailerArray[$v]['deleteStatus'] = "YES";
        $traileradd->trailer= $trailerArray;
        if ($traileradd->save()) {
            $arr = array('status' => 'success', 'message' => 'Trailer deleted successfully.','statusCode' => 200); 
        return json_encode($arr);
        }
    }
}
