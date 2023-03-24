<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\TruckController;
use App\Http\Controllers\Admin\ShipperController;
use App\Http\Controllers\Admin\ConsigneeController;
use App\Http\Controllers\Admin\factCompanyController;
use App\Http\Controllers\Admin\FuelVendorController;
use App\Http\Controllers\Admin\FuelCardController;
use App\Http\Controllers\Admin\FuelReceiptController;
use App\Http\Controllers\Admin\IftaTollController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\Admin\CreditCardController;
use App\Http\Controllers\Admin\SubCreditCardController;
use App\Http\Controllers\Admin\AccountManagerController;
use App\Http\Controllers\Admin\BranchOfficeController;
use App\Http\Controllers\Admin\PaymentTermsController;
use App\Http\Controllers\Admin\TrailerAdminAddController;
use App\Http\Controllers\Admin\EquipmentTypeController;
use App\Http\Controllers\Admin\RecurrenceCategoryController;
use App\Http\Controllers\Admin\TermsConditionsController;
use App\Http\Controllers\Admin\TruckTrailerMakeController;
use App\Http\Controllers\Admin\LoadController;
use App\Http\Controllers\Admin\UserPrivillegeController;
use App\Http\Controllers\Admin\LoadBoardController;
use App\Http\Controllers\Admin\ExternalCarrierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/admin/addloadboard', function () {
//     return view('layout.Loadboard.addLoadboard');
// });

    Route::get('/table', function () {
        return view('table');
    });

    Route::get('/admin/driverApplication2', function () {
        return view('layout.driver.driver_application_form2');
    });
    
    Route::get('/admin/driverApplication', function () {
        return view('driver_application_form');
    });
    // Route::get('/admin/Loadboard', function () {
    //     return view('layout.Loadboard.Loadboard');
    // })->name('admin_loadboard');

    Route::get('/admin/Loadboard', [LoadBoardController::class, 'index'])->name('admin_loadboard');
    // Route::get('profile', function () {
    //     return view('profile');
    // });

Auth::routes();
//Loadboard
Route::get('admin/getLoadboardData', [LoadBoardController::class, 'getLoadboardData']);
Route::post('admin/changeStatus', [LoadBoardController::class, 'changeStatus'])->name('changeStatus');;
Route::post('admin/addLoadBoard', [LoadBoardController::class, 'addLoadBoard']);
// Route::get('/admin/index', [LoadBoardController::class, 'index']);
Route::post('/admin/carrierVerify', [LoadBoardController::class, 'getCarrier']);
Route::post('/admin/driverVerify', [LoadBoardController::class, 'getDriver']);
Route::post('/admin/ownerVerify', [LoadBoardController::class, 'getOwner']);
Route::post('admin/ownerTruckVerify', [LoadBoardController::class, 'getTruck']);
Route::post('admin/ownerTrailerVerify', [LoadBoardController::class, 'getTrailer']);

// User
Route::get('/', [AuthController::class, 'dashboard']);
Route::get('admin/user', [UserController::class, 'getAllUser']);
Route::get('admin/user-privilege', [UserController::class, 'user']);
Route::post('admin/add-user', [UserController::class, 'addUsers']);
Route::post('admin/edit-user', [UserController::class, 'userEditDetails']);
Route::post('admin/delete-user', [UserController::class, 'deleteUser'])->name('user.delete');
Route::get('admin/profile', [UserController::class, 'getUser']);
Route::post('admin/profile-edit', [UserController::class, 'editUserDetails'])->name('profile.edit');
Route::post('admin/download-pdf', [UserController::class, 'downloadPDF'])->name('download-pdf');
Route::post('admin/add_office_address', [UserController::class, 'add_office_address']);
Route::get('admin/get_office_address', [UserController::class, 'get_office_address']);
Route::post('admin/add_company_details', [UserController::class, 'add_company_details']);
Route::get('admin/get_company_details', [UserController::class, 'get_company_details']);

//Privileges
Route::get('admin/editPrivilegeUser', [UserPrivillegeController::class, 'getPrivilegeTable']);
Route::get('admin/getEditPrivilegeUserList', [UserPrivillegeController::class, 'getEditPrivilegeUserList']);
Route::post('admin/updateUSerPrivi', [UserPrivillegeController::class, 'updateUSerPrivi']);

// Login
Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('forgot-password', [AuthController::class, 'showForgetPasswordForm'])->name('forgot.password')->middleware('guest');
Route::post('post-forgot-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forgot.password.post'); 

