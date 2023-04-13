<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Mail; 
use Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use PDF;
use MongoDB\BSON\ObjectId;
use Image;
use File;

class CompanyController extends Controller
{
    public function getCompanyData(Request $request){
        $company = Company::where('companyID',Auth::user()->companyID)->get();
        return response()->json($company);  
    }

    public function getlbcompanyData(Request $request){
        $company = Company::select('company.companyName','company._id','company.deleteStatus')->where('companyID',Auth::user()->companyID)->get();
        return response()->json(['company'=>$company], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function addCompanyData(Request $request){
        $path = public_path().'/CompanyLogo';
        if(!File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        // request()->validate([
        //     // 'companyName' => 'required',
        //     // 'telephoneNo' => 'required',
        //     // 'mailingAddress' => 'required|unique:company,company.mailingAddress',
        //     // 'companyID' => 'required|unique:company,companyID',
        //     // 'file' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        // ]);
        try{

        $company=Company::all();
        // $companyID=(int)$request->companyID;
        if ($files = $request->file('file')) {
            $ImageUpload = Image::make($files);
            $originalPath = 'CompanyLogo/';
            $ImageUpload->save($originalPath.time().$files->getClientOriginalName());
            $photo_path = 'CompanyLogo/'.time().$files->getClientOriginalName();
            $photo_name = time().$files->getClientOriginalName();
            $original_name = $files->getClientOriginalName();
            $size = $request->file("file")->getSize();
        }

        $getCompany = Company::where('companyID',1)->first();
        $companyData[]=array(    
                        '_id' => new ObjectId(),
                        'companyName' => $request->inputCompanyName4,
                        'shippingAddress' => $request->inputShippingAddress4,                        
                        'telephoneNo' => $request->inputTelephoneNo4,
                        'faxNo' => $request->inputFaxNo4,
                        'mcNo' => $request->inputMcNo4,
                        'usDotNo' => $request->inputUsDotNo4,
                        'mailingAddress' => $request->inputEmailAddress4,
                        'factoringCompany' => $request->customerBFactoringCompany,
                        'website' => $request->inputWebsite4,
                        'counter' => 0,
                        'file' => array(array(
                            'filename' => $photo_name,
                            'Originalname' => $original_name,
                            'filesize' => $size,
                            'filepath' => $photo_path
                        )
                        ),
                        // 'edit_by' => $request->edit_by,
                        // 'edit_time' => $request->edit_time,
                        'status' => "No",
                        'deleteStatus' => "NO",
                        'deleteTime' => "",
                        'deleteUser' => "",
                        'factoringParent' => $request->factoringParent,
            );

            if($getCompany){
                $companyArray=$getCompany->company;
                Company::where(['companyID' =>1 ])->update([
                    'company' =>array_merge($companyData,$companyArray) 
                ]);

                $data = [
                    'success' => true,
                    'message'=> 'Company added successfully'
                ] ;
                
                return response()->json($data);
            }else{
                if(Company::create([
                    '_id' => 10,
                    'companyID' => 1,
                    'counter' => 0,
                    'company' => $companyData,
                    // 'user_type' => "user",
                    'deleteStatus' => 0,
                    // 'mode' => 'day',
                    // 'otp' => '',
                    // 'emailVerificationStatus' => 1,
                    
                ])) {
                    $data = [
                        'success' => true,
                        'message'=> 'Company added successfully'
                        ] ;
                        return response()->json($data);
                }
            }
        } 
        catch(\Exception $error){
            return $error->getMessage();
        }
    }

    public function editCompanyData(Request $request){
        $companyID=(int)$request->com_id;
        // $companySubId=$request->companySubId;
        $email=$request->email;
        $result = Company::where('companyID',$companyID )->first();
        $companyArray=$result->company;

        $arrayLength=count($companyArray);
       // dd($arrayLength);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLength; $i++){
            $id=$result->company[$i];
                foreach ($id as $value){
                    if($value==$email){
                        $v=$i;
                     }
                }
       }
       
       $companyEditData=$result->company[$v];
       return response()->json($companyEditData);  
    }  
//add by Reena
    public function updateCompanyData(Request $request){

        request()->validate([
            'up_companyName' => 'required',
            'up_telephoneNo' => 'required',
            'up_mailingAddress' => 'required|unique:company,company.mailingAddress'.$request->up_mailingAddress,
            'file' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        // $companyIDUp=(int)$request->companyID;
        $email=$request->up_mailingAddress;

        $resultUp = Company::where('companyID',1 )->first();
        $companyArrayUp=$resultUp->company;

        $arrayLengthUp=count($companyArrayUp);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLengthUp; $i++){
            $id=$resultUp->company[$i];
                foreach ($id as $value){
                    if($value==$email){
                        $v=$i;
                     }
                }
       }

        $photo_name='';
        $original_name='';
        $size='';
        $photo_path='';

        if($request->filenew != null){
            if ($request->hasFile('filenew') && $request->file('filenew') != '') {
                if(!empty($companyArrayUp[$v]['file'][0]['filename'])){
                    $imagePath = public_path('CompanyLogo/'.$companyArrayUp[$v]['file'][0]['filename']);
                    if(File::exists($imagePath)){
                        unlink($imagePath);
                    }
                }
                $files = $request->file('filenew');
                $ImageUpload = Image::make($files);
                $originalPath = 'CompanyLogo/';
                $ImageUpload->save($originalPath.time().$files->getClientOriginalName());
                $photo_path = 'CompanyLogo/'.time().$files->getClientOriginalName();
                $photo_name = time().$files->getClientOriginalName();
                $original_name = $files->getClientOriginalName();
                $size = $request->file("filenew")->getSize();
            }
        }else{
            $photo_name=$companyArrayUp[$v]['file'][0]['filename'];
            $original_name=$companyArrayUp[$v]['file'][0]['Originalname'];
            $size=$companyArrayUp[$v]['file'][0]['filesize'];
            $photo_path=$companyArrayUp[$v]['file'][0]['filepath'];
        }

       $companyArrayUp[$v]['companyName']=$request->up_companyName;
       $companyArrayUp[$v]['shippingAddress']=$request->up_shippingAddress;
       $companyArrayUp[$v]['telephoneNo']=$request->up_telephoneNo;
       $companyArrayUp[$v]['faxNo']=$request->up_faxNo;
       $companyArrayUp[$v]['mcNo']=$request->up_mcNo;
       $companyArrayUp[$v]['usDotNo']=$request->up_usDotNo;
       $companyArrayUp[$v]['mailingAddress']=$request->up_mailingAddress;
       $companyArrayUp[$v]['website']=$request->up_website;
       $companyArrayUp[$v]['factoringCompany']=$request->customerBFactoringCompany2;
       $companyArrayUp[$v]['file'][0]['filename']=$photo_name;
       $companyArrayUp[$v]['file'][0]['Originalname']=$original_name;
       $companyArrayUp[$v]['file'][0]['filesize']=$size;
       $companyArrayUp[$v]['file'][0]['filepath']=$photo_path;

       $resultUp->company = $companyArrayUp;
       if($resultUp->save()){
            $arr = array('status' => 'success', 'message' => 'Company edited successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
    }

    public function deleteCompany(Request $request){
        $companyID=(int)$request->com_id;
        $email=$request->email;
        
        $result = Company::where('companyID',$companyID )->first();
        $companyArray=$result->company;

        $arrayLength=count($companyArray);
        $i=0;
        $v=0;
        for ($i=0; $i<$arrayLength; $i++){
                $id=$result->company[$i];
            
                    foreach ($id as $value){
                        if($value==$email){
                            $v=$i;
                        }
                    }
        }
   
       $companyArray[$v]['deleteStatus'] = "YES"; 
       $result->company = $companyArray;

       if ($result->save()) {
            $success = true;
            $message = "Company deleted successfully";
        } else {
            $success = false;
            $message = "Company not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
        
    }

    public function updateUserCompany(Request $request){
        $user = Auth::user();
        $user->companyID = $request->companyId;
        $user->save();
        $data = [
            'success' => true,
            'message'=> 'Company Updated Successfully'
            ] ;
            return response()->json($data);
    }

}
