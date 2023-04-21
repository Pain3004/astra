<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truckadd;
use App\Models\Truck_type;
use File;
use App\Models\UserSubscription;
use Image;
use App\Helpers\AppHelper;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class TruckController extends Controller
{
    public function getTruck(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $total_records = 0;
        $cursor = Truckadd::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['size' => ['$size' => ['$truck']],
            ]]
        ]);
        $totalarray = $cursor;
        $docarray = array();
        foreach ($cursor as $v) {
            $docarray[] = array("size" => $v['size'], "id" => $v['_id']);
            $total_records += (int)$v['size'];
        }

        $completedata = array();
        $partialdata = array();
        $paginate = AppHelper::instance()->paginate($docarray);
        if (!empty($paginate[0][0][0])){     
            for ($i = 0; $i < sizeof($paginate[0][0][0]); $i++) 
            {
                $pagina_data= str_replace( array('"',":"," " ,"doc",'start',"end", ']','[','{','}' ), ' ', $request->arr);
                $pagina_data=explode(",",$pagina_data);
                if(!empty($request->arr))
                {
                    $docid=preg_replace('/\s+/',"", $pagina_data[0]);
                    $start=preg_replace('/\s+/',"",$pagina_data[1]);
                    $end=preg_replace('/\s+/',"",$pagina_data[2]);
                    $docid=intval($docid);
                    $start=intval($start);
                    $end=intval($end);
                }
                else
                {
                    $docid= $paginate[0][0][0][$i]['doc'];
                    $end=$paginate[0][0][0][$i]['end'];
                    $start=$paginate[0][0][0][$i]['start'];
                }
                $collection_truck = Truck_type::raw();
                $cltruck = $collection_truck->find(["companyID" => $companyID]);
                $truckType = array();
                foreach ($cltruck as $tr) {
                    $truck_arr = $tr['truck'];
                    foreach ($truck_arr as $trd) {
                        $truck_id = $trd['_id'];
                        $truckType[$truck_id] = $trd['truckType'];
                    }
                }
                $collection = Truckadd::raw();
                $show1 = $collection->aggregate([
                    ['$match' => ['companyID' => $companyID,"_id" => $docid]],
                    ['$project' => ['companyID' => $companyID, 'truck' => ['$slice' => ['$truck', $end, $start - $end]]]]
                ]);
                $arrData1 = "";
                foreach ($show1 as $row) {
                    $mainID = $row;
                }
                $arrData1 = array(
                    'mainID' => $mainID,
                    'truckType' => $truckType
                );
                $partialdata[]= $arrData1;
            }
        }
        $subscriptionCheck = UserSubscription::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['truckadd' => 1]]
        ]);
        $remaining = 0;
        foreach($subscriptionCheck as $res) 
        {
            $paidremaining = $res['truckadd']['remaining'];
            $freetotal = $res['truckadd']['freetotal'];
            $paidtotal = $res['truckadd']['total'];
            $freeremaining = $res['truckadd']['freeremaining'];
        }

        $total_records = $freetotal + $paidtotal;
        $remaining = $freeremaining + $paidremaining;

        $arrcount =  array('total_records' => $total_records, 'remaining' => $remaining,'paidRemaining' => $paidremaining);
        $completedata[] = $partialdata;
        $completedata[] = $paginate;
        $completedata[] = $arrcount;
        echo json_encode($completedata);
    }

    public function truck_getTrucktype(Request $request)
    {
        $companyId=(int)Auth::user()->companyID;;       
        $truck_type = Truck_type::where('companyID',$companyId)->first();    
       return response()->json($truck_type, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    
    public function addTruckData(Request $request)
    {
        request()->validate([
            'truck_number' => 'required',
            'trucktype' => 'required',
            'license_plate' => 'required',
            'plate_expiry' => 'required',
            'ownership' => 'required',
            'vin' => 'required',
        ]);
      $path = public_path().'/TruckFile';
      if(!File::exists($path)) {
        File::makeDirectory($path, $mode = 0777, true, true);
        }
        $privilege=Auth::user()->privilege;
        try{
            if ($files = $request->file('file')) {
                foreach ($request->file('file') as $file) {
                    
                    $name =  time().rand(0,1000).$file->getClientOriginalName();
                    $filePath=$file->move(public_path() . '/TruckFile/', $name);
                    $data[] = $name;
                    $size = File::size($filePath);
                    
                    $truckfile[]=array(
                        '_id' => 0,
                        'mainid' =>'' ,
                        'status' => 'truckadd',
                        'filename' =>$name ,
                        'originalname' => $file->getClientOriginalName(),
                        'filesize' =>$size ,
                        'targetfilepath' => "TruckFile/".$name,
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
        try{
            $companyID=(int)Auth::user()->companyID;

            $getTruck = Truckadd::where('companyID',$companyID)->first();
            // dd($getTruck);
                if($getTruck){
                    $totalTruckArray=count($getTruck->truck);
                //     $totalTruckArray=$getTruck->truck;
                //     $ids=array();
                // foreach( $totalTruckArray as $key=> $row)
                // {
                //     $ids[]=$row['_id'];
                // }
                // $ids=max($ids);
                // dd($ids);
                // $totalTruckArray=$ids+1;

                }else{
                    $totalTruckArray=0; 
                }
                if(isset($truckfile)){
                    $truckDoc=array($truckfile);
                }else{
                    $truckDoc=array();
                }
                // dd($request);
            $truckData[]=array(    
                    '_id' => $totalTruckArray,
                    'counter' => 0,
                    'truckNumber' => $request->truck_number,
                    'truckType' => $request->trucktype,
                    'licensePlate' => $request->license_plate,
                    'plateExpiry' => strtotime($request->plate_expiry),
                    'inspectionExpiry' =>strtotime($request->inspection),
                    'status' => $request->status,
                    'ownership' => $request->ownership,
                    'mileage' => $request->mileage,
                    'axies' => $request->axies,
                    'year' => $request->year,
                    'fuelType' => $request->fuel_type,
                    'startDate' => strtotime($request->start_date),
                    'deactivationDate' => strtotime($request->deactivation),
                    'ifta' => $request->ifta,
                    'registeredState' => $request->RegisteredState,
                    'insurancePolicy' => $request->Insurance_Policy,
                    'grossWeight' => $request->gross,
                    'vin' => $request->vin,
                    'dotexpiryDate' => strtotime($request->dot),
                    'transponder' => $request->transponder,
                    'internalNotes' => $request->internal_note,
                    'trucDoc' => $truckDoc,
                    'insertedTime' => time(),
                    'insertedUserId' =>Auth::user()->_id,
                    'edit_by' =>Auth::user()->userName,
                    'edit_time' =>'',
                    'deleteStatus' => "NO",
                    'deleteUser' => "",
                    'deleteTime' => "",
                        
                );
                if($getTruck){
                    $truckArray=$getTruck->truck;
                    Truckadd::where(['companyID' =>$companyID ])->update([
                        'counter'=> $totalTruckArray+1,
                        'truck' =>array_merge($truckArray,$truckData) ,
                    ]);

                    $data = [
                        'success' => true,
                        'message'=> 'Truck added successfully'
                    ] ;
                    
                    return response()->json($data);
                }else{
                    if(Truckadd::create([
                        '_id' => new ObjectId(),
                        'companyID' => $companyID,
                        'counter' => $totalTruckArray+1,
                        'truck' => $truckData,
                    ])) {
                        $data = [
                            'success' => true,
                            'message'=> 'Truck added successfully'
                            ] ;
                            return response()->json($data);
                    }
                }
        } 
        catch(\Exception $error){
            return $error->getMessage();
        }
    




       
    }

    public function edit_truck(Request $request)
    {
        $id=(int)$request->id;
        $companyID=(int)Auth::user()->companyID;
        $cursor = Truckadd::raw()->findOne(['companyID' => $companyID,'truck._id' => $id]);
        // dd($cursor);
        $truckArray=$cursor->truck;
        $truckLength=count($truckArray);
        $l=0;
        $m=0;
        for($l=0; $l<$truckLength; $l++)
        {
            $ids=$cursor->truck[$l]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $m=$l;
                }
            }
        }   
        $truck=(array)$cursor->truck[$m];
        // dd($truck);
        return response()->json($truck, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
        // dd($id);
        // $truckData=Truckadd::where("companyID",$companyID)->first();
        // $truckArray=$truckData->truck;
        // $truckLenght=count($truckArray);
        // $i=0;
        // $v=0;
        // for($i=0; $i<$truckLenght; $i++)
        // {
        //     $ids=$truckData->truck[$i]['_id'];
        //     $ids=(array)$ids;
        //     foreach($ids as $value)
        //     {
        //         if($value == $id)
        //         {
        //             $v= $i;
        //         }
        //     }
        // }
        // $truckData= $truckData->$truckArray[$v];
        // dd($truckData);
        // return response()->json($truckData); 
    }
    public function update_truck(Request $request)
    {
        request()->validate([
        ]);  
        $path = public_path().'/TruckFile';        
        if(!File::exists($path)) {
           
          File::makeDirectory($path, $mode = 0777, true, true);
          }
          $privilege=Auth::user()->privilege;
          try{
              if ($files = $request->file('file')) {
                  foreach ($request->file('file') as $file) {
                      $name =  time().rand(0,1000).$file->getClientOriginalName();
                      $filePath=$file->move(public_path().'/TruckFile/', $name);
                      $data[] = $name;
                      $size = File::size($filePath);
                      
                      $truckfile[]=array(
                          '_id' => 0,
                          'mainid' =>'' ,
                          'status' => 'truckadd',
                          'filename' =>$name ,
                          'originalname' => $file->getClientOriginalName(),
                          'filesize' =>$size ,
                          'targetfilepath' => "TruckFile/".$name,
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
        $companyID=(int)Auth::user()->companyID;
        $id=$request->id;
        $truckData=Truckadd::where('companyID',$companyID)->first();
        $truckArray=$truckData->truck;
        $arrayLength=count($truckArray);
        $getTruck = Truckadd::where('companyID',$companyID)->first();
        if($getTruck){
            $totaltruckArray=count($getTruck->truck);
        }else{
            $totaltruckArray=0; 
        }
        if(isset($truckfile)){
            $truckDoc=array($truckfile);
        }else{
            $truckDoc=array();
        }
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLength; $i++){
            $ids=$truckData->truck[$i];
                foreach ($ids as $value){
                    if($value==$id){
                        $v=$i;
                     }
                }
       }
       $truckArray[$v]['truckNumber'] = $request->truckNumber;
       $truckArray[$v]['truckType'] = $request->truckType;
       $truckArray[$v]['licenseType'] = $request->licenseType;
       $truckArray[$v]['plateExpiry'] = strtotime($request->plateExpiry);
       $truckArray[$v]['inspectionExpiry'] = strtotime($request->inspectionExpiry);
       $truckArray[$v]['status'] = $request->status;
       $truckArray[$v]['ownership'] = $request->ownership;
       $truckArray[$v]['mileage'] = $request->mileage;
       $truckArray[$v]['axies'] = $request->axies;
       $truckArray[$v]['year'] = $request->year;
       $truckArray[$v]['fuelType'] = $request->fuelType;
       $truckArray[$v]['startDate'] = strtotime($request->startDate);
       $truckArray[$v]['deactivationDate'] = strtotime($request->deactivationDate);
       $truckArray[$v]['registeredState'] = $request->registeredState;
       $truckArray[$v]['insurancePolicy'] = $request->insurancePolicy;
       $truckArray[$v]['grossWeight'] = $request->grossWeight;
       $truckArray[$v]['vin'] = $request->vin;
       $truckArray[$v]['dotexpiryDate'] = strtotime($request->dotexpiryDate);
       $truckArray[$v]['transponder'] = $request->transponder;
       $truckArray[$v]['ifta'] = $request->ifta;
       $truckArray[$v]['internalNotes'] = $request->internalNotes;
        $truckArray[$v]['trucDoc'] = $truckDoc;                   
       $truckArray[$v]['insertedTime'] = time();
       $truckArray[$v]['insertedUserId'] =Auth::user()->_id;
       $truckArray[$v]['deleteStatus'] = "NO";
       $truckArray[$v]['edit_by'] =Auth::user()->userName;
       $truckArray[$v]['edit_time'] ='';
       $truckArray[$v]['deleteTime'] ='';
       $truckArray[$v]['deleteUser'] ='';
        $truckData->truck= $truckArray;
      
       if($truckData->save())
       {
        $arr = array('status' => 'success', 'message' => 'Truck updated successfully.','statusCode' => 200); 
        return json_encode($arr);
       }
    }
    public function delete_truck(Request $request)
    {
        $id=(int)$request->id;
        $masterId=(int)$request->companyID;
        $companyID=(int)Auth::user()->companyID;
        $truck=Truckadd::raw()->updateOne(['companyID' => $companyID,'_id' => $masterId,'truck._id' =>  $id], 
        ['$set' => ['truck.$.deleteStatus' => 'YES','truck.$.deleteUser' => Auth::user()->userName,'truck.$.deleteTime' => time()]]
        );
        if($truck==true)
        {
            $arr = array('status' => 'success', 'message' => 'truck deleted successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
    
    }
    public function restore_truck(Request $request)
    {
        $truck_get_ids=$request->all_ids;
        $custID=(array)$request->custID;
        $companyID=(int)Auth::user()->companyID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $masterId=(int)$company_id;
            $truck_get_ids= str_replace( array('[', ']'), ' ', $truck_get_ids);
            if(is_string($truck_get_ids))
            {
                $truck_get_ids=explode(",",$truck_get_ids);
            }
            // dd((int)$truck_get_ids);
            foreach($truck_get_ids as $r)
            {
                $r=str_replace( array( '\'', '"',
                ',' , ' " " ', '[', ']' ), ' ', $r);
                $r = preg_replace('/\s+/', ' ', $r);
                $Truckadd=Truckadd::raw()->updateOne(['companyID' =>$companyID,'_id' => $masterId,'truck._id' => (int)$r], 
                ['$set' => ['truck.$.deleteStatus' => 'NO','truck.$.deleteUser' => Auth::user()->userName,'truck.$.deleteTime' => time()]]
                ); 
            }
           
        }
        if($Truckadd==true)
        {
            $arr = array('status' => 'success', 'message' => 'Truck Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
       
    }
    public function create_truckType(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $getTruck = Truck_type::where('companyID',$companyID)->get();
         $totalTruckArray=array();
         foreach($getTruck as $row)
         {
            if($row){
                $totalTruckArray=count($row->truck);
            }else{
                $totalTruckArray=0; 
            }
            $trackData[]=array(    
                '_id' => $totalTruckArray,
                'counter' => 2,
                'truckType' => $request->truckType,
                'deleteStatus' => "NO",
                'deleteUser'=>"",
                    
            );
            $truckArray=$row->truck;
            if(Truck_type::where(['companyID' =>$companyID ])->update([
                'companyID' => $companyID,
                'counter' => $totalTruckArray+1,
                'truck' =>array_merge($truckArray,$trackData) , 
            ])) {
                $data = [
                    'success' => true,
                    'message'=> 'truck added successfully'
                    ] ;
            }
        }
        return response()->json($data);
    }


}
