<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class UserPrivillegeController extends Controller
{
    public function getEditPrivilegeUserList(Request $request){
       
        $user = User::where('id', '!=', Auth::user()->id)->where('deleteStatus',0)->get();
        return response()->json($user);  
    }
    public function getPrivilegeTable(Request $request){
        //dd($request->all());
        $user = User::where('userEmail',$request->emailId )->first();
        return response()->json($user);  
    }

    public function updateUSerPrivi(Request $request){
//dd($request->all());
    $privilege = (object)array(
        'insertUser' => (int)$request->insert_user,
        'updateUser' => (int)$request->update_user,
        'deleteUser' => (int)$request->delete_user,
        'importUser' => (int)$request->import_user,
        'exportUser' => (int)$request->export_user,
    );

$dashboard= (object)array(
    'new_active_load' => (int)$request->db_Load,
    'profit_loss' => (int)$request->db_ProfitLoss,
    'dispatcher' => (int)$request->db_Dispatcher,
    'driver' => (int)$request->db_Driver,
    'company' => (int)$request->db_Company,
    'truck' => (int)$request->db_Truck,
    'carrier' =>(int)$request->db_Carrier,
    'equipment' =>(int) $request->db_Equipment,
    'sales_representative' =>(int) $request->db_SalesRepresentative,
    
);
$master= (object)array(
    'addCompany' => (int)$request->Company,
    'office' => (int)$request->BranchOffice,
    'currencySetting' => (int)$request->CurrencySetting,
    'paymentTerms' => (int)$request->PaymentTerms,
    'termCondition' => (int)$request->AddTermsConditions,
    'statusType' => (int)$request->Status,
    'loadType' => (int)$request->LoadType,
    'equipmentType' => (int)$request->EquipmentType,
    'reccuranceCategory' => (int)$request->ReccuranceCategory,
    'trucktrailerType' => (int)$request->TruckTrailermake,
    
);
$admin= (object)array(
    'admin' => (int)$request->Admin,
    'customer'=>(int)$request->Customer,
    'shipper_Consignee'=>(int)$request->ShipperConsignee,
    'external_carrier'=>(int)$request->ExternalCarrier,
    'driver_owner_operator'=>(int)$request->DriverOwnerOperator,
    'user'=>(int)$request->User,
    'truck'=>(int)$request->Truck,
    'trailer'=>(int)$request->Trailer,
    'factoring_Company'=>(int)$request->FactoringCompany,
   
);
$ifta= (object)array(
    'ifta'=>(int)$request->Ifta,
    'fuel_vendor'=>(int)$request->FuelVendor,
    'iftaCard' => (int)$request->FuelCard,
    'Fuel_reciepts_cash_advance' => (int)$request->FuelRecieptsCashAdvance,
    'tolls'=>(int)$request->Tolls,
    'IFTA_trips'=>(int)$request->IFTATrips,
);
$account = (object)array(
    'account'=>(int)$request->Account,
    'bank'=>(int)$request->Bank,
    'credit_card'=>(int)$request->CreditCard,
    'sub_credit_card'=>(int)$request->SubCreditCard,
    'accountManager'=>(int)$request->AccountingManager,
    'paymentRegistration'=>(int)$request->PaymentReceiptRegistration,
);
$reports =(object)array(
    'report' => (int)$request->Reports,
    'aggingReport'=>(int)$request->AgingReport,
    'Revenue_report'=>(int)$request->RevenueReport,
    'Expense_report'=>(int)$request->ExpenseReport,
    'Report1099'=>(int)$request->Report1099,
);

$settlements = (object)array(
    'settlements' => (int)$request->Settlements,
    'driverPaySettlements'=>(int)$request->DriverPaySettlements,
    'customerSettlement'=>(int)$request->CustomerSettlement,
    'CarrierSettlement'=>(int)$request->CarrierSettlement,
);


        try{
            $data = User::where('userEmail', $request->emailId)->first();
            //dd($data);
            $data->privilege =$privilege ;
            $data->dashboard =$dashboard ;
            $data->master =$master ;
            $data->admin = $admin;
            $data->ifta = $ifta;
            $data->account = $account;
            $data->reports = $reports;
            $data->settlements = $settlements;
           
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
}