// Driver
Route::get('admin/driver', [DriverController::class, 'getDriverData']);
Route::get('admin/owner', [DriverController::class, 'getowner']);
Route::get('admin/getDriver', [DriverController::class, 'getDriver']);
Route::post('admin/addDriver', [DriverController::class, 'addDriverData']);
Route::post('admin/editDriver', [DriverController::class, 'editDriverData']);
Route::post('admin/updateDriver', [DriverController::class, 'updateDriverData']);
Route::post('admin/deleteDriver', [DriverController::class, 'deleteDriver']);
Route::post('admin/addApplicationForm', [DriverController::class, 'addApplicationFormData']);
Route::post('admin/setupDriver', [DriverController::class, 'setupDriver']);
Route::post('admin/driverPDF', [DriverController::class, 'downloadPDF'])->name('driver-pdf');
Route::get('admin/getContract', [DriverController::class, 'getContract']);
Route::post('admin/addDriverContractCategory', [DriverController::class, 'addDriverContractCategory']);
Route::get('admin/viewDriverApplication', [DriverController::class, 'getViewDriverApplication']);
Route::post('admin/addOwnerOparator', [DriverController::class, 'addOwnerOparator']);
Route::post('admin/editDriverOwner', [DriverController::class, 'editDriverOwnerData']);
Route::post('admin/updateOwnerOparator', [DriverController::class, 'updateOwnerOparator']);
Route::get('admin/driver_getTruck', [DriverController::class, 'driver_getTruck']);
Route::post('admin/deleteDriverOwnerOperator', [DriverController::class, 'deleteDriverOwnerOperator']);
Route::post('admin/restoreDriverOwnerOperator', [DriverController::class, 'restoreDriverOwnerOperator']);
Route::post('admin/deleteViewDriverApp', [DriverController::class, 'deleteViewDriverApp']);
Route::post('admin/restoreDriver', [DriverController::class, 'restoreDriver']);

//customer
Route::get('admin/customer', [CustomerController::class, 'getCustomerData']);
Route::get('admin/getLBCustomerData', [CustomerController::class, 'getLBCustomerData']);
Route::post('admin/addCustomer', [CustomerController::class, 'addCustomerData']);
Route::get('admin/edit_customer', [CustomerController::class, 'edit_customer']);
Route::post('admin/update_customer', [CustomerController::class, 'update_customer']);
Route::post('admin/delete_customer', [CustomerController::class, 'delete_customer']);
Route::post('admin/restoreCustomer', [CustomerController::class, 'restoreCustomer']);

//addCurrency
Route::get('admin/customerCurrency', [CustomerController::class, 'getCustomerCurrency']);
Route::get('admin/getCurrency', [CurrencyController::class, 'getCurrency']);
Route::post('admin/addCurrency', [CustomerController::class, 'addCustomerCurrency']);
Route::post('admin/updateCurrency', [CurrencyController::class, 'updateCurrency']);

//PaymentTerms
Route::get('admin/getCustomerPaymentTerms', [CustomerController::class, 'getCustomerPaymentTerms']);
Route::post('admin/PaymentTerms', [CustomerController::class, 'addCustomerPaymentTerms']);
Route::get('admin/getPaymentTerms', [PaymentTermsController::class, 'getPaymentTerms']);
Route::post('admin/deletePayTerms', [PaymentTermsController::class, 'deletePayTerms']);
Route::get('admin/editPayTerms', [PaymentTermsController::class, 'editPayTerms']);
Route::post('admin/updatePaymentTerm', [PaymentTermsController::class, 'updatePaymentTerm']);
Route::post('admin/restorePaymentTerms', [PaymentTermsController::class, 'restorePaymentTerms']);

//factoringCompany
Route::get('admin/getCustomerBFactoringCompany', [CustomerController::class, 'getCustomerBFactoringCompany']);
Route::post('admin/factoringCompany', [CustomerController::class, 'addCustomerfactoringCompany']);
Route::get('admin/getFactCompany', [factCompanyController::class, 'getFactCompany']);
Route::get('admin/editFactCompany', [factCompanyController::class, 'editFactCompany']);
Route::post('admin/updateFactCompany', [factCompanyController::class, 'updateFactCompany']);
Route::post('admin/deleteFactCompany', [factCompanyController::class, 'deleteFactCompany']);
Route::post('admin/restoreFactCompany', [factCompanyController::class, 'restoreFactCompany']);

