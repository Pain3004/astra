<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Driver;
use App\Models\Currency_add;
use App\Models\Payment_terms;
use App\Models\Shipper;
use App\Models\Consignee;
use App\Models\Factoring_company_add;
use Illuminate\Database\Eloquent\Collection;
use Auth;

class CustomerController extends Controller
{
    
    
    public function getCustomerData(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $customer = Customer::where('companyID',$companyID )->first();
         $CustomerArray=$customer->customer;
        $customer= (array_chunk($CustomerArray,2));
         dd($customer);
        return response()->json($customer, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
       
    }

    public function getCustomerCurrency(Request $request){
        
        $companyIDForCustomer=(int)Auth::user()->companyID;
        $customerCurr = Currency_add::where('companyID',$companyIDForCustomer)->first();
       // dd($customerCurr);
        return response()->json($customerCurr, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function addCustomerCurrency(Request $request)
    {
         //dd($request);
        //$customerAdd = Customer::all();
   
        $companyIDForCurrency=(int)Auth::user()->companyID;
        $totalCurrencyArray=0;
        $getCompanyForCurrency = Currency_add::where('companyID',$companyIDForCurrency)->first();

        if($getCompanyForCurrency){
            $currencyArray=$getCompanyForCurrency->currency;
            $totalCurrencyArray=count($currencyArray);
        }
   
        $currencyData[]=array(    
                        '_id' => $totalCurrencyArray,
                        'counter' => 0,
                        'currencyType' => $request->currencyName,
                        'deleteStatus' => 'no',
                        'deleteUser' => '',
                        'deleteTime' => '',
                        );

            if($getCompanyForCurrency){
                
                Currency_add::where(['companyID' =>$companyIDForCurrency])->update([
                    'counter'=> $totalCurrencyArray+1,
                    'currency' =>array_merge($currencyArray,$currencyData) ,
                ]);

                $arrCurrency = array('status' => 'success', 'message' => 'Currency added successfully.'); 
                return json_encode($arrCurrency);
            }else{
                try{
                        if(Currency_add::create([
                            // 'companyID' => (int)$_SESSION['companyId'],
                            '_id' => 1,
                            'companyID' => $companyIDForCurrency,
                            'counter' => 1,
                            'currency' => $currencyData,
                        ])) {
                            $arrCurrency = array('status' => 'success', 'message' => 'Currency added successfully.'); 
                            return json_encode($arrCurrency);
                        }
                }
                catch(\Exception $error){
                    return $error->getMessage();
                }
            }

       
    }

    public function getCustomerPaymentTerms(Request $request)
    {
        $companyIDForCustomer=(int)Auth::user()->companyID;
        $customerPaymentterms = Payment_terms::where('companyID',$companyIDForCustomer)->first();
       // dd($customerCurr);
        return response()->json($customerPaymentterms, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function addCustomerPaymentTerms(Request $request)
    {
        //dd($request);
       $companyIDForPaymentTerms=(int)Auth::user()->companyID;

       //$customerAdd = Customer::all();
  
       $companyIDForPaymentTerms=1;
       $totalPaymentTermsArray=0;
       $getCompanyForPaymentTerms = Payment_terms::where('companyID',$companyIDForPaymentTerms)->first();

       if($getCompanyForPaymentTerms){
           $paymentTermsArray=$getCompanyForPaymentTerms->payment;
           $totalPaymentTermsArray=count($paymentTermsArray)+ 1;
       }
  
       $PaymentTermsData[]=array(    
                       '_id' => $totalPaymentTermsArray,
                       'paymentTerm' => $request->PaymentTermsName,
                       'paymentDays' => $request->NetDay,
                       'counter' => $totalPaymentTermsArray,
                       'created_by' => Auth::user()->userFirstName,
                       'deleteStatus' => 'NO',
                       'deleteUser' => '',
                       'deleteTime' => '',
                       );

           if($getCompanyForPaymentTerms){
               
            Payment_terms::where(['companyID' =>$companyIDForPaymentTerms])->update([
                   'counter'=> $totalPaymentTermsArray,
                   'payment' =>array_merge($paymentTermsArray,$PaymentTermsData),
               ]);

               $arrrPaymentTerms = array('status' => 'success', 'message' => 'Currency added successfully.'); 
               return json_encode($arrrPaymentTerms);
           }else{
               try{
                       if(Payment_terms::create([
                           // 'companyID' => (int)$_SESSION['companyId'],
                           '_id' => 1,
                           'companyID' => $companyIDForPaymentTerms,
                           'counter' => 1,
                           'payment' => $PaymentTermsData,
                       ])) {
                           $arrrPaymentTerms = array('status' => 'success', 'message' => 'Currency added successfully.'); 
                           return json_encode($arrrPaymentTerms);
                       }
               }
               catch(\Exception $error){
                   return $error->getMessage();
               }
           }

      
    }

    public function getCustomerBFactoringCompany(Request $request)
    {
        $companyIDForCustomer=(int)Auth::user()->companyID;;
        $customerBFactoringCompany = Factoring_company_add::where('companyID',$companyIDForCustomer)->first();
       // dd($customerCurr);
        return response()->json($customerBFactoringCompany, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function addCustomerfactoringCompany(Request $request)
    {
        //dd($request);
       //$companyIDForPaymentTerms=2;

       //$customerAdd = Customer::all();
  
       $companyID=(int)Auth::user()->companyID;
       $totalCustomerfactoringArray=0;
       $getCompanyForCustomerfactoring = Factoring_company_add::where('companyID',$companyID)->first();
           if($getCompanyForCustomerfactoring)
            {
                $CustomerfactoringArray=$getCompanyForCustomerfactoring->factoring;
                $ids=array();
                foreach( $CustomerfactoringArray as $key=> $getCarrierIds)
                {
                    $ids[]=$getCarrierIds['_id'];
                }
                $ids=max($ids);
                $totalCustomerfactoringArray=$ids+1;
            }
            else
            {
                $totalCustomerfactoringArray=0; 
            }
                // dd($totalCustomerfactoringArray);
       $CustomerfactoringData[]=array(    
            '_id' => $totalCustomerfactoringArray,
            'counter' => $totalCustomerfactoringArray,
            
            'factoringCompanyname' => $request->factoringCompanyName,
            'address' => $request->factoringCompanyAddress,
            'location' => $request->factoringCompanyLocation,
            'zip' => $request->factoringCompanyZip,
            'primaryContact' => $request->factoringCompanyPrimaryContact,
            'telephone' => $request->factoringCompanyPrimaryContactTelephone,
            'extFactoring' => $request->factoringCompanyPrimaryContactExt,
            'fax' => $request->factoringCompanyFax,

            'tollFree' => $request->factoringTollFree,
            'email' => $request->factoringCompanyContactEmail,
            
            'secondaryContact' => $request->factoringCompanySecondaryContact,
            'factoringtelephone' => $request->factoringCompanySecondaryContactTelephone,
            'ext' => $request->factoringCompanySecondaryContactExt,
            'currencySetting' => $request->factoringCompanycurrency,
            'paymentTerms' => $request->factoringCompanyPaymentTerms,
            'taxID' => $request->factoringCompanyTaxID,
            'internalNote' => $request->factoringCompanyInternalNotes,
            'insertedTime' => '',
            'insertedUserId' => '',

            'deleteStatus' => 'NO',
            'deleteUser' => '',
            'deleteTime' => '',
            );

           if($getCompanyForCustomerfactoring){
               
            Factoring_company_add::where(['companyID' =>$companyID])->update([
                   'counter'=> $totalCustomerfactoringArray,
                   'factoring' =>array_merge($CustomerfactoringArray,$CustomerfactoringData) ,
               ]);

               $arrrCustomerfactoring = array('status' => 'success', 'message' => ' added successfully.'); 
               return json_encode($arrrCustomerfactoring);
           }else{
               try{
                       if(Factoring_company_add::create([
                           // 'companyID' => (int)$_SESSION['companyId'],
                           '_id' => 1,
                           'companyID' => $companyID,
                           'counter' => 1,
                           'factoring' => $CustomerfactoringData,
                       ])) {
                           $arrrCustomerfactoring = array('status' => 'success', 'message' => 'added successfully.'); 
                           return json_encode($arrrCustomerfactoring);
                       }
               }
               catch(\Exception $error){
                   return $error->getMessage();
               }
           }

      
    }

    public function addCustomerData(Request $request)
    {
        request()->validate([
       
        ]);
   
        $companyIDForCustomer=(int)Auth::user()->companyID;
        $totalCustomerArray=0;
        $getCompanyForCustomer = Customer::where('companyID',$companyIDForCustomer)->first();

        if($getCompanyForCustomer){
            $CustomerArray=$getCompanyForCustomer->customer;
            $totalCustomerArray=count($CustomerArray)+ 1;
        }
        $customerData[]=array(    
                        '_id' => $totalCustomerArray ,
                        'counter' => 0,
                        'custName' => $request->customerName,
                        'custAddress' => $request->customerAddress,
                        'custLocation' => $request->customerLocation,
                        'custZip' => $request->customerZip,

                        'billingAddress' => $request->customerBillingAddress,

                        'billingLocation' => $request->customerBillingLocation,
                        'billingZip' => $request->customerBillingZip,
                        'primaryContact' => $request->customerPrimaryContact,
                        'custTelephone' => $request->customerTelephone,
                        'custExt' => $request->customerExt,
                        'custEmail' => $request->customerEmail,
                        'custFax' => $request->customerFax,
                        'billingContact' => $request->customerBillingContact,
                        'billingEmail' => $request->customerBillingEmail,
                        'billingTelephone' => $request->customerBillingTelephone,
                        'billingExt' => $request->customerBillingExt,
                        'URS' => $request->customerUrs,

                        // 'currencySetting' => $request->customerCurrency,
                        'paymentTerms' => $request->customerPaymentTerm,
                        'creditLimit' => $request->customerCreditLimit,
                        'salesRep' => $request->customerSalesRepresentative,
                        'factoringCompany' => $request->customerBFactoringCompanySet,
                        'factoringParent' => '',
                        'federalID' => $request->customerFederalID,
                        'workerComp' => $request->customerWorkerComp,
                        'websiteURL' => $request->customerWebsiteURL  ,
                        'internalNotes' => $request->customerInternalNotes  ,


                        'MC' => $request->customerMc  ,
                        'blacklisted' => $request->customerBlacklisted  ,
                        'numberOninvoice' => $request->customerNumbersonInvoice  ,
                        'asshipper' => $request->customerDuplicateShipper  ,
                        'asconsignee' => $request->customerDuplicateConsignee,

                         'customerRate' => $request->customerCustomerRate  ,
                        'isBroker' => $request->customerIsBroker,
                        'insertedTime' => '' ,
                        'insertedUserId' => '' ,
                        'deleteStatus' => 'NO' ,
                        'deleteUser' => '' ,
                        'deleteTime' => '' ,
                        'averagedays' =>'' ,
                        'totalloads' => '' ,

                        );
           
           
            if($getCompanyForCustomer){
                Customer::where(['companyID' =>$companyIDForCustomer])->update([
                    'counter'=> $totalCustomerArray,
                    'customer' =>array_merge($CustomerArray,$customerData) ,                    
                ]);
                if($request->customerDuplicateShipper=='on')
                {
                    $Shipper = Shipper::where('companyID',$companyIDForCustomer)->get();
                    foreach( $Shipper as  $Shipper_data)
                    {
                        if($Shipper_data)
                        {
                            $ShipperArray=$Shipper_data->shipper;
                            $ids=array();
                            foreach( $ShipperArray as $key=> $getFuelCard_data)
                            {
                                $ids[]=$getFuelCard_data['_id'];
                            }
                            $ids=max($ids);
                            $totalShipperArray=$ids+1;
                        }
                        else
                        {
                            $totalShipperArray=0; 
                        }
                        $ShipperData[]=array(    
                            '_id' => $totalShipperArray,
                            'shipperName' => $request->customerName,
                            'shipperAddress' => $request->customerAddress,
                            'shipperLocation' => $request->customerLocation,
                            'shipperPostal' => $request->customerZip,
                            'shipperContact' => $request->customerPrimaryContact,
                            'shipperEmail' => $request->customerEmail,
                            'shipperTelephone' => $request->customerTelephone,
                            'shipperExt' => $request->customerExt,
                            'shipperTollFree' => $request->customerTelephone,
                            'shipperFax' => $request->customerFax,
                            'shipperShippingHours' => "",
                            'shipperAppointments' => "",
                            'shipperIntersaction' => "",
                            'shipperStatus' =>"Shipper",
                            'shippingNotes' =>"",
                            'internalNotes' => $request->customerInternalNotes,
                            'counter' =>0,
                            'created_by' => Auth::user()->userFirstName,
                            'created_time' => date('d-m-y h:i:s'),
                            'edit_by' =>Auth::user()->userName,
                            'edit_time' =>time(),
                            'deleteStatus' =>"NO",                    
                        ); 
        
                        
                        if($Shipper_data)
                        {                
                            Shipper::where(['companyID' =>$companyIDForCustomer])->update([
                            'counter'=> $totalShipperArray+1,
                            'shipper' =>array_merge($ShipperArray,$ShipperData) ,
                            ]);
                            $arrShipper = array('status' => 'success', 'message' => 'Shipper added successfully.'); 
                            return json_encode($arrShipper);
                            if($request->customerDuplicateConsignee=="on")
                            {
                                $Consignee = Consignee::where('companyID',$companyIDForCustomer)->get();
                                foreach( $Consignee as  $Consignee_data)
                                {
                                    if($Consignee_data)
                                    {
                                        $ConsigneeArray=$Consignee_data->consignee;
                                        $ids=array();
                                        foreach( $ConsigneeArray as $key=> $getFuelCard_data)
                                        {
                                            $ids[]=$getFuelCard_data['_id'];
                                        }
                                        $ids=max($ids);
                                        $totalConsigneeArray=$ids+1;
                                    }
                                    else
                                    {
                                        $totalConsigneeArray=0; 
                                    }
                                    $ConsigneeData[]=array(    
                                        '_id' => $totalShipperArray,
                                        'consigneeName' => $request->customerName,
                                        'consigneeAddress' => $request->customerAddress,
                                        'consigneeLocation' => $request->customerLocation,
                                        'consigneePostal' => $request->customerZip,
                                        'consigneeContact' => $request->customerPrimaryContact,
                                        'consigneeEmail' => $request->customerEmail,
                                        'consigneeReceiving'=>'',
                                        'consigneeRecivingNote'=>'',
                                        'consigneeTelephone' => $request->customerTelephone,
                                        'consigneeExt' => $request->customerExt,
                                        'consigneeTollFree' => $request->customerTelephone,
                                        'consigneeFax' => $request->customerFax,
                                        'consigneeReceiving' => "",
                                        'consigneeAppointments' => "",
                                        'consigneeIntersaction' => "",
                                        'consigneeStatus' => "Consignee",
                                        'consigneeInternalNote' =>"",
                                        'internal_note' => $request->customerInternalNotes,
                                        'counter' =>0,
                                        'created_by' => Auth::user()->userFirstName,
                                        'created_time' => date('d-m-y h:i:s'),
                                        'edit_by' =>Auth::user()->userName,
                                        'edit_time' =>time(),
                                        'deleteStatus' =>"NO",                        
                                    ); 
                                    if($Consignee_data)
                                    {                
                                        Consignee::where(['companyID' =>$companyIDForCustomer])->update([
                                        'counter'=> $totalConsigneeArray+1,
                                        'consignee' =>array_merge($ConsigneeArray,$ConsigneeData) ,
                                        ]);
                                        $arrConsignee = array('status' => 'success', 'message' => 'Consignee added successfully.'); 
                                        return json_encode($arrConsignee);
                                    }
                                    else
                                    {
                                        try
                                        {
                                            if(Consignee::create([
                                                '_id' => 1,
                                                'companyID' => $companyIDForCustomer,
                                                'counter' => 1,
                                                'consignee' => $currencyData,
                                            ])) 
                                            {
                                                $arrConsignee = array('status' => 'success', 'message' => 'Consignee added successfully.'); 
                                                return json_encode($arrConsignee);
                                            }
                                        }
                                        catch(\Exception $error)
                                        {
                                            return $error->getMessage();
                                        }
                                    }
                                }  
                            }
                        }
                        else
                        {
                            try
                            {
                                if(Shipper::create([
                                    '_id' => 1,
                                    'companyID' => $companyIDForCustomer,
                                    'counter' => 1,
                                    'shipper' => $currencyData,
                                ])) 
                                {
                                    $arrShipper = array('status' => 'success', 'message' => 'Shipper added successfully.'); 
                                    return json_encode($arrShipper);
                                }
                            }
                            catch(\Exception $error)
                            {
                                return $error->getMessage();
                            }
                        }
                    } 
                }
                $arrCustome = array('status' => 'success', 'message' => 'Customer added successfully.'); 
                return json_encode($arrCustome);
            }else{
                // echo "o";
                try{
                   
                        if(Customer::create([
                            
                            // 'companyID' => (int)$_SESSION['companyId'],
                            '_id' => 1,
                            'companyID' => $companyIDForCustomer,
                            'counter' => 1,
                            'customer' => $customerData,
                            // 'user_type' => "user",
                            // 'deleteStatus' => 0,
                            // 'mode' => 'day',
                            // 'otp' => '',
                            // 'emailVerificationStatus' => 1,
                            
                        ])) {
                            $arrCustome = array('status' => 'success', 'message' => 'driver added successfully.'); 
                            return json_encode($arrCustome);
                        }
                }
                catch(\Exception $error){
                    return $error->getMessage();
                }
            }

        


        // $customer1 = Customer::all();
        // return response()->json($customer1, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function edit_customer(Request $request)
    {
        $id=$request->id;
        // dd($id);
        $email=$request->email;
        $companyID=(int)Auth::user()->companyID;
        $customerData=Customer::where("companyID",$companyID)->first();
        $cusomerArray=$customerData->customer;
        $arrayLength=count($cusomerArray);
       
        $i=0;
        $v=0;
        // $ids=[];
        // dd($customerData->customer[0]['custName']);
       for ($i=0; $i<$arrayLength; $i++){
        if(isset($customerData->customer[$i]['_id']))
        {
             $ids=$customerData->customer[$i]['_id'];
            // echo "<pre>";
            // print_r($ids);
            $ids=(array)$ids;
                foreach ($ids as $value){
                    // dd($value);
                    if($value==$id){                      
                        $v=$i;
                        
                     }
                }
        }
           
       }
        //    dd($ids);
            //    dd($v);
            //    dd($cusomerArray[$v]);
        $customerData->customer= $cusomerArray[$v];
        return response()->json($customerData); 
    }
    public function update_customer(Request $request)
    {
        request()->validate([
          
        ]);

        $companyID=(int)Auth::user()->companyID;
        $id=$request->id;

        $customerData = Customer::where('companyID',$companyID )->first();
        $customerArray=$customerData->customer;

        $arrayLengthUp=count($customerArray);
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLengthUp; $i++){
        if(isset($customerData->customer[$i]['_id'])){
                $ids=$customerData->customer[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    if($value==$id){
                        // dd($id);
                        $v=$i;
                     }
                }
            }
       }
            //    dd($request->workerComp);
       $customerArray[$v]['custName']=$request->custName;
       $customerArray[$v]['custAddress']=$request->custAddress;
       $customerArray[$v]['custLocation']=$request->custLocation;
       $customerArray[$v]['custZip']=$request->custZip;
       $customerArray[$v]['BillingAddressChkbox']=$request->BillingAddressChkbox;
       $customerArray[$v]['billingAddress']=$request->billingAddress;
       $customerArray[$v]['billingLocation']=$request->billingLocation;
       $customerArray[$v]['billingZip']=$request->billingZip;
       $customerArray[$v]['primaryContact']=$request->primaryContact;
       $customerArray[$v]['custTelephone']=$request->custTelephone;
       $customerArray[$v]['custExt']=$request->custExt;
       $customerArray[$v]['custEmail']=$request->custEmail;
       $customerArray[$v]['custFax']=$request->custFax;
       $customerArray[$v]['billingContact']=$request->billingContact;
       $customerArray[$v]['billingEmail']=$request->billingEmail;
       $customerArray[$v]['billingTelephone']=$request->billingTelephone;
       $customerArray[$v]['billingExt']=$request->billingExt;
       $customerArray[$v]['URS']=$request->URS;
       $customerArray[$v]['MC']=$request->MC;
       $customerArray[$v]['blacklisted']=$request->blacklisted;
       $customerArray[$v]['isBroker']=$request->isBroker;
    //    $customerArray[$v]['DuplicateShipper']=$request->DuplicateShipper;
    //    $customerArray[$v]['DuplicateConsignee']=$request->DuplicateConsignee;
    //    $customerArray[$v]['currencySetting']=$request->currencySetting;
       $customerArray[$v]['paymentTerms']=$request->paymentTerms;
       $customerArray[$v]['creditLimit']=$request->creditLimit;
       $customerArray[$v]['salesRep']=$request->salesRep;
       $customerArray[$v]['factoringCompany']=$request->factoringCompany;
       $customerArray[$v]['federalID']=$request->federalID;
       $customerArray[$v]['workerComp']=$request->workerComp;
       $customerArray[$v]['websiteURL']=$request->websiteURL;
       $customerArray[$v]['customerRate']=$request->customerRate;
       $customerArray[$v]['numberOninvoice']=$request->numberOninvoice;
       $customerArray[$v]['internalNotes']=$request->internalNotes;
            //    dd($request);
       $customerData->customer = $customerArray;
            //    dd( $customerData->customer);
       if($customerData->save()){
            $arr = array('status' => 'success', 'message' => 'Customer updated successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
    }
    public function delete_customer(Request $request)
    {
        $id=$request->id;
        // dd($id);
        $email=$request->email;
        $custID=(int)$request->custID;
        $customerData = Customer::where('companyID',$custID )->first();
        $customerArray=$customerData->customer;
        $arrayLength=count($customerArray);
        $i=0;
        $v=0;
        for ($i=0; $i<$arrayLength; $i++){
            $ids=$customerData->customer[$i];
            // $ids=(array)$ids;
            foreach ($ids as $value){
                if($value==$id){
                    $v=$id;
                    }
            }
       }
       $customerArray[$v]['deleteStatus'] = "YES";
       $customerData->customer= $customerArray;
       if ($customerData->save()) {
           $arr = array('status' => 'success', 'message' => 'Customer deleted successfully.','statusCode' => 200); 
       return json_encode($arr);
       }
    }
    public function restoreCustomer(Request $request)
    {
        $cu_ids=$request->all_ids;
        $custID=(array)$request->custID;
        // dd($custID);
        foreach($custID as $customer_id)
        {
            $customer_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $customer_id);
            $customer_id=(int)$customer_id;
            $customerData = Customer::where('companyID',$customer_id )->first();
            // dd($customerData);
            $customerArray=$customerData->customer;
            $arrayLength=count($customerArray);            
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$customerData->customer[$i];
                // $ids=(array)$ids;
                foreach ($ids as $value){
                //    print_r(gettype($cu_ids));

                    $cu_ids= str_replace( array('[', ']'), ' ', $cu_ids);
                    if(is_string($cu_ids))
                    {
                        $cu_ids=explode(",",$cu_ids);
                    }
                    // dd($cu_ids);
                    foreach($cu_ids as $c_ids)
                    {
                        $c_ids= str_replace( array('"', ']' ), ' ', $c_ids);
                        // echo "<p>". $c_ids ."  ".$value . "</p>";
                        // dd($c_ids);
                        if($value==$c_ids)
                        {                        
                            $data[]=$i; 
                            // print($v);
                        //    $v= explode(",",$v);
                        //    $data[]=$v;
                        //    print_r($data);
                        //    dd($v);
                        }
                    }
                }
            }
            // dd($data);
            // dd($arrayLength);
            // echo $v;
            // $rows=implode(" ,",$data);
            // dd($rows);
            foreach($data as $row)
            {
                // echo "<p>".$row. "</p>";
                $customerArray[$row]['deleteStatus'] = "NO";
                // dd( $customerArray[$row]);
                $customerData->customer= $customerArray;
                $save=$customerData->save();
            }
            if ($save) {
                $arr = array('status' => 'success', 'message' => 'Customer Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
        // $dd($cu_ids);
        
    }

}
