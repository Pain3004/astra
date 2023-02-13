<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\Driver;
use App\Models\Employement;
use App\Models\User;
use App\Models\ContractDetail;
use App\Models\PasswordReset;
use App\Models\Owner_operator_driver;
use Mail; 
use Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Twilio\Rest\Client;
use Exception;
use PDF;
use MongoDB\BSON\ObjectId;
use App\Models\Truckadd;


class DriverController extends Controller
{
//add by Reena

    public function updateOwnerOparator(Request $request){
      // dd($request->all());
        $companyID=1;

        $getOwner_operator_driver = Owner_operator_driver::where('companyID',$companyID)->first();
        $OwnerArray=$getOwner_operator_driver->ownerOperator;
        $arrayLength=count($OwnerArray);

        $i=0;
        $v=0;
        for ($i=0; $i<$arrayLength; $i++){
            $id=$getOwner_operator_driver->ownerOperator[$i];
                if($id['_id']== $request->ownerId){
                    $v=$i;
                }
        }

        $unserializeData = [];
        
        parse_str($request->data,$unserializeData);
        //dd($unserializeData['installmentCategory']);
        if(isset($unserializeData['up_installmentCategory'])){
            foreach($unserializeData['up_installmentCategory'] as $key => $val){
            
                $up_i_cate=$unserializeData['up_installmentCategory'][$key];
                $up_i_type=$unserializeData['up_installmentType'][$key];
                $up_amount=$unserializeData['up_amount'][$key];
                $up_installment=$unserializeData['up_installment'][$key];
                $up_startNo=$unserializeData['up_startNo'][$key];
                $up_startDate=$unserializeData['up_startDate'][$key];
                $up_internalNote=$unserializeData['up_internalNote'][$key]; 
    
                $updateinstallmentarray[]=((object)[
                    '_id'=>$key,
                    'installmentCategory'=>$up_i_cate,
                    'installmentType'=>$up_i_type,
                    'amount'=>$up_amount,
                    'installment'=>$up_installment,
                    'startNo'=>$up_startNo,
                    'startDate'=>$up_startDate,
                    'internalNote'=>$up_internalNote,
                ]);        
            }
        }else{
            $updateinstallmentarray=array();
        }
        
        //dd(isset($unserializeData['installmentCategory']));
        if(isset($unserializeData['installmentCategory'])){
            foreach($unserializeData['installmentCategory'] as $key => $val){
            
                $up_i_cate=$unserializeData['installmentCategory'][$key];
                $up_i_type=$unserializeData['installmentType'][$key];
                $up_amount=$unserializeData['amount'][$key];
                $up_installment=$unserializeData['installment'][$key];
                $up_startNo=$unserializeData['startNo'][$key];
                $up_startDate=$unserializeData['startDate'][$key];
                $up_internalNote=$unserializeData['internalNote'][$key]; 
    
                $newInstallmentarray[]=((object)[
                    '_id'=>$key,
                    'installmentCategory'=>$up_i_cate,
                    'installmentType'=>$up_i_type,
                    'amount'=>$up_amount,
                    'installment'=>$up_installment,
                    'startNo'=>$up_startNo,
                    'startDate'=>$up_startDate,
                    'internalNote'=>$up_internalNote,
                ]);        
            } 
        }

        //dd($updateinstallmentarray);
        $OwnerArray[$v]['driverId'] = $request->driverId;
        // $OwnerArray[$v]['percentage'] = $unserializeData['up_ownerPercentage'];
        $OwnerArray[$v]['percentage'] = $unserializeData['percentage'];
        $OwnerArray[$v]['truckNo'] = $unserializeData['truckNo'];
        $OwnerArray[$v]['installment'] = $updateinstallmentarray;

        if(isset($unserializeData['installmentCategory'])){
            $OwnerArray[$v]['installment'] =array_merge($updateinstallmentarray,$newInstallmentarray);
        }else{
            $OwnerArray[$v]['installment'] = $updateinstallmentarray;
        }
       
        $getOwner_operator_driver->ownerOperator = $OwnerArray;
        if($getOwner_operator_driver->save()){
                $arr = array('status' => 'success', 'message' => 'Owner Operator edited successfully.','statusCode' => 200); 
                return json_encode($arr);
        } 
       
    }


    public function getViewDriverApplication(Request $request){
        $companyID=1;
        $employement = Employement::where('companyID',$companyID)->first();
       
        //dd($employement);
        return response()->json($employement);  
    }

    public function driver_getTruck(){
        $companyID=1;
        $truckadd = Truckadd::where('companyID',$companyID)->first();
       
        //dd($truckadd);
        return response()->json($truckadd);  
    }

    public function addOwnerOparator(Request $request){
        // request()->validate([
        //     'percentage' => 'required',
        //     'truckNo' => 'required',
        // ]);

        $companyID=1;
        $getCompanyForDriver = Driver::where('companyID',$companyID)->first();
        // $result = Driver::where('companyID',$companyID )->first();
        $driverArray=$getCompanyForDriver->driver;

        $arrayLength=count($driverArray);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLength; $i++){
            $id=$getCompanyForDriver->driver[$i];
                if($id['_id']== $request->driverId){
                    $v=$i;
                }
       }
       
        //    $driverEditData=$getCompanyForDriver->driver[$v];
        // dd($driverEditData);
        $driverArray[$v]['ownerOperatorStatus'] = 'YES';

        $getCompanyForDriver->driver = $driverArray;
        $getCompanyForDriver->save();
    
            $getCompany = Owner_operator_driver::where('companyID',$companyID)->first();

            if($getCompany){
                $ownerOperatorArrayLength=count($getCompany->ownerOperator);
            }else{
                $ownerOperatorArrayLength=0;
            }
            
            $unserializeData = [];
            parse_str($request->data,$unserializeData);