//company
Route::get('admin/company', [CompanyController::class, 'getCompanyData']);
Route::get('admin/lbcompany', [CompanyController::class, 'getlbcompanyData']);
Route::post('admin/addCompany', [CompanyController::class, 'addCompanyData']);
Route::get('admin/editCompany', [CompanyController::class, 'editCompanyData']);
Route::post('admin/updateCompany', [CompanyController::class, 'updateCompanyData']);
Route::post('admin/deleteCompany', [CompanyController::class, 'deleteCompany']);
Route::post('admin/updateUserCompany', [CompanyController::class, 'updateUserCompany']);

//truck
Route::get('admin/getTruck', [TruckController::class, 'getTruck']);
Route::get('admin/Truck', [TruckController::class, 'Truck']);
Route::get('admin/truck_getTrucktype', [TruckController::class, 'truck_getTrucktype']);
Route::post('admin/addTruck', [TruckController::class, 'addTruckData']);
Route::get('admin/edit_truck', [TruckController::class, 'edit_truck']);
Route::post('admin/update_truck', [TruckController::class, 'update_truck']);
Route::post('admin/delete_truck', [TruckController::class, 'delete_truck']);
Route::post('admin/restore_truck', [TruckController::class, 'restore_truck']);
Route::post('admin/create_truckType', [TruckController::class, 'create_truckType']);


//Shipper
Route::get('admin/getShipper', [ShipperController::class, 'getShipper']);
Route::get('admin/Shipper', [ShipperController::class, 'Shipper']);
Route::post('admin/storeShipper', [ShipperController::class, 'storeShipper']);
Route::get('admin/editShipper', [ShipperController::class, 'editShipper']);
Route::post('admin/updateShipper', [ShipperController::class, 'updateShipper']);
Route::post('admin/deleteShipper', [ShipperController::class, 'deleteShipper']);
Route::post('admin/restoreShipper', [ShipperController::class, 'restoreShipper']);

//consignee
Route::get('admin/getConsignee', [ConsigneeController::class, 'getConsignee']);
Route::post('admin/storeConsignee', [ConsigneeController::class, 'storeConsignee']);
Route::get('admin/editConsignee', [ConsigneeController::class, 'editConsignee']);
Route::post('admin/updateConsignee', [ConsigneeController::class, 'updateConsignee']);
Route::post('admin/deleteConsignee', [ConsigneeController::class, 'deleteConsignee']);

//fuel vendor
Route::get('admin/getFuelVendor', [FuelVendorController::class, 'getFuelVendor']);
Route::post('admin/createFuelVendor', [FuelVendorController::class, 'createFuelVendor']);
Route::get('admin/editFuelVendor', [FuelVendorController::class, 'editFuelVendor']);
Route::post('admin/updateFuelVendor', [FuelVendorController::class, 'updateFuelVendor']);
Route::post('admin/deleteFuelVendor', [FuelVendorController::class, 'deleteFuelVendor']);
Route::post('admin/restoreFuelVendor', [FuelVendorController::class, 'restoreFuelVendor']);


//fuel card
Route::get('admin/getFuelCard', [FuelCardController::class, 'getFuelCard']);
Route::post('admin/createFuelCard', [FuelCardController::class, 'createFuelCard']);
Route::get('admin/editFuelCard', [FuelCardController::class, 'editFuelCard']);
Route::post('admin/updateFuelCard', [FuelCardController::class, 'updateFuelCard']);
Route::post('admin/deleteFuelCard', [FuelCardController::class, 'deleteFuelCard']);
Route::post('admin/restoreFuelCard', [FuelCardController::class, 'restoreFuelCard']);

//Fuel Receipt
Route::get('admin/getFuelReceipt', [FuelReceiptController::class, 'getFuelReceipt']);
Route::get('admin/createFuelReceipt', [FuelReceiptController::class, 'createFuelReceipt']);
Route::post('admin/saveFuelReceipt', [FuelReceiptController::class, 'saveFuelReceipt']);
Route::get('admin/editFuelReceipt', [FuelReceiptController::class, 'editFuelReceipt']);
Route::post('admin/updateFuelReceipt', [FuelReceiptController::class, 'updateFuelReceipt']);
Route::post('admin/deleteFuelReceipt', [FuelReceiptController::class, 'deleteFuelReceipt']);
Route::post('admin/restoreFuelReceipt', [FuelReceiptController::class, 'restoreFuelReceipt']);
Route::post('admin/deleteMulFuelReceipt', [FuelReceiptController::class, 'deleteMulFuelReceipt']);
Route::get('admin/getInvoicedNumber', [FuelReceiptController::class, 'getInvoicedNumber']);

