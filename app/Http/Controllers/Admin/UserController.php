<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Office;
use App\Models\Company;
use App\Models\UserSubscription;
use Mail; 
use Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use PDF;

class UserController extends Controller
{
    public function addUsers(Request $request)
    {
        // dd($request->inser_user);
		// $data = $db->companyAdmin->findOne(["_id"=> (int)$_SESSION['companyId']]);
        // $flag = false;
        // $flagfield = '';
        // $totalusers = $data['remainingUser'];
        // $Subscriptionupdate = new Subscriptionupdate();
        // $makedecision = $Subscriptionupdate->entryDecision($db, 'user', '603ce8da39d65c0d19526984', $helper);
	
        // echo $makedecision['status'];

        request()->validate([
            'userName' => 'required',
            'userEmail' => 'required|unique:user',
            'userPass' => 'required',
            'userFirstName' => 'required',
            'userLastName' => 'required',
            'userAddress' => 'required',
            'userZip' => 'numeric|nullable',
            'userExt' => 'numeric|nullable',
        ]);
        //Data::insert($request->all());
        // User::create(['name' => $request->input('name'),
        //     "Information"=>[              
        //         "email" => $request->input('email'),
        //         "comment" => $request->input('comment'),
        //         'website' =>$request->input('website'),
        //         "info" => (object)array( "x" => 203, "y" => 102),
        //         "versions" => array("0.9.7", "0.9.8", "0.9.9")
        //     ]
        // ]);
        if($request->userLocation == null){
            $request->userLocation = '';
        }
        if($request->userZip == null){
            $request->userZip = '';
        }
        if($request->userTelephone == null){
            $request->userTelephone = '';
        }
        if($request->userExt == null){
            $request->userExt = '';
        }
        if($request->TollFree == null){
            $request->TollFree = '';
        }
        if($request->userFax == null){
            $request->userFax = '';
        }

        try{
			$password = sha1($request->userPass);
			// $company_name = explode(")",$users->getCompanyName()); 
            // if($makedecision['status']) {
                // print_r($request->userPass);die;
                if (User::create([
                    'counter' => 0,
                    // 'companyName' => $request->input('companyName'),
                    // 'companyID' => (int)$_SESSION['companyId'],
                    'userEmail' => $request->input('userEmail'),
                    'companyName' => $request->input('companyName'),
                    'userName' => $request->input('userName'),
                    'userPass' => $password,
                    'userFirstName' => $request->input('userFirstName'),
                    'userLastName' => $request->input('userLastName'),
                    'userAddress' => $request->input('userAddress'),
                    'userLocation' => $request->userLocation,
                    'userZip' => $request->userZip,
                    'userTelephone' => $request->userTelephone,
                    'userExt' => $request->userExt,
                    'TollFree' => $request->TollFree,
                    'userFax' => $request->userFax,
                    'privilege' => (object)array(
                        'insertUser' => (int)$request->inser_user,
                        'updateUser' => (int)$request->update_user,
                        'deleteUser' => (int)$request->delete_user,
                        'importUser' => (int)$request->import_user,
                        'exportUser' => (int)$request->export_user,
                    ),
                    'dashboard' => (object)array(
                        'profit_loss' =>(int)$request->input('profit_loss'),
                        'dispatcher' => (int)$request->input('dispatcher'),
                        'driver' => (int)$request->input('driver'),
                        'company' =>(int) $request->input('company'),
                        'truck' => (int)$request->input('truck'),
                        'carrier' =>(int)$request->input('carrier'),
                        'equipment' => (int)$request->input('equipment'),
                        'sales_representative' =>(int) $request->input('sales_representative'),
                        'new_active_load' => (int)$request->input('new_active_load'),
                    ),
                    'master' => (object)array(
                        
                        // 'master' => $request->input('master'),
                        'addCompany' => (int)$request->input('addCompany'),
                        'office' => (int)$request->input('office'),
                        'currencySetting' => (int)$request->input('currencySetting'),
                        'paymentTerms' => (int)$request->input('paymentTerms'),
                        'termCondition' => (int)$request->input('termCondition'),
                        'statusType' => (int)$request->input('statusType'),
                        'loadType' => (int)$request->input('loadType'),
                        'equipmentType' => (int)$request->input('equipmentType'),
                        'reccuranceCategory' => (int)$request->input('reccuranceCategory'),
                        'trucktrailerType' => (int)$request->input('truckType'),
                        'userPrivillege' => (int)$request->input('userPrivillege'),
                        'setting' => (int)$request->input('setting'),

                        // 'addNote' => (int)$request->input('addNote'),
                        
                        // 'fixPayCategory' => (int)$request->input('fixPayCategory'),
                        // 'fuelCardType' => (int)$request->input('fuelCardType'),
                        // 'dispactherIncentive' =>  (int)$request->input('dispactherIncentive'),
                        // 'salesIncentive' =>  (int)$request->input('salesIncentive'),
                        // 'documentType' => (int)$request->input('documentType')
                    ),
                    'admin' => (object)array(
                        'admin' => (int)$request->admin,
                        'customer'=>(int)$request->customer,
                        'shipper_Consignee'=>(int)$request->addShipper,
                        // 'consignee' =>$request->addConsignee,
                        'external_carrier'=>(int)$request->external_carrier,
                        'driver_owner_operator'=>(int)$request->driver_owner_operator,
                        'user'=>(int)$request->user,
                        'truck'=>(int)$request->truck,
                        'trailer'=>(int)$request->trailer,
                        'factoring_Company'=>(int)$request->factoringCompany,
                        // 'addCustomer' => (int)$request->input('addCustomer'),
                        // 'addShipper' => (int)$request->input('addShipper'),
                        // 'addBank' => (int)$request->input('addBank'),
                        // 'addConsignee' => (int)$request->input('addConsignee'),
                        // 'addDriver' => (int)$request->input('addDriver'),
                        // 'addTruck' => (int)$request->input('addTruck'),
                        // 'addTrailer' => (int)$request->input('addTrailer'),
                        // // 'addExternalCarrier' => $request->input('addExternalCarrier'),
                        // 'factoringCompany' => (int)$request->input('factoringCompany'),
                        // 'customsBroker' => (int)$request->input('customsBroker'),
                        // 'creditCard' => (int)$request->input('creditCard'),
                        // 'subCreditCard' => (int)$request->input('subCreditCard'),
                        // 'users' => (int)$request->input('users'),
                        // 'iftaCard' => (int)$request->input('iftaCard'),
                    ),
                    'ifta' => (object)array(
                        'ifta'=>(int)$request->ifta,
                        'fuel_vendor'=>(int)$request->fuel_vendor,
                        'iftaCard' =>(int) $request->iftaCard,
                        'Fuel_reciepts_cash_advance' => (int)$request->Fuel_reciepts_cash_advance,
                        'tolls'=>(int)$request->tolls,
                        'IFTA_trips'=>(int)$request->IFTA_trips,
                        // 'ifta' => $request->input('ifta'),
                        // 'fuelReceipt' => (int)$request->input('fuelReceipt'),
                        // 'addToll' => (int)$request->input('addToll'),
                        // 'verifyTrip' => (int)$request->input('verifyTrip'),
                        // 'iftaReport' => $request->input('iftaReport'),
                    ),
                    'account' => (object)array(
                        'account'=>(int)$request->Finance,
                        'bank'=>(int)$request->bank,
                        'credit_card'=>(int)$request->creditCard,
                        'sub_credit_card'=>(int)$request->subCreditCard,
                        'accountManager'=>(int)$request->accountManager,
                        'paymentRegistration'=>(int)$request->paymentRegistration,
                        
                        
                        // // 'account' => $request->input('account'),
                        // 'accountManager' => (int)$request->input('accountManager'),
                        // 'paymentRegistration' => (int)$request->input('paymentRegistration'),
                        // 'advancePayment' => (int)$request->input('advancePayment'),
                        // 'manageReceipt' => (int)$request->input('manageReceipt'),
                    ),
                    'reports' => (object)array(
                        'report' => (int)$request->report,
                        'aggingReport'=>(int)$request->aggingReport,
                        'Revenue_report'=>(int)$request->Revenue_report,
                        'Expense_report'=>(int)$request->Expense_report,
                        'Report1099'=>(int)$request->Report1099,
                        
                        
                        // 'creditStateReport' => (int)$request->input('creditStateReport'),
                        // 'bankStateReport' => (int)$request->input('bankStateReport'),
                        // 'driverReport' => (int)$request->input('driverReport'),
                        // 'fuelReport' => (int)$request->input('fuelReport'),
                        // 'aggingReport' => (int)$request->input('aggingReport'),
                        // 'tollReport' => (int)$request->input('tollReport'),
                        // 'receivableReport' => (int)$request->input('receivableReport'),
                        // 'payableReport' => (int)$request->input('payableReport'),
                        // 'fuelcardReport' => (int)$request->input('fuelcardReport'),
                        // 'Report1099'=> (int)$request->input('Report1099'),
                        // 'emailTrack' => (int)$request->input('emailTrack'),
                        // 'laneAnalysis' => (int)$request->input('laneAnalysis')
                    ),

                    'settlements' => (object)array(
                        'settlements' => (int)$request->input('settlements'),
                        // 'driverReport' => (int)$request->input('driverReport'),
                        'driverPaySettlements'=>(int)$request->input('driverPaySettlements'),
                        'customerSettlement'=>(int)$request->input('customerSettlement'),
                        'CarrierSettlement'=>(int)$request->input('carrierSettlement'),
                        // 'Factoringcompany'=>$request->Factoringcompany,
                    ),

                    'user_type' => "user",
                    // 'insertedTime' => Carbon::now(),
                    // 'insertedUserId' => $_SESSION['userName'],
                    'deleteStatus' => 0,
                    'mode' => 'day',
                    'otp' => '',
                    'emailVerificationStatus' => 1,
                    ])
                    
                ){
                        $success = true;
                        $message = "User added successfully";
                    } else {
                        $success = false;
                        $message = "User not added. Please try again";
                    }
            
                    //  Return response
                    return response()->json([
                        'success' => $success,
                        'message' => $message,
                    ]);
                
                // else {
                //     $arr = array('status' => 'error', 'message' => 'Something went wrong. please try again later.'); 
                //     echo json_encode($arr);
                // }
            // } else {
            //     $arr = $_SESSION['subscription'] == 1 ? array('status' => 'excceed', 'message' => '') : array('status' => 'notsubscribe', 'message' => ''); 
            //     echo json_encode($arr);
            // }
        }
        catch(\Exception $error){
            return $error->getMessage();
        }
    }