            if(isset($unserializeData['installmentCategory'])){
                foreach($unserializeData['installmentCategory'] as $key => $val){
                
                    $i_cate=$unserializeData['installmentCategory'][$key];
                    $i_type=$unserializeData['installmentType'][$key];
                    $amount=$unserializeData['amount'][$key];
                    $installment=$unserializeData['installment'][$key];
                    $startNo=$unserializeData['startNo'][$key];
                    $startDate=$unserializeData['startDate'][$key];
                    $internalNote=$unserializeData['internalNote'][$key]; 
        
                    $array[]=((object)[
                        '_id'=>$key,
                        'installmentCategory'=>$i_cate,
                        'installmentType'=>$i_type,
                        'amount'=>$amount,
                        'installment'=>$installment,
                        'startNo'=>$startNo,
                        'startDate'=>$startDate,
                        'internalNote'=>$internalNote,
                    ]);        
                }
            }else{
                $array=array();
            }
            
            $truckno='';
            $truckno=$unserializeData['truckNo'];
            $truckID= explode("-", $truckno);
                // $truckID[0]; // piece1.
            // echo $truckID[1]; // piece2.
                try{
                    $ownerOperatorData[]=array(    
                        '_id' => $ownerOperatorArrayLength,
                        'driverId' => $request->driverId,
                        'percentage' => $unserializeData['percentage'],
                        'truckNo' => $truckID[0],
                        'installment' =>$array ,
                        'deleteStatus' => 'NO',
                    );

                    if($getCompany){
                        $ownerOperatorArray=$getCompany->ownerOperator;
                        Owner_operator_driver::where(['companyID' =>$companyID ])->update([
                            'ownerOperator' =>array_merge($ownerOperatorData,$ownerOperatorArray) ,
                        
                        ]);
            
                        $data = [
                            'success' => true,
                            'message'=> 'ownerOperator added successfully'
                        ] ;
                        
                        return response()->json($data);
                    }else{
                        Owner_operator_driver::create([
                            
                            // 'companyID' => (int)$_SESSION['companyId'],
                            '_id' => 1,
                            'companyID' => $companyID,
                            'counter' => 0,
                            'ownerOperator' => $ownerOperatorData,
                        ]);
                    }
                } 
                    catch(\Exception $error){
                    return $error->getMessage();
                }
        // }

        $data = [
            'success' => true,
            'message'=> 'Driver Owner added successfully'
            ] ;
            return response()->json($data);


    }

    public function editDriverOwnerData(Request $request){  
        //dd($request);    
        $companyID=(int)1;
        $ownerOperatorID=(int)$request->id;

        $result = Owner_operator_driver::where('companyID',$companyID )->first();
        //dd($result);
        $ownerOperatorArray=$result->ownerOperator;
        $arrayLength=count($ownerOperatorArray);
        $i=0;
        $v=0;
       
        for ($i=0; $i<$arrayLength; $i++){
            $id=$result->ownerOperator[$i];
            if($id['driverId']== $ownerOperatorID){                
                $v=$i; 
            }
        }
       
        $EditownerOperatorData=$result->ownerOperator[$v];
        //dd($EditownerOperatorData);
        $resultDriver = Driver::where('companyID',$companyID )->first();
        $arrayLengthDriver=count($resultDriver->driver);
        $j=0;
        $k=0;
        $driver_id=0;

        $opratorDriverId=$EditownerOperatorData['driverId'];
        for ($j=0; $j<$arrayLengthDriver; $j++){
            $driver_id=$resultDriver->driver[$j]['_id'];
            //$id=$result->ownerOperator[$j];
            if($opratorDriverId == $driver_id){                
                $k=$j; 
                break;
            }
        }
        $driverData=$resultDriver->driver[$k];
        
        $driverName=$driverData['driverName'];

         $newArr = [
            $EditownerOperatorData,
            $driverName,
          ];

        return response()->json($newArr);
    }  

    public function getDriverData(Request $request){
        $companyID=(int)1;
        $driver = Driver::where('companyID',$companyID )->first();
        return response()->json($driver);  
    }
    
