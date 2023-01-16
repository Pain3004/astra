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
use App\Http\Controllers\Admin\IftaTripController;
use App\Http\Controllers\Admin\PaymentReceiptController;
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

Route::get('/table', function () {
        return view('table');
    });

    Route::get('/admin/driverApplication2', function () {
        return view('layout.driver.driver_application_form2');
    });
    Route::get('/admin/driverApplication', function () {
        return view('driver_application_form');
    });
    // Route::get('profile', function () {
    //     return view('profile');
    // });

Auth::routes();

// UserController
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

// Login
Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('forgot-password', [AuthController::class, 'showForgetPasswordForm'])->name('forgot.password')->middleware('guest');
Route::post('post-forgot-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forgot.password.post'); 

// Driver
Route::get('admin/driver', [DriverController::class, 'getDriverData']);
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

//customer
Route::get('admin/customer', [CustomerController::class, 'getCustomerData']);
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

//factoringCompany
Route::get('admin/getCustomerBFactoringCompany', [CustomerController::class, 'getCustomerBFactoringCompany']);
Route::post('admin/factoringCompany', [CustomerController::class, 'addCustomerfactoringCompany']);
Route::get('admin/getFactCompany', [factCompanyController::class, 'getFactCompany']);

//company
Route::get('admin/company', [CompanyController::class, 'getCompanyData']);
Route::post('admin/addCompany', [CompanyController::class, 'addCompanyData']);
Route::get('admin/editCompany', [CompanyController::class, 'editCompanyData']);
Route::post('admin/updateCompany', [CompanyController::class, 'updateCompanyData']);
Route::post('admin/deleteCompany', [CompanyController::class, 'deleteCompany']);
Route::post('admin/updateUserCompany', [CompanyController::class, 'updateUserCompany']);

//truck
Route::get('admin/getTruck', [TruckController::class, 'getTruck']);
Route::get('admin/truck_getTrucktype', [TruckController::class, 'truck_getTrucktype']);
Route::post('admin/addTruck', [TruckController::class, 'addTruckData']);
Route::get('admin/edit_truck', [TruckController::class, 'edit_truck']);
Route::post('admin/update_truck', [TruckController::class, 'update_truck']);
Route::post('admin/delete_truck', [TruckController::class, 'delete_truck']);
Route::post('admin/restore_truck', [TruckController::class, 'restore_truck']);
Route::post('admin/create_truckType', [TruckController::class, 'create_truckType']);


//Shipper
Route::get('admin/getShipper', [ShipperController::class, 'getShipper']);

//consignee
Route::get('admin/getConsignee', [ConsigneeController::class, 'getConsignee']);

//FuelVendorController
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

//Fuel Receipt FuelReceiptController
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

//IftaTripController
Route::get('admin/getIftaTrip', [IftaTripController::class, 'getIftaTrip']);
Route::get('admin/editIftaTrip', [IftaTripController::class, 'editIftaTrip']);

//Bank
Route::get('admin/getBankData', [BankController::class, 'getBankData']);
Route::post('admin/createBankData', [BankController::class, 'createBankData']);
Route::get('admin/editBankData', [BankController::class, 'editBankData']);
Route::post('admin/updateBankData', [BankController::class, 'updateBankData']);
Route::post('admin/deleteBankData', [BankController::class, 'deleteBankData']);

//credit Card
Route::get('admin/getcreditCard', [CreditCardController::class, 'getcreditCard']);

//sub Credit Card
Route::get('admin/getsubCreditCard', [SubCreditCardController::class, 'getsubCreditCard']);

//Accounting Manager
Route::get('admin/getAccountDeliverdValue', [AccountManagerController::class, 'getAccountDeliverdValue']);
Route::get('admin/getAccountInvoiceValue', [AccountManagerController::class, 'getAccountInvoiceValue']);
Route::get('admin/getAccountCompletedValue', [AccountManagerController::class, 'getAccountCompletedValue']);

//Branch Office
Route::get('admin/getBranchOffice', [BranchOfficeController::class, 'getBranchOffice']);

//Trailer
Route::get('admin/getTrailer', [TrailerAdminAddController::class, 'getTrailer']);
Route::post('admin/addTrailer', [TrailerAdminAddController::class, 'addTrailerData']);
Route::get('admin/trailer_getTrailertype', [TrailerAdminAddController::class, 'trailer_getTrailertype']);
Route::post('admin/trailer_addTrailertype', [TrailerAdminAddController::class, 'trailer_addTrailertype']);
Route::get('admin/edit_trailer', [TrailerAdminAddController::class, 'edit_trailer']);
Route::post('admin/updateTrailer', [TrailerAdminAddController::class, 'updateTrailer']);
Route::post('admin/deleteTrailer', [TrailerAdminAddController::class, 'deleteTrailer']);

//Equipment Type
Route::get('admin/getEquipmentType', [EquipmentTypeController::class, 'getEquipmentType']);
Route::post('admin/addEquipmentType', [EquipmentTypeController::class, 'addEquipmentType']);

//Recurrence Category
Route::get('admin/getRecurrenceCategory', [RecurrenceCategoryController::class, 'getRecurrenceCategory']);
Route::post('admin/addRecurrenceCategory', [RecurrenceCategoryController::class, 'addRecurrenceCategory']);

//Terms Conditions
Route::get('admin/getTermsConditions', [TermsConditionsController::class, 'getTermsConditions']);
Route::post('admin/addTermsConditions', [TermsConditionsController::class, 'addTermsConditions']);

//Truck & Trailer Make
Route::get('admin/getTruckTrailerMake', [TruckTrailerMakeController::class, 'getTruckTrailerMake']);
Route::post('admin/addTruckTrailer', [TruckTrailerMakeController::class, 'addTruckTrailer']);

//Load Type
Route::get('admin/getLoaType', [LoadController::class, 'getLoaType']);
Route::post('admin/addLoadType', [LoadController::class, 'addLoadType']);

//PaymentReceiptController
Route::get('admin/getPaymentReceipt', [PaymentReceiptController::class, 'getPaymentReceipt']);