    // update Privilege
    public function userEditDetails(Request $request)
    {
        request()->validate([
            'userName' => 'required',
            'userEmail' => 'required|unique:user,userEmail'.$request->email,
            'userFirstName' => 'required',
            'userLastName' => 'required',
            'userAddress' => 'required',
            'userZip' => 'numeric|nullable',
            'userExt' => 'numeric|nullable',
        ]);
        if($request->userLocation == null){
            $request->userLocation = '';
        }
        if($request->userZip == null){
            $request->userZip = '';
        }
        if($request->userTelephone == null){
            $request->userTelephone = '';
        }
        if($request->userExt == null){
            $request->userExt = '';
        }
        if($request->TollFree == null){
            $request->TollFree = '';
        }
        if($request->userFax == null){
            $request->userFax = '';
        }
        try{
            $data = User::where('userEmail', $request->email)->first();
            $data->userEmail = $request->userEmail;
            // dd($request->userPassword);
            if($request->userPassword != null){
                $data->userPass = sha1($request->userPassword);
            }
            $data->companyName = $request->companyName;
            $data->userName = $request->userName;
            $data->userFirstName = $request->userFirstName;
            $data->userLastName = $request->userLastName;
            $data->userAddress = $request->userAddress;
            $data->userLocation = $request->userLocation;
            $data->userZip = $request->userZip;
            $data->userTelephone = $request->userTelephone;
            $data->userExt = $request->userExt;
            $data->TollFree = $request->TollFree;
            $data->userFax = $request->userFax;
            $data->save();
        if($data){
            $arr = array('status' => 'success', 'message' => 'User edited successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
        }
        catch(\Exception $error){
            return $error->getMessage();
        }
    }

    // update Privilege
    public function editUser($users, $db)
    {
        
        $db->user->updateOne(["_id" => (int)$users->getId(),],
            [ '$set' =>[
                'privilege' => array(
                    'insertUser' => $users->getInsertUser(),
                    'updateUser' => $users->getUpdateUser(),
                    'deleteUser' => $users->getDeleteUser(),
                    'importUser' => $users->getImportUser(),
                    'exportUser' => $users->getExportUser(),
                ),
                'dashboard' => array(
                    'profit_loss' => $users->getProfit_loss(),
                    'dispatcher' => $users->getDispatcher(),
                    'driver' => $users->getDriver(),
                    'company' => $users->getCompany(),
                    'truck' => $users->getTruck(),
                    'carrier' => $users->getCarrier(),
                    'equipment' => $users->getEquipment(),
                    'sales_representative' => $users->getSales_rep(),
                    'new_active_load' => $users->getNewactiveload(),
                ),
                'master' => array(
                    'master' => $users->getMaster(),
                    'addCompany' => $users->getAddCompany(),
                    'paymentTerms' => $users->getPaymentTerms(),
                    'office' => $users->getOffice(),
                    'equipmentType' => $users->getEquipmentType(),
                    'truckType' => $users->getTruckType(),
                    'trailerType' => $users->getTrailerType(),
                    'statusType' => $users->getStatusType(),
                    'loadType' => $users->getLoadType(),
                    'bankCategory' => $users->getBankCategory(),
                    'addNote' => $users->getAddNote(),
                    'currencySetting' => $users->getCurrencySetting(),
                    'fixPayCategory' => $users->getFixPayCategory(),
                    'fuelCardType' => $users->getFuelCardType(),
                    'dispactherIncentive' =>  $users->getDispactherIncentive(),
                    'salesIncentive' =>  $users->getSalesIncentive(),
                    'dispactherIncentive' => $users->getDispactherIncentive(),
                    'documentType' =>  $users->getDocumentType()
                ),
                'admin' => array(
                    'admin' => $users->getAdmin(),
                    'addCustomer' => $users->getAddCustomer(),
                    'addShipper' => $users->getAddShipper(),
                    'addBank' => $users->getAddBank(),
                    'addConsignee' => $users->getAddConsignee(),
                    'addDriver' => $users->getAddDriver(),
                    'addTruck' => $users->getAddTruck(),
                    'addTrailer' => $users->getAddTrailer(),
                    'addExternalCarrier' => $users->getAddExternalCarrier(),
                    'factoringCompany' => $users->getFactoringCompany(),
                    'customsBroker' => $users->getCustomsBroker(),
                    'creditCard' => $users->getCreditCard(),
                    'subCreditCard' => $users->getSubCreditCard(),
                    'users' => $users->getUsers(),
                ),
                'ifta' => array(
                    'ifta' => $users->getIfta(),
                    'fuelReceipt' => $users->getFuelReceipt(),
                    'addToll' => $users->getAddToll(),
                    'verifyTrip' => $users->getVerifyTreep(),
                    'iftaReport' => $users->getIftaReport(),
                    'iftaCard' => $users->getIftacard()
                ),
                'account' => array(
                    'account' => $users->getAccount(),
                    'accountManager' => $users->getAccountManager(),
                    'paymentRegistration' => $users->getPaymentRegistration(),
                    'advancePayment' => $users->getAdvancePayment(),
                    'manageReceipt' => $users->getManageReceipt(),
                ),
                'reports' => array(
                    'report' => $users->getReport(),
                    'creditStateReport' => $users->getCreditStateReport(),
                    'bankStateReport' => $users->getBankStateReport(),
                    'driverReport' => $users->getDriverReport(),
                    'fuelReport' => $users->getFuelReport(),
                    'aggingReport' => $users->getAggingReport(),
                    'tollReport' => $users->getTollReport(),
                    'receivableReport' => $users->getReceivableReport(),
                    'payableReport' => $users->getPayableReport(),
                    'fuelcardReport' => $users->getFuelcardReport(),
                    'Report1099'=> $users->getReport1099(),
                    'emailTrack' => $users->getEmailTrack(),
                    'laneAnalysis' => $users->getLaneAnalysis()
                ),
                'user_type' => "user",
                'updateTime' => time(),]
            ]);

        echo 'success';

    }
    public function getAllUser(Request $request){
        // $user = User::where('id', '!=', Auth::user()->id)->where('deleteStatus',0)->get();
        // return response()->json($user);  
        $companyID=(int)Auth::user()->companyID;
        $show = User::raw()->find(array('companyID' => $companyID));
        $i = 0;
        $table = "";
        $count = 0;
        foreach ($show as $row1) 
        {
            $count++;
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $userEmail = $row1['userEmail'];
            $userName = $row1['userName'];
            $userFirstName = $row1['userFirstName'];
            $userLastName = $row1['userLastName'];
            $userAddress = $row1['userAddress'];
            $userLocation = $row1['userLocation'];
            $userZip = $row1['userZip'];
            $userTelephone = $row1['userTelephone'];
            $userExt = $row1['userExt'];
            $TollFree = $row1['TollFree'];
            $userFax = $row1['userFax'];
            $deleteStatus = $row1['deleteStatus'];
            $checkdelete = $deleteStatus == 0 ? "" : "disabled_load";
            if($userEmail !="" || $userEmail !=null)
            {
                $userEmail=$userEmail;
            }
            else
            {
                $userEmail="------";
            }
            if($userName !="" || $userName !=null)
            {
                $userName=$userName;
            }
            else
            {
                $userName="------";
            }
            if($userFirstName !="" || $userFirstName !=null)
            {
                $userFirstName=$userFirstName;
            }
            else
            {
                $userFirstName="------";
            }
            if($userLastName !="" || $userLastName !=null)
            {
                $userLastName=$userLastName;
            }
            else
            {
                $userLastName="------";
            }
            if($userAddress !="" || $userAddress !=null)
            {
                $userAddress=$userAddress;
            }
            else
            {
                $userAddress="------";
            }
            if($userLocation !="" || $userLocation !=null)
            {
                $userLocation=$userLocation;
            }
            else
            {
                $userLocation="------";
            }
            if($userZip !="" || $userZip !=null)
            {
                $userZip=$userZip;
            }
            else
            {
                $userZip="------";
            }
            if($userTelephone !="" || $userTelephone !=null)
            {
                $userTelephone=$userTelephone;
            }
            else
            {
                $userTelephone="------";
            }
            if($userExt !="" || $userExt !=null)
            {
                $userExt=$userExt;
            }
            else
            {
                $userExt="------";
            }
            if($TollFree !="" || $TollFree !=null)
            {
                $TollFree=$TollFree;
            }
            else
            {
                $TollFree="------";
            }
            if($userFax !="" || $userFax !=null)
            {
                $userFax=$userFax;
            }
            else
            {
                $userFax="------";
            }
            $i++;
            $table .= "<tr  class='tr'>
                <td class= '$checkdelete'> $i</td>
                <td data-field='email' id='$userEmail'> $userEmail </td>
                <td data-field='username'> $userName </td>
                <td data-field='fistname'> $userFirstName </td>
                <td data-field='lastname'> $userLastName </td>
                <td data-field='address'> $userAddress </td>
                <td data-field='location'> $userLocation </td>
                <td data-field='zip'> $userZip </td>
                <td data-field='telephone'> $userTelephone </td>
                <td data-field='ext'> $userExt </td>
                <td data-field='tollfree'> $TollFree </td>
                <td data-field='fax'> $userFax </td>
                <td style='width: 100px'> <a class='button-23 edit1' id='editmodel' title='Edit'><i class='fe fe-edit'></i></a><a class='delete1 button-23' data-id='$userEmail' title='Delete'><i class='fe fe-delete'></i></a></td>
                </tr>";     
        }
        $planres = UserSubscription::raw()->findOne(['companyID' => (int)$companyID]);
        $paidRemaining = $planres['user']['remaining'];
        $freeRemaining = $planres['user']['freeremaining'];
        $paidTotal = $planres['user']['total'];
        $freeTotal = $planres['user']['freetotal'];
        $remaining = $freeRemaining + $paidRemaining;
        $total = $freeTotal + $paidTotal;
        $array = array();
        $array[] = $table; 
        $arrcount = array('total' => $total,'remaining' => $remaining,'paidRemaining' => $paidRemaining);
        $array[] = $arrcount; 
        echo json_encode($array);
    }

    public function getUser(Request $request){
        $user = Auth::user();
        return view('layout.user.profile',compact('user'));
    
    }

    public function editUserDetails(Request $request)
    {
        $user = Auth::user();
        request()->validate([
            'userName' => 'required',
            'userEmail' => 'required|unique:user,userEmail'.$request->userEmail,
            'userFirstName' => 'required',
            'userLastName' => 'required',
            'userAddress' => 'required',
            'userZip' => 'numeric|nullable',
            'userExt' => 'numeric|nullable',
        ]);
        
            $data = User::where('userEmail', $user->userEmail)->first();
            // print_r($data);die;
            $data->userEmail = $request->userEmail;
            $data->userName = $request->userName;
            $data->userFirstName = $request->userFirstName;
            $data->userLastName = $request->userLastName;
            if($request->userPass != null){
                $data->userPass = sha1($request->userPass);
            }else{
                $data->userPass = $user->userPass;
            }
            $data->userAddress = $request->userAddress;
            $data->userLocation = $request->userLocation;
            $data->userZip = $request->userZip;
            $data->userTelephone = $request->userTelephone;
            $data->userExt = $request->userExt;
            $data->TollFree = $request->TollFree;
            $data->userFax = $request->userFax;
            
        if($data->save()){
          return redirect()->back()->with('message','Profile Edited Successfully!');
        }else{
          return redirect()->back()->with('message','Something went wrong!');
        }
        
    }

    public function deleteUser(Request $request)
    {
        $delete = User::where('userEmail', $request->userEmail)->update(['deleteStatus'=>1]);
        if ($delete) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = false;
            $message = "User not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function downloadPDF()
    {
        $users = User::get();

        $pdf = PDF::loadView('pdf.usersdetails', array('users' =>  $users))->setPaper('a4', 'landscape');
        

        return $pdf->download('Users.pdf');   
    }

    public function get_office_address(Request $request)
    {
        $companyId=(int)1;   
        $office = Office::where('companyID',$companyId)->first();    
        return response()->json($office, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function add_office_address(Request $request)
    {
        $companyID=(int)1;
        $getOffice = Office::where('companyID',$companyID)->first();
        if($getOffice){
            $totalOfficeArray=count($getOffice->office);
        }else{
            $totalOfficeArray=0; 
        }
        $officeData[]=array(    
            '_id' => $totalOfficeArray,
            'counter'=>0,
            'officeName' => $request->officeName,
            'officeLocation'=>$request->officeLocation,
            'edit_by'=>Auth::user()->userName,
            'deleteStatus' => "NO",
            'deleteUser'=>"",                
        );
        $officeArray=$getOffice->office;
        if(Office::where(['companyID' =>$companyID ])->update([
            'companyID' => $companyID,
            'counter' => $totalOfficeArray+1,
            'office' =>array_merge($officeArray,$officeData) , 
        ])) {
            $data = [
                'success' => true,
                'message'=> 'Office added successfully'
                ] ;
                return response()->json($data);
        }
    }
    public function add_company_details(Request $request)
    {

    }
    public function get_company_details(Request $request)
    {
        $companyId=(int)1;   
        $office = Company::where('companyID',$companyId)->first();    
        return response()->json($office, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }


}