//add by Reena
    public function addDriverData(Request $request){

        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:driver,driver.driverEmail',
            'telephone' => 'required',
            'address' => 'required',
            'password' => 'required',
            'location' => 'required',
            'zip' => 'required',
            'licenseNo' => 'required',
            'licenseIssueState' => 'required',
            'licenseExpDate' => 'required',
            'rate' => 'required',
            'companyID' => 'required|unique:driver,companyID',
        ]);
        //add recurrence
        $unserializeData = [];
            parse_str($request->data,$unserializeData);

            if(isset($unserializeData['rec_PlusRecurrence'])){
                foreach($unserializeData['rec_PlusRecurrence'] as $key => $val){
                
                    $i_cate=$unserializeData['rec_PlusRecurrence'][$key];
                    $i_type=$unserializeData['rec_installmentType'][$key];
                    $amount=$unserializeData['rec_amount'][$key];
                    $installment=$unserializeData['rec_installment'][$key];
                    $startNo=$unserializeData['rec_startNo'][$key];
                    $startDate=$unserializeData['rec_startDate'][$key];
                    $internalNote=$unserializeData['rec_internalNote'][$key]; 
        
                    $recurrenceAdd[]=((object)[
                        '_id'=>$key,
                        'installmentCategoryStore'=>$i_cate,
                        'installmentTypeStore'=>$i_type,
                        'amountStore'=>$amount,
                        'currentoStore'=>$startNo,
                        'installmentStore'=>$installment,
                        'startNoStore'=>$startNo,
                        'startDateStore'=>strtotime($startDate),
                        'currentDateStore'=>strtotime(date('Y-m-d H:i:s')),
                        'internalNoteStore'=>$internalNote,
                    ]);        
                }
            }else{
                $recurrenceAdd=array();
            }
        //subtract recurrence
        $unserializeData1 = [];
            parse_str($request->data1,$unserializeData1);

            if(isset($unserializeData1['rec_PlusRecurrence_sub'])){
                foreach($unserializeData1['rec_PlusRecurrence_sub'] as $key => $val){
                
                    $i_cate_sub=$unserializeData1['rec_PlusRecurrence_sub'][$key];
                    $i_type_sub=$unserializeData1['rec_installmentType_sub'][$key];
                    $amount_sub=$unserializeData1['rec_amount_sub'][$key];
                    $installment_sub=$unserializeData1['rec_installment_sub'][$key];
                    $startNo_sub=$unserializeData1['rec_startNo_sub'][$key];
                    $startDate_sub=$unserializeData1['rec_startDate_sub'][$key];
                    $internalNote_sub=$unserializeData1['rec_internalNote_sub'][$key]; 
        
                    $recurrenceSubtract[]=((object)[
                        '_id'=>$key,
                        'installmentCategoryStore'=>$i_cate_sub,
                        'installmentTypeStore'=>$i_type_sub,
                        'amountStore'=>$amount_sub,
                        'installmentStore'=>$installment_sub,
                        'startNoStore'=>$startNo_sub,
                        'currentNoStore'=>$startNo_sub,
                        'startDateStore'=>strtotime($startDate_sub),
                        'currentDateStore'=>strtotime(date('Y-m-d H:i:s')),
                        'internalNoteStore'=>$internalNote_sub,
                    ]);        
                }
            }else{
                $recurrenceSubtract=array();
            }

        try{

            $driver=Driver::all();
            $companyID=(int)1;
           
            $getCompany = Driver::where('companyID',$companyID)->first();
            if($getCompany){
                $totalDriverArray=count($getCompany->driver);
            }else{
                $totalDriverArray=0; 
            }

        // for id
        $ArrayId=$getCompany->driver;
        
        foreach($ArrayId as $ArrayId){
            $ids[]=$ArrayId['_id'];
        }
       
        $max_id=max($ids);
        $new_id=$max_id+1;
        //end for id
        // dd($new_id);
            $password = sha1($request->password);
            $driverData[]=array(    
                            '_id' => $new_id,
                            'counter' => 3,
                            'ownerID' => '',
                            'driverName' => $request->name,
                            'driverUsername' => $request->username,
                            'driverAddress' => $request->address,
                            'driverTelephone' => $request->telephone,
                            'driverAlt' => $request->altTelephone,
                            'driverEmail' => $request->email,
                            'driverPassword' => $password,
                            'driverLocation' => $request->location,
                            'driverZip' => $request->zip,
                            'driverStatus' => $request->status,
                            'driverSocial' => $request->socialSecurityNo,
                            'dateOfbirth' => strtotime($request->dateOfBirth),
                            'dateOfHire' => strtotime($request->dateOfHire),
                            'driverLicenseNo' => $request->licenseNo,
                            'driverLicenseIssue' => $request->licenseIssueState,
                            'driverLicenseExp' => strtotime($request->licenseExpDate),
                            'driverLastMedical' => strtotime($request->lastMedical),
                            'driverNextMedical' => strtotime($request->nextMedical),
                            'driverLastDrugTest' => strtotime($request->lastDrugTest),
                            'driverNextDrugTest' => strtotime($request->nextDrugTest),
                            'passportExpiry' => strtotime($request->passportExpiry),
                            'fastCardExpiry' => strtotime($request->fastCardExpiry),
                            'hazmatExpiry' => strtotime($request->hazmatExpiry),
                            'rate' => $request->rate,
                            'currency' => $request->currency,
                            'driverLoadedMile' => (int)$request->driverLoadedMile,
                            'driverEmptyMile' => (int)$request->driverEmptyMile,
                            'pickupRate' => (int)$request->pickupRate,
                            'pickupAfter' => (int)$request->pickupAfter,
                            'dropRate' => (int)$request->dropRate,
                            'dropAfter' => (int)$request->dropAfter,
                            'tarp' => (int)$request->tarp,
                            'percentage' => (int)$request->percentage,
                            'driverBalance' => $request->driverBalance,
                            'terminationDate' => strtotime($request->terminationDate),
                            'internalNote' => $request->internalNotes,
                            'recurrenceAdd' => $recurrenceAdd,
                            'recurrenceSubtract' => $recurrenceSubtract,
                                // 'driverDoc' => (Array)array(
                                //     )
                            'userLocation' => Auth::user()->userLocation,
                            'userTelephone' => Auth::user()->userTelephone,
                            'insertedTime' => strtotime(date('Y-m-d H:i:s')),
                            'insertedUserId' => Auth::user()->_id,
                            'deleteStatus' => "NO",
                            'deleteUser' => Auth::user()->userFirstName,
                            'deleteTime' => '',
                            'LastUpdateId' => Auth::user()->_id,
                            'ownerOperatorStatus' => 'NO' ,
                            'ownerOperatorDeleteStatus' => "NO",
            );
                if($getCompany){
                    $driverArray=$getCompany->driver;
                    Driver::where(['companyID' =>$companyID ])->update([
                        'counter'=> $totalDriverArray+1,
                        'driver' =>array_merge($driverArray,$driverData) ,
                        // 'user_type' => "user",
                        // 'deleteStatus' => 0,
                        // 'mode' => 'day',
                        // 'otp' => '',
                        // 'emailVerificationStatus' => 1,
                    ]);

                    $data = [
                        'success' => true,
                        'message'=> 'Driver added successfully'
                    ] ;
                    
                    return response()->json($data);
                }else{
                    if(Driver::create([
                        
                        // 'companyID' => (int)$_SESSION['companyId'],
                        '_id' => '',
                        'companyID' => $companyID,
                        'counter' => $totalDriverArray+1,
                        'driver' => $driverData,
                        // 'user_type' => "user",
                        'deleteStatus' => 0,
                        // 'mode' => 'day',
                        // 'otp' => '',
                        // 'emailVerificationStatus' => 1,
                        
                    ])) {
                        $data = [
                            'success' => true,
                            'message'=> 'Driver added successfully'
                            ] ;
                            return response()->json($data);
                    }
                }
        } 
        catch(\Exception $error){
            return $error->getMessage();
        }
    }