//Ifta Toll
Route::get('admin/getIftaToll', [IftaTollController::class, 'getIftaToll']);
Route::post('admin/createIftaToll', [IftaTollController::class, 'createIftaToll']);
Route::get('admin/editIftaToll', [IftaTollController::class, 'editIftaToll']);
Route::post('admin/updateIftaToll', [IftaTollController::class, 'updateIftaToll']);
Route::post('admin/deleteIftaToll', [IftaTollController::class, 'deleteIftaToll']);
Route::post('admin/restoreIftaToll', [IftaTollController::class, 'restoreIftaToll']);
Route::post('admin/deleteMultiIftaToll', [IftaTollController::class, 'deleteMultiIftaToll']);

//Bank
Route::get('admin/getBankData', [BankController::class, 'getBankData']);
Route::post('admin/createBankData', [BankController::class, 'createBankData']);
Route::get('admin/editBankData', [BankController::class, 'editBankData']);
Route::post('admin/updateBankData', [BankController::class, 'updateBankData']);
Route::post('admin/deleteBankData', [BankController::class, 'deleteBankData']);
Route::get('admin/getCompanyHolder', [BankController::class, 'getCompanyHolder']);
Route::post('admin/CreateCompany', [BankController::class, 'CreateCompany']);
Route::post('admin/restoreBankData', [BankController::class, 'restoreBankData']);

//credit Card
Route::get('admin/getcreditCard', [CreditCardController::class, 'getcreditCard']);
Route::post('admin/storecreditCard', [CreditCardController::class, 'storecreditCard']);
Route::get('admin/editcreditCard', [CreditCardController::class, 'editcreditCard']);
Route::post('admin/updatecreditCard', [CreditCardController::class, 'updatecreditCard']);
Route::post('admin/deletecreditCard', [CreditCardController::class, 'deletecreditCard']);
Route::post('admin/restorecreditCard', [CreditCardController::class, 'restorecreditCard']);

//sub Credit Card
Route::get('admin/getsubCreditCard', [SubCreditCardController::class, 'getsubCreditCard']);
Route::post('admin/storesubCreditCard', [SubCreditCardController::class, 'storesubCreditCard']);
Route::get('admin/editsubCreditCard', [SubCreditCardController::class, 'editsubCreditCard']);
Route::post('admin/updatesubCreditCard', [SubCreditCardController::class, 'updatesubCreditCard']);
Route::post('admin/deletesubCreditCard', [SubCreditCardController::class, 'deletesubCreditCard']);
Route::post('admin/restoresubCreditCard', [SubCreditCardController::class, 'restoresubCreditCard']);

//Accounting Manager
Route::get('admin/getAccountDeliverdValue', [AccountManagerController::class, 'getAccountDeliverdValue']);
Route::get('admin/getAccountInvoiceValue', [AccountManagerController::class, 'getAccountInvoiceValue']);
Route::get('admin/getAccountCompletedValue', [AccountManagerController::class, 'getAccountCompletedValue']);
Route::post('admin/accountChangeStatus', [AccountManagerController::class, 'accountChangeStatus']);
Route::post('admin/DeleteaccountManger', [AccountManagerController::class, 'DeleteaccountManger']);

//Branch Office
Route::get('admin/getBranchOffice', [BranchOfficeController::class, 'getBranchOffice']);
Route::post('admin/addBranchOffice', [BranchOfficeController::class, 'addBranchOffice']);
Route::get('admin/editBranchOffice', [BranchOfficeController::class, 'editBranchOffice']);
Route::post('admin/updateBranchOffice', [BranchOfficeController::class, 'updateBranchOffice']);
Route::post('admin/deleteBranchOffice', [BranchOfficeController::class, 'deleteBranchOffice']);
Route::post('admin/restoreBranchOffice', [BranchOfficeController::class, 'restoreBranchOffice']);

//Trailer
Route::get('admin/getTrailer', [TrailerAdminAddController::class, 'getTrailer']);
Route::get('admin/Trailer', [TrailerAdminAddController::class, 'Trailer']);
Route::post('admin/addTrailer', [TrailerAdminAddController::class, 'addTrailerData']);
Route::get('admin/trailer_getTrailertype', [TrailerAdminAddController::class, 'trailer_getTrailertype']);
Route::post('admin/trailer_addTrailertype', [TrailerAdminAddController::class, 'trailer_addTrailertype']);
Route::get('admin/edit_trailer', [TrailerAdminAddController::class, 'edit_trailer']);
Route::post('admin/updateTrailer', [TrailerAdminAddController::class, 'updateTrailer']);
Route::post('admin/deleteTrailer', [TrailerAdminAddController::class, 'deleteTrailer']);
Route::post('admin/restoreTrailer', [TrailerAdminAddController::class, 'restoreTrailer']);

