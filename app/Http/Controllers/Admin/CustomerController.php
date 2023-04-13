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
use App\Helpers\AppHelper;
use App\Models\Consignee;
use App\Models\User;
use App\Models\Factoring_company_add;
use Illuminate\Database\Eloquent\Collection;
use Auth;

class CustomerController extends Controller
{
    
    
    public function getCustomerData(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;
        $total_records = 0;
        $cursor = Customer::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['size' => ['$size' => ['$customer']],
            ]]
        ]);
        $totalarray = $cursor;
        $docarray = array();
        foreach ($cursor as $v) 
        {
            $docarray[] = array("size" => $v['size'], "id" => $v['_id']);
            $total_records += (int)$v['size'];
        }
        $completedata = array();
        $partialdata = array();
        $paginate = AppHelper::instance()->paginate($docarray);
        if (!empty($paginate[0][0][0])) 
        {
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
                $show1 = Customer::raw()->aggregate([
                    ['$match' => ["companyID" => $companyID, "_id" => $docid]],
                    ['$project' => ["companyID" => $companyID, "customer" => ['$slice' => ['$customer', $end, $start - $end]]]],
                    ['$project' => ["customer._id" => 1,"customer.counter" => 1, "customer.custName" => 1, "customer.custLocation" => 1, "customer.custZip" => 1, "customer.primaryContact" => 1,
                        "customer.custTelephone" => 1, "customer.custEmail" => 1,"customer.factoringCompany" => 1,"customer.currencySetting" => 1,"customer.paymentTerms" => 1,"customer.insertedTime" => 1,"customer.insertedUserId" => 1,
                        "customer.edit_by" => 1,"customer.edit_time" => 1,"customer.deleteStatus" => 1,"customer.deleteUser" => 1,"customer.deleteTime" => 1]]
                ]);
        
                $c = 0;
                $arrData1 = "";
                foreach ($show1 as $arrData11) 
                {
                    $arrData1 = $arrData11;
                }
               $arrData2 = array(
                    'arrData1' => $arrData1,
                );
                $partialdata[]= $arrData2;
            }
        }
        $completedata[] = $partialdata;
        $completedata[] = $paginate;
        $completedata[] = $total_records;
        echo json_encode($completedata);      
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
                            // 'companyID' => $companyID,
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
                           // 'companyID' => $companyID,
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
                           // 'companyID' => $companyID,
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
        $maxLength = 6500;
        $companyId = (int)Auth::user()->companyID;
        $docAvailable = AppHelper::instance()->checkDoc(Customer::raw(),$companyId,$maxLength);
        
        if($docAvailable != "No")
        {
            $info = (explode("^",$docAvailable));
            $docId = $info[1];
            $counter = $info[0];

            $cons = array(
                '_id' =>AppHelper::instance()->getAdminDocumentSequence($companyId, Customer::raw(),'customer',$docId),
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
                'currencySetting' => $request->customerCurrency,
                'paymentTerms' => $request->customerPaymentTerm,
                'creditLimit' => $request->customerCreditLimit,
                'salesRep' => $request->customerSalesRepresentative,
                'factoringCompany' => $request->customerBFactoringCompanySet,
                // 'factoringParent' => $request->factoring_parent,
                'federalID' => $request->customerFederalID,
                'workerComp' => $request->customerWorkerComp,
                'websiteURL' => $request->customerWebsiteURL,
                'internalNotes' => $request->customerInternalNotes,
                'MC' => $request->customerMc,
                'blacklisted' => $request->customerBlacklisted,
                'numberOninvoice' => $request->customerNumbersonInvoice,
                'asshipper' => $request->customerDuplicateShipper,
                'asconsignee' => $request->customerDuplicateConsignee,
                'customerRate' => $request->customerCustomerRate,
                'isBroker' => $request->customerIsBroker,
                'insertedTime' => time(),
                'insertedUserId' => Auth::user()->userName,
                'deleteStatus' => "NO",
                'deleteUser' => "",
                'deleteTime' => "",
            );
            Customer::raw()->updateOne(['companyID' => $companyId,'_id'=>(int)$docId], ['$push' => ['customer' => $cons]]);
            $cons['masterID'] = $docId;
            echo json_encode($cons);

        }
        else 
        {
            $id =AppHelper::instance()->getNextSequence("customer", $db);
            $this->setId($id);
            $cons = iterator_to_array($customer);
            Customer::raw()->insertOne($cons);
            $masterID = $cons['_id'];
            $cons["customer"][0]['masterID'] = $masterID;
            echo json_encode($cons["customer"][0]);
        }
    }
    public function edit_customer(Request $request)
    {
        $id=(int)$request->id;
        // dd($id);
        $email=$request->email;
        $companyID=(int)Auth::user()->companyID;
        $customerData=Customer::where("companyID",$companyID)->first();
        $cusomerArray=$customerData->customer;
        $arrayLength=count($cusomerArray);
       
        $i=0;
        $v=0;
       for ($i=0; $i<$arrayLength; $i++){
        if(isset($customerData->customer[$i]['_id']))
        {
             $ids=$customerData->customer[$i]['_id'];
            $ids=(array)$ids;
                foreach ($ids as $value){
                    if($value==$id){                      
                        $v=$i;
                        
                     }
                }
        }
           
       }
        $customerData->customer= $cusomerArray[$v];
        return response()->json($customerData); 
    }
    public function update_customer(Request $request)
    {

        $companyID=(int)Auth::user()->companyID;
        $id=(int)$request->id;
        $masterId=(int)$request->masterId;
        // dd($masterId);
        $customerData=Customer::raw()->updateOne(['companyID' => $companyID,'_id' => $masterId,'customer._id' => $id], 
            ['$set' => ['customer.$.custName' => $request->custName,
            'customer.$.custAddress' => $request->custAddress,
            'customer.$.custLocation' => $request->custLocation,
            'customer.$.custZip' => $request->custZip,
            'customer.$.BillingAddressChkbox' => $request->BillingAddressChkbox,
            'customer.$.billingAddress' => $request->billingAddress,
            'customer.$.billingLocation' => $request->billingLocation,
            'customer.$.billingZip' => $request->billingZip,
            'customer.$.primaryContact' => $request->primaryContact,
            'customer.$.custTelephone' => $request->custTelephone,
            'customer.$.custExt' => $request->custExt,
            'customer.$.custEmail' => $request->custEmail,
            'customer.$.custFax' => $request->custFax,
            'customer.$.billingContact' => $request->billingContact,
            'customer.$.billingEmail' => $request->billingEmail,
            'customer.$.billingTelephone' => $request->billingTelephone,
            'customer.$.billingExt' => $request->billingExt,
            'customer.$.URS' => $request->URS,
            'customer.$.MC' => $request->MC,
            'customer.$.blacklisted' => $request->blacklisted,
            'customer.$.isBroker' => $request->isBroker,
            // 'customer.$.DuplicateShipper' => $request->DuplicateShipper,
            // 'customer.$.currencySetting' => $request->currencySetting,
            'customer.$.paymentTerms' => $request->paymentTerms,
            'customer.$.creditLimit' => $request->creditLimit,
            'customer.$.salesRep' => $request->salesRep,
            'customer.$.factoringCompany' => $request->factoringCompany,
            'customer.$.federalID' => $request->federalID,
            'customer.$.workerComp' => $request->workerComp,
            'customer.$.websiteURL' => $request->websiteURL,
            'customer.$.customerRate' => $request->customerRate,
            'customer.$.numberOninvoice' => $request->numberOninvoice,
            'customer.$.internalNotes' => $request->internalNotes,
            'customer.$.edit_by' => Auth::user()->userName,
            'customer.$.edit_time' => time()
            ]]
        );
        // dd($customerData);
        if ($customerData==true) 
        {
            $arr = array('status' => 'success', 'message' => 'Customer Updated successfully.','statusCode' => 200); 
            return json_encode($arr);
        }
    }
    public function delete_customer(Request $request)
    {
        $id=(int)$request->id;
        $masterId=(int)$request->masterId;
        $companyID=(int)Auth::user()->companyID;
        $customerData=Customer::raw()->updateOne(['companyID' => $companyID,'_id' => $masterId,'customer._id' => $id], 
        ['$set' => ['customer.$.deleteStatus' => 'YES','customer.$.deleteUser' => Auth::user()->userName,'customer.$.deleteTime' => time()]]
        );
       if ($customerData==true) 
       {
           $arr = array('status' => 'success', 'message' => 'Customer deleted successfully.','statusCode' => 200); 
            return json_encode($arr);
       }
    }
    public function restoreCustomer(Request $request)
    {
        $cu_ids=$request->all_ids;
        $custID=(array)$request->custID;
        $companyID=(int)Auth::user()->companyID;
        // dd($custID);
        foreach($custID as $customer_id)
        {
            $customer_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $customer_id);
            $masterId=(int)$customer_id;
            $cu_ids= str_replace( array('[', ']'), ' ', $cu_ids);
            if(is_string($cu_ids))
            {
                $cu_ids=explode(",",$cu_ids);
            }
            foreach($cu_ids as $c_ids)
            {
                $c_ids= str_replace( array('"', ']' ), ' ', $c_ids);
                      
                // if($value==$c_ids)
                // {  
                    print($c_ids);                      
                    $customerData=Customer::raw()->updateOne(['companyID' => $companyID,'_id' => $masterId,'customer._id' => (int)$c_ids], 
                    ['$set' => ['customer.$.deleteStatus' => 'NO','customer.$.RestoreUser' => Auth::user()->userName,'customer.$.restoreTime' => time()]]
                    );
                // }
            }
            if ($customerData==true) {
                $arr = array('status' => 'success', 'message' => 'Customer Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
        // $dd($cu_ids);
        
    }
    // public function importExcel(Request $request)
    // {
    //     $data = $data11['exceldata'];
    //     $length = $data11['length'];
    //     $maxLength = $data11['maxLength'];
    //     $companyId = $companyID;

    //     $docAvailable = $mhelper->checkDoc(Customer::raw(),$companyId,$maxLength);
        
    //     if($docAvailable != "No")
    //     {
    //         $info = (explode("^",$docAvailable));
    //         $docId = $info[1];
    //         $counter = $info[0];

    //         $document = $mhelper->getDocument($data, $length, $maxLength, $counter);
    //         $p = $document['arrData'];
    //         $q = $document['lastarray'];
    //         Customer::raw()->updateOne(
    //             ['companyID' => $companyID, '_id' => (int)$docId],
    //             ['$push' => ['customer' => ['$each' => $p[0]]]]);

    //         Customer::raw()->updateOne(['companyID' => $companyID, '_id' => (int)$docId],
    //                 ['$inc' => ['counter' => (int)sizeof($p[0])]]);

    //         if(!empty($q[0]))
    //         {
    //             $y1 = sizeof($q[0]);
    //             for($b = 0; $b < $y1 ; $b++){
    //             $q[0][$b]['masterID'] = $docId;   
    //             }    
    //             $lid[] = $q[0];
    //         }
                    
    //         if((!empty($p[1])) && (!empty($q[1])))
    //         {
    //             $did = AppHelper::instance()->getNextSequence("customer", $db);
    //             Customer::raw()->insertOne(
    //                 array('_id' => $did,
    //                     'companyID' => $_SESSION['companyId'],
    //                     'counter' => (int)sizeof($p[1]),
    //                     'customer' => $p[1],
    //             ));
                        
    //             $y2 = sizeof($q[1]);
    //             for($b = 0; $b < $y2 ; $b++)
    //             {
    //                 $q[1][$b]['masterID'] = $did;   
    //             }    
    //             $lid[] = $q[1];          
    //         }   
    //         echo json_encode($lid);         
    //     }
    //     else
    //     {
    //         for ($i = 0; $i < sizeof($data); $i++) 
    //         {
    //             $data[$i]['_id'] = (int)$data[$i]['_id'];  
    //             $data[$i]['counter'] = (int) $data[$i]['counter']; 
    //         }
    //         $docid = AppHelper::instance()->getNextSequence("customer", $db);
    //         Customer::raw()->insertOne(
    //         array('_id' => $docid,
    //             'companyID' => $companyID,
    //             'counter' => (int)$length,
    //             'customer' => $data,
    //         ));
    //         $x = sizeof($data);
    //         if( $x > 100)
    //         {
    //             $lastentry[] = array_slice( $data, $x-100 ,$x );
    //         }
    //         else
    //         {
    //             $lastentry[] = $data;
    //         }
    //         $y = sizeof($lastentry[0]);
    //         for($b = 0; $b < $y ; $b++)
    //         {
    //             $lastentry[0][$b]['masterID'] = $docid;   
    //         }    
    //         $lid[] = $lastentry[0];
    //         echo json_encode($lid);  
    //     }
    // }
    public function exportCustomer(Request $request)
    {
    //     $companyID=(int)Auth::user()->companyID;
    //     $currency_data = Currency_add::raw()->find(['companyID' => $companyID]);
    //     foreach ($currency_data as $cd) 
    //     {
    //         $currency = $cd['currency'];
    //         $currencyType = array();
    //         foreach ($currency as $c) 
    //         {
    //             $currencyid = $c['_id'];
    //             $currencyType[$currencyid] = $c['currencyType'];
    //         }
    //     }

    //     $sales_data = User::raw()->find(['companyID' => $companyID]);
    //     $dispName = array();
    //     foreach ($sales_data as $cd)
    //     {
    //         $salesid = $cd['_id'];
    //         $dispName[$salesid] = $cd['userFirstName']." ".$cd['userLastName'];
    //     }

    //     $factoring_company = Factoring_company_add::raw()->find(['companyID' => $companyID]);
    //     foreach ($factoring_company as $fc) 
    //     {
    //         $factoring = $fc['factoring'];
    //         $factoringCompanyname = array();
    //         foreach ($factoring as $f) 
    //         {
    //             $factoringid = $f['_id'];
    //             $factoringCompanyname[$factoringid] = $f['factoringCompanyname'];
    //         }
    //     }

    //     $payment_terms_data = Payment_terms::raw()->find(['companyID' => $companyID]);
    //     foreach ($payment_terms_data as $ptd) 
    //     {
    //         $payment = $ptd['payment'];
    //         $paymentTerm = array();
    //         foreach ($payment as $pt) 
    //         {
    //             $paymentTermid = $pt['_id'];
    //             $paymentTerm[$paymentTermid] = $pt['paymentTerm'];
    //         }
    //     }
    //     $p[] = array("Customer Name","Address","Location","Zip","Billing Address","Location","Zip","Primary Contact","Telephone","Ext","Email","Fax","Billing Contact","Billing Email","Billing Telephone","Ext","URS","Currency Setting","Payment Terms","Credit Limit $","Sales Representative","Factoring Company","Federal ID","Worker's Comp","Website URL","Internal Notes","MC");
    //     $customer = Customer::raw()->find(['companyID' => $companyID]);
    //     foreach ($customer as $cust) 
    //     {
    //         $show = $cust['customer'];
    //         foreach ($show as $s) 
    //         {
    //             // dd($s);
    //             if ($s['currencySetting'] === null) 
    //             {
    //                 $currency = "NOT MENTION";
    //             }
    //             else 
    //             {
    //                 if(isset($currencyType[$s['currencySetting']]))
    //                 {
    //                     $currency = $currencyType[$s['currencySetting']];
    //                 }
                    
    //             }

    //             if ($s['paymentTerms'] === null) 
    //             {
    //                 $payment_Terms = "NOT MENTION";
    //             }
    //             else 
    //             {
    //                 if(isset($paymentTerm[$s['paymentTerms']]))
    //                 {
    //                     $payment_Terms = $paymentTerm[$s['paymentTerms']];
    //                 }
    //                 $payment_Terms="";
    //             }

    //             if ($s['factoringCompany'] === null) {
    //                 $factoringCompany = "NOT MENTION";
    //             }
    //             else 
    //             {
    //                 if(isset( $factoringCompanyname[$s['factoringCompany']]))
    //                 {
    //                     $factoringCompany = $factoringCompanyname[$s['factoringCompany']];
    //                 }
    //                 $factoringCompany="";
                   
    //             }

    //             if ($s['salesRep'] == null) 
    //             {
    //                 $dispnamedata = "NOT MENTION";
    //             }
    //             else 
    //             {
    //                 if(isset($dispName[$s['salesRep']]))
    //                 {
    //                     $dispnamedata = $dispName[$s['salesRep']];
    //                 }
    //                 $dispnamedata="";
                    
    //             }

    //             $p[] = array(
    //                 $s['custName'],$s['custAddress'],$s['custLocation'],$s['custZip'],
    //                 $s['billingAddress'],$s['billingLocation'],$s['billingZip'],$s['primaryContact'],
    //                 $s['custTelephone'],$s['custExt'],$s['custEmail'],$s['custFax'],
    //                 $s['billingContact'],$s['billingEmail'],$s['billingTelephone'],$s['billingExt'],
    //                 $s['URS'], $currency,$payment_Terms,$s['creditLimit'],
    //                 $dispnamedata,$factoringCompany,$s['federalID'],$s['workerComp'],
    //                 $s['websiteURL'],$s['internalNotes'],$s['MC']
    //             );
    //         }
    //     }
    //     if (sizeof($p) > 1) 
    //     {
    //         echo json_encode($p);
    //    }
    //    else
    //    {
    //         unset($p);
    //         $p = "";
    //         echo json_encode($p);
    //    }
    } 

}