//add by Reena
    public function addApplicationFormData(Request $request){
       //dd($request);
       $companyIDForDriver=(int)$request->companyid;
       $totalDriverArray=0;
       $getCompanyForDriver = Employement::where('companyID',$companyIDForDriver)->first();

       if($getCompanyForDriver){
           $DriverArray=$getCompanyForDriver->application;
           $totalDriverArray=count($DriverArray)+ 1;
       }
 
       $applicant_info = ((object)[
            'applicant_name' => $request->applicant_name,
            'date_of_application' =>$request->date_of_application,
            'date_of_birth' =>$request->date_of_birth,
            'social_security' =>$request->social_security,
            'license_no' =>$request->license_no,
            'license_state' =>$request->licence_state,
            'license_ex_date' =>$request->licence_ex_date,
            // 'license_type' =>"",
            'telephone' =>$request->TelephoneApplicant,
            'email' =>$request->EmailApplicant,
            'fax' =>$request->FaxApplicant,
            'licence_type' =>$request->licence_type,
            'license_suspended' =>$request->licence_suspend,
            'license_denied' =>$request->licence_denied,
            'address' =>$request->Address_applicant,
            'city_state_zip' =>$request->CityStateZip_applicant,
            'resident_time' =>$request->resident_time,
            'legal_right' =>$request->legal_right,
            'legal_proof' =>$request->leage_proof
        ]);

        //emergency_contact
       $emergency_contact=((object)[
                'emergency_contact_name' =>$request->emergency_contact_name,
                'emergency_contact_relation' =>$request->emergency_contact_relation,
                'emergency_contact_address' =>$request->emergency_contact_Address,
                'emergency_contact_phone_no' =>$request->emergency_contact_Number,
        ]);

        $employment_info=((object)[
                'compnay_employee' =>$request->company_employee,
                'company_employee_from' =>$request->company_employee_from,
                'company_employee_to' =>$request->company_employee_to,
                'company_employee_leave_reason' =>$request->company_employee_leave_reason,
                'employment_status' =>$request->employment_status,
                'last_employee' =>$request->last_employee,
                'bond_status' =>$request->bond_status,
                'bond_company_name' =>$request->bond_company_name,
                'felony_status' =>$request->felony_status,
                'felony_reason' =>$request->felony_reason,
                'Conviction_status' =>$request->Conviction_status,
                'Conviction_reason' =>$request->Conviction_reason,
        ]);
        //education_info
        $education_info=((object)[
                'school_grade' =>$request->school_grade,
                'last_school' =>$request->last_school,
                'school_city_state' =>$request->school_city_state,
        ]);
        //w9form
        $w9form[]=array(
                'individuals' =>'',
                'ccorp' =>'',
                'scorp' =>'',
                'partnership' =>'',
                'trust' =>'',
                'llc' =>'',
                'other' =>'',
                'tax' =>'',
                'other_txt' =>'',
        );
        //files       
        $files[]=array(
                'files' => 'no',
                'files2' => 'no',
        );
        //employee_record
        $emp_record=((object)[
                'employer' =>$request->Employer1,
                'employer_from' =>$request->EmployedFrom1,
                'employer_to' =>$request->EmployedTo1,
                'employer_street' =>$request->EmployerStreet1,
                'employer_city_state_zip' =>$request->EmployerCityStateZip1,
                'employer_phone' =>$request->EmployerPhone1,
                'employer_supervisor' =>$request->EmployerSupervisor1,
                'employer_position' =>$request->EmployerPosition1 ,
                'employer_leaving_reason' =>$request->EmployerReasonforLeaving1 ,
                'employer_email' =>$request->EmployerEmail1 ,
                'fmcsrs_status' =>$request->fmcsrs_status1,
                'drug_alcohol_test' =>$request->drug_alcohol_test1,
        ]);
        $emp_record1=((object)[
                'employer1' =>$request->Employer2,
                'employer_from1' =>$request->EmployedFrom2,
                'employer_to1' =>$request->EmployedTo2,
                'employer_street1' =>$request->EmployerStreet2,
                'employer_city_state_zip1' =>$request->EmployerCityStateZip2,
                'employer_phone1' =>$request->EmployerPhone2,
                'employer_supervisor1' =>$request->EmployerSupervisor2,
                'employer_position1' =>$request->EmployerPosition2,
                'employer_leaving_reason1' =>$request->EmployerReasonforLeaving2,
                'employer_email1' =>$request->EmployerEmail2,
                'fmcsrs_status1' =>$request->fmcsrs_status2,
                'drug_alcohol_test1' =>$request->drug_alcohol_test2,
        ]);
        $emp_record2=((object)[
                'employer2' =>$request->Employer3,
                'employer_from2' =>$request->EmployedFrom3,
                'employer_to2' =>$request->EmployedTo3,
                'employer_street2' =>$request->EmployerStreet3,
                'employer_city_state_zip2' =>$request->EmployerCityStateZip3,
                'employer_phone2' =>$request->EmployerPhone3,
                'employer_supervisor2' =>$request->EmployerSupervisor3,
                'employer_position2' =>$request->EmployerPosition3,
                'employer_leaving_reason2' =>$request->EmployerReasonforLeaving3,
                'employer_email2' =>$request->EmployerEmail3,
                'fmcsrs_status2' =>$request->fmcsrs_status3,
                'drug_alcohol_test2' =>$request->drug_alcohol_test3,
        ]);
        $emp_record3=((object)[
                'employer3' =>$request->Employer4,
                'employer_from3' =>$request->EmployedFrom4,
                'employer_to3' =>$request->EmployedTo4,
                'employer_street3' =>$request->EmployerStreet4,
                'employer_city_state_zip3' =>$request->EmployerCityStateZip4,
                'employer_phone3' =>$request->EmployerPhone4,
                'employer_supervisor3' =>$request->EmployerSupervisor4,
                'employer_position3' =>$request->EmployerPosition4,
                'employer_leaving_reason3' =>$request->EmployerReasonforLeaving4,
                'employer_email3' =>$request->EmployerEmail4,
                'fmcsrs_status3' =>$request->fmcsrs_status4,
                'drug_alcohol_test3' =>$request->drug_alcohol_test4,
        ]);

        $employee_record=((object)[
                'emp_record' =>$emp_record,
                'emp1_record' =>$emp_record1,
                'emp2_record' =>$emp_record2,
                'emp3_record' =>$emp_record3,
        ]);
        //employee_status
        $emp_status=((object)[
                'emp_from' =>$request->emp_from,
                'emp_to' =>$request->emp_to,
                'emp_reason' =>$request->emp_reason,
                'employee_company' =>$request->employee_company,
                'criminal_act_involving' =>$request->criminal_act_involving,
        ]);
        $emp1_status=((object)[
                'emp_from1' =>$request->emp_from1,
                'emp_to1' =>$request->emp_to1,
                'emp_reason1' =>$request->emp_reason1,
                'employee_company1' =>$request->employee_company1,
                'criminal_act_involving1' =>$request->criminal_act_involving1,
        ]);
        $emp2_status=((object)[
                'emp_from2' =>$request->emp_from2,
                'emp_to2' =>$request->emp_to2,
                'emp_reason2' =>$request->emp_reason2,
                'employee_company2' =>$request->employee_company2,
                'criminal_act_involving2' =>$request->criminal_act_involving2,
        ]);
        $employee_status=((object)[
                'emp_status' =>$emp_status,
                'emp1_status' =>$emp1_status,
                'emp2_status' =>$emp2_status,
        ]);
        //employee_report
        $emp_report=((object)[
                'accident_date' =>$request->accident_date,
                'accident_description' =>$request->accident_description,
                'no_of_injuries' =>$request->no_of_injuries,
        ]);
        $emp1_report=((object)[
                'accident_date1' =>$request->accident_date1,
                'accident_description1' =>$request->accident_description1,
                'no_of_injuries1' =>$request->no_of_injuries1,
        ]);
        $emp2_report=((object)[
                'accident_date2' =>$request->accident_date2,
                'accident_description2' =>$request->accident_description2,
                'no_of_injuries2' =>$request->no_of_injuries2,
        ]);
        $employee_report=((object)[
                'emp_report' =>$emp_report,
                'emp1_report' =>$emp1_report,
                'emp2_report' =>$emp2_report,
        ]);
        //employee_traffic
        $emp_traffic=((object)[
            'traffic_convictions_date' =>$request->traffic_convictions_date,
            'traffic_convictions_location' =>$request->traffic_convictions_location,
            'traffic_convictions_charge' =>$request->traffic_convictions_charge,
            'traffic_convictions_penalty' =>$request->traffic_convictions_penalty,
        ]);
        $emp1_traffic=((object)[
            'traffic_convictions_date1' =>$request->traffic_convictions_date1,
            'traffic_convictions_location1' =>$request->traffic_convictions_location1,
            'traffic_convictions_charge1' =>$request->traffic_convictions_charge1,
            'traffic_convictions_penalty1' =>$request->traffic_convictions_penalty1,
        ]);
        $emp2_traffic=((object)[
            'traffic_convictions_date2' =>$request->traffic_convictions_date2,
            'traffic_convictions_location2' =>$request->traffic_convictions_location2,
            'traffic_convictions_charge2' =>$request->traffic_convictions_charge2,
            'traffic_convictions_penalty2' =>$request->traffic_convictions_penalty2,
        ]);
        $employee_traffic=((object)[
            'emp_traffic' =>$emp_traffic,
            'emp1_traffic' =>$emp1_traffic,
            'emp2_traffic' =>$emp2_traffic,
        ]);

        //equipments
        $straight_truck=((object)[
            'straight_truck_from' =>$request->straight_truck_from,
            'straight_truck_to' =>$request->straight_truck_to,
            'straight_truck_miles' =>$request->straight_truck_miles,
        ]);
        $tractor_semi=((object)[
            'tractor_semi_trailer_from' =>$request->tractor_semi_trailer_from,
            'tractor_semi_trailer_to' =>$request->tractor_semi_trailer_to,
            'tractor_semi_trailer_miles' =>$request->tractor_semi_trailer_miles,
        ]);
        $tractor_two=((object)[
            'tractor_two_trailer_from' =>$request->tractor_two_trailer_from,
            'tractor_two_trailer_to' =>$request->tractor_two_trailer_to,
            'tractor_two_trailer_miles' =>$request->tractor_two_trailer_miles,
        ]);
        $tractor_three=((object)[
            'tractor_three_trailer_from' =>$request->tractor_three_trailer_from,
            'tractor_three_trailer_to' =>$request->tractor_three_trailer_to,
            'tractor_three_trailer_miles' =>$request->tractor_three_trailer_miles,
        ]);
        $motor_one=((object)[
            'motorcoach_one_from' =>$request->motorcoach_one_from,
            'motorcoach_one_to' =>$request->motorcoach_one_to,
            'motorcoach_one_miles' =>$request->motorcoach_one_miles,
        ]);
        $motor_two=((object)[
            'motorcoach_two_from' =>$request->motorcoach_two_from,
            'motorcoach_two_to' =>$request->motorcoach_two_to,
            'motorcoach_two_miles' =>$request->motorcoach_two_miles,
        ]);
       
        $equipments=((object)[
            'straight_truck' =>$straight_truck,
            'tractor_semi' =>$tractor_semi,
            'tractor_two' =>$tractor_two,
            'tractor_three' =>$tractor_three,
            'motor_one' =>$motor_one,
            'motor_two' =>$motor_two,
        ]);
       
        //days
        $day1=((object)[
            'day_1_date' =>$request->day_1_date,
            'day_1_hours' =>$request->day_1_hours,
        ]);
        $day2=((object)[
            'day_2_date' =>$request->day_2_date,
            'day_2_hours' =>$request->day_2_hours,
        ]);
        $day3=((object)[
            'day_3_date' =>$request->day_3_date,
            'day_3_hours' =>$request->day_3_hours,
        ]);
        $day4=((object)[
            'day_4_date' =>$request->day_4_date,
            'day_4_hours' =>$request->day_4_hours,
        ]);
        $day5=((object)[
            'day_5_date' =>$request->day_5_date,
            'day_5_hours' =>$request->day_5_hours,
        ]);
        $day6=((object)[
            'day_6_date' =>$request->day_6_date,
            'day_6_hours' =>$request->day_6_hours,
        ]);
        $day7=((object)[
            'day_7_date' =>$request->day_7_date,
            'day_7_hours' =>$request->day_7_hours,
        ]);
        $days=((object)[
            'day1' =>$day1,
            'day2' =>$day2,
            'day3' =>$day3,
            'day4' =>$day4,
            'day5' =>$day5,
            'day6' =>$day6,
            'day7' =>$day7,
        ]);
        //signature
        $signature=((object)[
            'ip' => '',
            'country' => '',
            'city' => '',
            'os' => '',
            'browser' => '',
            'signtime' => '',
        ]);
        
    //driver application form array       
       $DriverData[]=array(    
                       '_id' => $totalDriverArray,
                       'applicant_info' => $applicant_info,
                       'emergency_contact' => $emergency_contact,
                       'employment_info' => $employment_info,
                       'education_info' => $education_info,
                       'w9form' => $w9form,
                       'files' => $files,
                       'employee_record' => $employee_record,
                       'employee_status' => $employee_status,
                       'employee_report' => $employee_report,
                       'employee_traffic' => $employee_traffic,
                       'equipments' => $equipments,
                       'driving_state' => $request->driving_state,
                       'certification_violations' => $request->certification_violations,
                       'days' => $days,
                       'refused_test' => $request->refused_test,
                       'tested_positive' => $request->tested_positive,
                       'userid' => $request->userid,
                       'username' => $request->username,
                       'pre_employment_drug' => $request->pre_employment_drug,
                       'password' => 'password',
                       'signature' => $signature,
                       );

           if($getCompanyForDriver){
               
            Employement::where(['companyID' =>$companyIDForDriver])->update([
                   'counter'=> $totalDriverArray,
                   'application' =>array_merge($DriverData,$DriverArray) ,
               ]);

               $arrDriver = array('status' => 'success', 'message' => 'Submit successfully.'); 
               return json_encode($arrDriver);
           }else{
               try{
                       if(Employement::create([
                           // 'companyID' => (int)$_SESSION['companyId'],
                           '_id' => 1,
                           'companyID' => $companyIDForDriver,
                           'counter' => 1,
                           'application' => $DriverData,
                       ])) {
                           $arrDriver = array('status' => 'success', 'message' => ' Submit successfully.'); 
                           return json_encode($arrDriver);
                       }
               }
               catch(\Exception $error){
                   return $error->getMessage();
               }
           }

    }
 //add by Reena edit driver
    public function editDriverData(Request $request){
       // dd($request);
        $companyID=(int)$request->com_id;
        // dd($companyID);

        $driverEmail=$request->email;
        $result = Driver::where('companyID',$companyID )->first();
        $driverArray=$result->driver;

        $arrayLength=count($driverArray);
       // dd($arrayLength);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLength; $i++){
            $id=$result->driver[$i];
                foreach ($id as $value){
                    
                    if($value==$driverEmail){
                        $v=$i;
                     }
                }
       }
       
       $driverEditData=$result->driver[$v];
    //    dd($driverEditData);
       return response()->json($driverEditData);  
    }  