//Equipment Type
Route::get('admin/getEquipmentType', [EquipmentTypeController::class, 'getEquipmentType']);
Route::post('admin/addEquipmentType', [EquipmentTypeController::class, 'addEquipmentType']);
Route::post('admin/deleteEquipmentType', [EquipmentTypeController::class, 'deleteEquipmentType']);
Route::get('admin/editEquipmentType', [EquipmentTypeController::class, 'editEquipmentType']);
Route::post('admin/updateEquipmentType', [EquipmentTypeController::class, 'updateEquipmentType']);
Route::post('admin/restoreEquipmentType', [EquipmentTypeController::class, 'restoreEquipmentType']);

//Recurrence Category
Route::get('admin/getRecurrenceCategory', [RecurrenceCategoryController::class, 'getRecurrenceCategory']);
Route::post('admin/addRecurrenceCategory', [RecurrenceCategoryController::class, 'addRecurrenceCategory']);
Route::post('admin/deleteRecurrenceCategory', [RecurrenceCategoryController::class, 'deleteRecurrenceCategory']);
Route::get('admin/editRecurrenceCategory', [RecurrenceCategoryController::class, 'editRecurrenceCategory']);
Route::post('admin/updateRecurrenceCategory', [RecurrenceCategoryController::class, 'updateRecurrenceCategory']);
Route::post('admin/restoreRecurrenceCategory', [RecurrenceCategoryController::class, 'restoreRecurrenceCategory']);
Route::post('admin/adddriverRecurrence', [RecurrenceCategoryController::class, 'adddriverRecurrence']);
// Route::get('admin/getPlusRecurrence', [RecurrenceCategoryController::class, 'getPlusRecurrence']);

//Terms Conditions
Route::get('admin/getTermsConditions', [TermsConditionsController::class, 'getTermsConditions']);
Route::post('admin/addTermsConditions', [TermsConditionsController::class, 'addTermsConditions']);

//Truck & Trailer Make
Route::get('admin/getTruckTrailerMake', [TruckTrailerMakeController::class, 'getTruckTrailerMake']);
Route::post('admin/addTruckTrailer', [TruckTrailerMakeController::class, 'addTruckTrailer']);
Route::post('admin/deleteTruckTrailer', [TruckTrailerMakeController::class, 'deleteTruckTrailer']);
Route::get('admin/editTruckTrailer', [TruckTrailerMakeController::class, 'editTruckTrailer']);
Route::post('admin/updatetruckTrailer', [TruckTrailerMakeController::class, 'updatetruckTrailer']);
Route::post('admin/restoreTruckTrailer', [TruckTrailerMakeController::class, 'restoreTruckTrailer']);

//Load Type
Route::get('admin/getLoadType', [LoadController::class, 'getLoadType']);
Route::post('admin/addLoadType', [LoadController::class, 'addLoadType']);
Route::post('admin/deleteLoad', [LoadController::class, 'deleteLoad']);
Route::get('admin/editLoad', [LoadController::class, 'editLoad']);
Route::post('admin/updateLoad', [LoadController::class, 'updateLoad']);
Route::post('admin/restoreLoad', [LoadController::class, 'restoreLoad']);


//ExternalCarrierController
Route::get('admin/getExternalCarrier', [ExternalCarrierController::class, 'getExternalCarrier']);
Route::get('admin/getCarrier', [ExternalCarrierController::class, 'getCarrier']);
Route::post('admin/storeExternalCarrier', [ExternalCarrierController::class, 'storeExternalCarrier']);
Route::get('admin/editExternalCarrier', [ExternalCarrierController::class, 'editExternalCarrier']);
Route::post('admin/updateExternalCarrier', [ExternalCarrierController::class, 'updateExternalCarrier']);
Route::post('admin/deleteExternalCarrier', [ExternalCarrierController::class, 'deleteExternalCarrier']);
Route::post('admin/restoreExternalCarrier', [ExternalCarrierController::class, 'restoreExternalCarrier']);


Route::post('admin/export_fuelVendor', [FuelVendorController::class, 'export_fuelVendor']);