//add by Reena
    public function updateDriverData(Request $request){

        request()->validate([
            'updateDriverName' => 'required',
            'updateDriverEmail' => 'required|unique:driver,driver.driverEmail'.$request->updateDriverEmail,
            'updateDriverUsername' => 'required',
            'updateDriverTelephone' => 'required',
            'updateDriverAddress' => 'required',
            'updateDriverLocation' => 'required',
            'updateDriverZip' => 'required',
            'updateDriverLicenseNo' => 'required',
            'updateDriverLicenseIssue' => 'required',
            'updateDriverLicenseExp' => 'required',
            'updateRate' => 'required',
            'updateCurrency' => 'required',
            // 'userTelephone' => 'required|min:11|max:11|numeric',
        ]);

        $companyIDUp=(int)$request->updateComId;
        $driverEmailUp=$request->updateDriverEmail;

        $resultUp = Driver::where('companyID',$companyIDUp )->first();
        $driverArrayUp=$resultUp->driver;

        $arrayLengthUp=count($driverArrayUp);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLengthUp; $i++){
            $id=$resultUp->driver[$i];
                foreach ($id as $value){
                    if($value==$driverEmailUp){
                        $v=$i;
                     }
                }
       }

       $driverArrayUp[$v]['driverName']=$request->updateDriverName;
       $driverArrayUp[$v]['driverUsername']=$request->updateDriverUsername;
       if(isset($request->updateDriverPassword)){
            $driverArrayUp[$v]['driverPassword']=sha1($request->updateDriverPassword);
        }else{
            $driverArrayUp[$v]['driverPassword']=$resultUp->driver[$v]['driverPassword'];
        }
       $driverArrayUp[$v]['driverTelephone']=$request->updateDriverTelephone;
       $driverArrayUp[$v]['driverAlt']=$request->updateDriverAlt;
       $driverArrayUp[$v]['driverEmail']=$request->updateDriverEmail;
       $driverArrayUp[$v]['driverAddress']=$request->updateDriverAddress;
       $driverArrayUp[$v]['driverLocation']=$request->updateDriverLocation;
       $driverArrayUp[$v]['driverZip']=$request->updateDriverZip;
       $driverArrayUp[$v]['driverStatus']=$request->updateDriverStatus;
       $driverArrayUp[$v]['driverSocial']=$request->updateDriverSocial;
       $driverArrayUp[$v]['dateOfbirth']=$request->updateDateOfbirth;
       $driverArrayUp[$v]['dateOfhire']=$request->updateDateOfHire;
       $driverArrayUp[$v]['driverLicenseNo']=$request->updateDriverLicenseNo;
       $driverArrayUp[$v]['driverLicenseIssue']=$request->updateDriverLicenseIssue;
       $driverArrayUp[$v]['driverLicenseExp']=$request->updateDriverLicenseExp;
       $driverArrayUp[$v]['driverLastMedical']=$request->updateDriverLastMedical;
       $driverArrayUp[$v]['driverNextMedical']=$request->updateDriverNextMedical;
       $driverArrayUp[$v]['driverLastDrugTest']=$request->updateDriverLastDrugTest;
       $driverArrayUp[$v]['driverNextDrugTest']=$request->updateDriverNextDrugTest;
       $driverArrayUp[$v]['passportExpiry']=$request->updatePassportExpiry;
       $driverArrayUp[$v]['fastCardExpiry']=$request->updateFastCardExpiry;
       $driverArrayUp[$v]['hazmatExpiry']=$request->updateHazmatExpiry;
       $driverArrayUp[$v]['rate']=$request->updateRate;
       $driverArrayUp[$v]['currency']=$request->updateCurrency;
       $driverArrayUp[$v]['driverBalance']=$request->updateDriverBalance;
       $driverArrayUp[$v]['terminationDate']=$request->updateTerminationDate;
       $driverArrayUp[$v]['internalNote']=$request->updateInternalNotes;
    //    $driverArrayUp[$v]['driverName']=$request->updateDriverName;
    //    $driverArrayUp[$v]['driverName']=$request->updateDriverName;
      $driverArrayUp[$v]['driverLoadedMile'] = (int)$request->driverLoadedMile;
      $driverArrayUp[$v]['driverEmptyMile'] = (int)$request->driverEmptyMile;
      $driverArrayUp[$v]['pickupRate'] = (int)$request->pickupRate;
      $driverArrayUp[$v]['pickupAfter'] = (int)$request->pickupAfter;
      $driverArrayUp[$v]['dropRate'] = (int)$request->dropRate;
      $driverArrayUp[$v]['dropAfter'] = (int)$request->dropAfter;
      $driverArrayUp[$v]['tarp'] = (int)$request->tarp;
      $driverArrayUp[$v]['percentage'] = (int)$request->percentage;

       $resultUp->driver = $driverArrayUp;
       if($resultUp->save()){
            $arr = array('status' => 'success', 'message' => 'User edited successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
    }
//add by Reena
    public function deleteDriver(Request $request){
        $companyID=(int)$request->com_id;
        $driverEmail=$request->email;
        
        $result = Driver::where('companyID',$companyID )->first();
        $driverArray=$result->driver;

        $arrayLength=count($driverArray);
        $i=0;
        $v=0;
        for ($i=0; $i<$arrayLength; $i++){
                $id=$result->driver[$i];
            
                    foreach ($id as $value){
                        if($value==$driverEmail){
                            $v=$i;
                        }
                    }
        }
   
       $driverArray[$v]['deleteStatus'] = "YES"; 
       $result->driver = $driverArray;

       if ($result->save()) {
            $success = true;
            $message = "Driver deleted successfully";
        } else {
            $success = false;
            $message = "Driver not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
        
    }  

    public function deleteViewDriverApp(Request $request){
        $companyID=(int)1;
        $driverId=$request->id;
        //dd($driverId);
        $result = Employement::where('companyID',$companyID )->first();
        $driverAppArray=$result->application;

        $arrayLength=count($driverAppArray);
        $i=0;
        $v=0;
        for ($i=0; $i<$arrayLength; $i++){
            $id=$result->application[$i]['_id'];
            
            if($id==$driverId){
                $v=$i;
            }
        }
        //dd($driverAppArray[$v]);
        $destroy=$driverAppArray[$v]->delete(); 

        //$destroy = destroy($driverAppArray[$v]);
        //    $result->driver = $driverArray;
        //dd($destroy);
       if ($result->save()) {
            $success = true;
            $message = "Driver deleted successfully";
        } else {
            $success = false;
            $message = "Driver not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
        
    } 
    public function deleteDriverOwnerOperator(Request $request){
       // dd($request->all());
        $companyID=(int)1;
        $driverID=$request->id;
        
        $result = Driver::where('companyID',$companyID )->first();
        $driverArray=$result->driver;

        $arrayLength=count($driverArray);
        $i=0;
        $v=0;
        for ($i=0; $i<$arrayLength; $i++){
            $id=$result->driver[$i]['_id'];
            if($id==$driverID){
               $v=$i;
            }
        }
       $driverArray[$v]['ownerOperatorStatus'] = "NO"; 
       $driverArray[$v]['ownerOperatorDeleteStatus'] = "YES"; 
       $result->driver = $driverArray;

    //////////
       $oo_result = Owner_operator_driver::where('companyID',$companyID )->first();
        $oo_driverArray=$oo_result->ownerOperator;

        $oo_arrayLength=count($oo_driverArray);
        $i=0;
        $v=0;
        for ($i=0; $i<$oo_arrayLength; $i++){
            $oo_id=$oo_result->ownerOperator[$i]['_id'];
            if($oo_id==$driverID){
               $v=$i;
            }
        }
       $oo_driverArray[$v]['deleteStatus'] = "YES"; 
       $oo_result->ownerOperator = $oo_driverArray;

       if ($result->save() && $oo_result->save()) {
            $success = true;
            $message = "Driver Owner Operator deleted successfully";
        } else {
            $success = false;
            $message = "Driver Owner Operator  not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
        
    } 

    public function restoreDriverOwnerOperator(Request $request){
        //dd($request->all());
         $companyID=(int)1;
         $driverID=$request->id;
         
         $result = Driver::where('companyID',$companyID )->first();
         $driverArray=$result->driver;
 
         $arrayLength=count($driverArray);
         $i=0;
         $v=0;
         for ($i=0; $i<$arrayLength; $i++){
             $id=$result->driver[$i]['_id'];
             if($id==$driverID){
                $v=$i;
             }
         }
        $driverArray[$v]['ownerOperatorStatus'] = "YES"; 
        $driverArray[$v]['ownerOperatorDeleteStatus'] = "NO"; 
        $result->driver = $driverArray;
 
     //////////
        $oo_result = Owner_operator_driver::where('companyID',$companyID )->first();
         $oo_driverArray=$oo_result->ownerOperator;
 
         $oo_arrayLength=count($oo_driverArray);
         $i=0;
         $v=0;
         for ($i=0; $i<$oo_arrayLength; $i++){
             $oo_id=$oo_result->ownerOperator[$i]['_id'];
             if($oo_id==$driverID){
                $v=$i;
             }
         }
        $oo_driverArray[$v]['deleteStatus'] = "NO"; 
        $oo_result->ownerOperator = $oo_driverArray;
 
        if ($result->save() && $oo_result->save()) {
             $success = true;
             $message = "Driver Owner Operator Restore Successfully";
         } else {
             $success = false;
             $message = "Driver Owner Operator  not found";
         }
 
         //  Return response
         return response()->json([
             'success' => $success,
             'message' => $message,
         ]);
         
     } 

    public function setupDriver(Request $request){
        request()->validate([
            'driverName' => 'required',
            'sentVia' => 'required',
        ]);
        $driverName=$request->driverName;
        $sentVia=$request->sentVia;
        $driverEmail=$request->driverEmail;
        $driverNo=$request->driverNo;
        
        if($sentVia=="email"){
            $a = \Mail::send('email.setup-driver', ['driverName'=>$driverName], function($message) use($request){
                $message->from('noreply@veravalonline.com');
                $message->to($request->driverEmail);
                $message->subject('E driver setup from Astra TMS!');
            });
            return response()->json(['success' => true, 'message' => 'Mail sent successfully.','statusCode' => 200]);
        }

        if($sentVia=="text"){
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($driverNo, [
                'from' => $twilio_number, 
                'body' => 'Hello '.$driverName.',
                           please click below link to fill your driver joining application.
                           Thank You.!
                           Astra TMS']);
            return response()->json(['success' => true, 'message' => 'Message sent successfully.','statusCode' => 200]);
        }
        
    }  

    public function downloadPDF()
    {
        $drivers = Driver::get();

        foreach ($drivers as $driv) {
            $show = $driv['driver'];
            foreach ($show as $s) {
                $p[] = array($s['driverName'], $s['driverUsername'], $s['driverTelephone'], $s['driverAlt'],
                    $s['driverEmail'], $s['driverAddress'], $s['driverLocation'], $s['driverZip'],
                    $s['driverStatus'], $s['driverSocial'], $s['dateOfbirth'], $s['dateOfHire'],
                    $s['driverLicenseNo'], $s['driverLicenseIssue'], $s['driverLicenseExp'], $s['driverLastMedical'],
                    $s['driverNextMedical'],$s['driverLastDrugTest'],$s['driverNextDrugTest'],$s['passportExpiry'],
                    $s['fastCardExpiry'], $s['hazmatExpiry'], $s['internalNote'], $s['rate'], $s['currency']
                );
            }
        }

        $pdf = PDF::loadView('pdf.driverdetails', array('p' =>  $p))->setPaper('a4', 'landscape');
        

        return $pdf->download('Drivers.pdf');   
    }

    //add by Yash
    public function getContract(Request $request){
        $companyIdcheck=(int)$request->companyID;
        $contract = ContractDetail::where('companyID',$companyIdcheck)->first();       
        return response()->json($contract);  
    }

    public function addDriverContractCategory(Request $request){
        request()->validate([
            'driverContractCategory' => 'required',
            'driverContractSubCategory' => 'required',
            'companyID' => 'required|unique:contractdetails,companyID',
        ]);
        try{

        $driver=ContractDetail::all();
        $companyID=(int)$request->companyID;

        $getContract = ContractDetail::where('companyID',$companyID)->first();

        $driverContract[]=array( 
            '_id' => new ObjectId(),
            'heading' => $request->driverContractCategory,
            'line' => $request->driverContractSubCategory                
            );

            if($getContract){
                $driverContractArray=$getContract->contract;
                ContractDetail::where(['companyID' =>$companyID ])->update([
                    'contract' =>array_merge($driverContract,$driverContractArray), 
                ]);

                $data = [
                    'success' => true,
                    'message'=> 'Driver Contract Category added successfully'
                ] ;
                
                return response()->json($data);
            }else{
                if(ContractDetail::create([
                    
                    'companyID' => $companyID,
                    'counter' => 0,
                    'contract' => $driverContract,                    
                ])) {
                    $data = [
                        'success' => true,
                        'message'=> 'Driver Contract Category added successfully'
                        ] ;
                        return response()->json($data);
                }
            }
        } 
        catch(\Exception $error){
            return $error->getMessage();
        }
    }

    // public function addDriverContractSubCategory(Request $request){
    //     request()->validate([
    //         'contractCategory' => 'required',
    //         'contractSubCategory' => 'required',
    //         'companyID' => 'required|unique:contractdetails,companyID',
    //     ]);
    //     try{

    //     // $driver=ContractDetail::all();
    //     $companyID=(int)$request->companyID;
    //     $contractCategorySelect=$request->contractCategory;
    //     $getContract = ContractDetail::where('companyID',$companyID)->first();
    //     $driverContractArray=$getContract->contract[$contractCategorySelect];

    //     $arrayLengthUp=count($driverContractArray);
    //     $i=0;
    //     $v=0;
    //    for ($i=0; $i<$arrayLengthUp; $i++){
    //         $id=$resultUp->driver[$i];
    //             foreach ($id as $value){
    //                 if($value==$driverEmailUp){
    //                     $v=$i;
    //                  }
    //             }
    //    }
    //     foreach($request->driverContractSubCategory as $dc){
    //         $driverContractSubCat = $request->driverContractSubCategory;
    //     }
    //             $driverContractArray=$getContract->contract[$request->heading];
    //             ContractDetail::where(['companyID' =>$companyID, 'contract["heading"]' => $driverContractArray ])->update([
    //                 'contract["lines"]' => $driverContractSubCat]);

    //             $data = [
    //                 'success' => true,
    //                 'message'=> 'Driver Contract  added successfully'
    //             ] ;
                
    //             return response()->json($data);
            
    //     } 
    //     catch(\Exception $error){
    //         return $error->getMessage();
    //     }
    // }

}

    