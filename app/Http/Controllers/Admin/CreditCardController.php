<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreditCardAdmin;
use MongoDB\BSON\Regex;
// use App\Models\excels\CreditCardExport;
use App\Models\Company;
use App\Models\Bank;
use App\Models\BankDebitCategory;
use App\Models\SubCreditCard;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;
use Excel;

use Illuminate\Database\Eloquent\Collection;

class CreditCardController extends Controller
{
    public function getcreditCard(Request $request)
    {
        $search_value="";
        $search_by="";
        if(isset($request->searchValue))
        {
            $search_value=$request->searchValue;
        }
        if(isset($request->search_by))
        {
            $search_by=$request->search_by;
        }
        // dd($search_by);
        $companyID=(int)Auth::user()->companyID;
        $total_records = 0;
        if($search_value !="")
        {
            $datasearch = new Regex('^' . $search_value, 'i');
            $search_data = ['$match' => ["admin_credit.displayName" => $datasearch]];
            $cursor = CreditCardAdmin::raw()->aggregate([
                        ['$match' => ["companyID" => $companyID]],
                        ['$unwind' => '$admin_credit'],
                        $search_data,
                        ['$limit' => 100]
                    ]);  
            // dd($cursor);
                 $completedata = array();
            $creditcardData = array();
            $arrData1 = array();
            // foreach ($cursor as $rw) {
                // $main = $rw['_id'];
                // $comId = $rw['companyID'];
                // $arrData1[] = $rw['admin_credit'];
                 $arrData1 = "";
                foreach ($cursor as $arrData11) 
                {
                    $arrData1 = $arrData11;
                }
                return $arrData1 = array(
                    'arrData1' => $arrData1,
                );
                
            // }
            // dd($arrData1);
            // if(!empty($main) && !empty($arrData1)){
            //     $creditcardData = array('_id' => $main,'companyID'=>$comId, 'admin_credit' => $arrData1);
            //     $arrData1 = array('arrData1' => $creditcardData);
            // }
            $completedata = (object)$arrData1;
            echo json_encode($completedata);
        }
        else
        {
            $cursor = CreditCardAdmin::raw()->aggregate([
                ['$match' => ['companyID' => $companyID]],
                ['$project' => ['size' => ['$size' => ['$admin_credit']],
                ]]
            ]);
            // dd($cursor);
            foreach ($cursor as $v) 
            {
                $total_records += (int)$v['size'];
            }
        // dd($total_records);
            $completedata = array();
            $partialdata = array();
            if(!empty($total_records))
            {
                // dd($total_records);
                $show1 =  CreditCardAdmin::raw()->find(array('companyID' => $companyID));
                $c = 0;
                $arrData1 = "";
                foreach ($show1 as $arrData11) 
                {
                    $arrData1 = $arrData11;
                }
                // dd($arrData1);
                return $arrData1 = array(
                    'arrData1' => $arrData1,
                );
            }
            // dd($arrData1);
            $completedata[] = $partialdata;
            $completedata[] = $total_records;
            dd(gettype($completedata));
            echo json_encode($completedata);
        }

    }
    public function storecreditCard(Request $request)
    {
        request()->validate([
            'Name' => 'required',
            'displayName' => 'required',
            'cardType' => 'required',
            'cardHolderName' => 'required',
            'openingBalance' => 'required',
        ]);
        $companyID=(int)Auth::user()->companyID;
        $CreditCard = CreditCardAdmin::where('companyID',$companyID)->get();
        foreach( $CreditCard as  $CreditCard_data)
        {
            if($CreditCard_data)
            {
                $CreditCardArray=$CreditCard_data->admin_credit;
                $ids=array();
                foreach( $CreditCardArray as $key=> $getCreditCard_data)
                {
                    $ids[]=$getCreditCard_data['_id'];
                }
                $ids=max($ids);
                $totalCreditCardArray=$ids+1;
            }
            else
            {
                $totalCreditCardArray=0; 
            }
            // dd($request->cardNo);
            $CreditCardData[]=array(    
                '_id' => $totalCreditCardArray,
                'Name' => $request->Name,
                'displayName' => $request->displayName,
                'cardType' => $request->cardType,
                'cardHolderName' => $request->cardHolderName,
                'cardNo' => $request->cardNo,
                'openingBalanceDt' => $request->openingBalanceDt,
                'cardLimit' => $request->cardLimit,
                'openingBalance' => $request->openingBalance,
                'currentBalance' => '',
                'counter' =>$totalCreditCardArray,
                'created_by' => Auth::user()->userFirstName,
                'created_time' => date('d-m-y h:i:s'),
                'edit_by' =>Auth::user()->userName,
                'edit_time' =>time(),
                'deleteStatus' =>"NO",                    
            ); 
            if($CreditCard_data)
            {                
                CreditCardAdmin::where(['companyID' =>$companyID])->update([
                'counter'=> $totalCreditCardArray+1,
                'admin_credit' =>array_merge($CreditCardArray,$CreditCardData) ,
                ]);
                $arrCreditCard = array('status' => 'success', 'message' => 'Credit Card added successfully.'); 
                return json_encode($arrCreditCard);
            }
            else
            {
                try
                {
                    if(CreditCardAdmin::create([
                        '_id' => 1,
                        'companyID' => $companyID,
                        'counter' => 1,
                        'admin_credit' => $CreditCardData,
                    ])) 
                    {
                        $arrCreditCard = array('status' => 'success', 'message' => 'Credit Card added successfully.'); 
                        return json_encode($arrCreditCard);
                    }
                }
                catch(\Exception $error)
                {
                    return $error->getMessage();
                }
            }
        }  
    }
    public function editcreditCard(Request $request)
    {
       $id=$request->id;
       $companyID=(int)$request->comId;
       $CreditCard = CreditCardAdmin::where('companyID',$companyID)->first();
    //    dd($CreditCard);
        $CreditCardArray=$CreditCard->admin_credit;
        $cardLength=count($CreditCardArray);
        $i=0;
        $v=0;
        for($i=0; $i<$cardLength; $i++)
        {
            $ids=$CreditCard->admin_credit[$i]['_id'];
            $ids=(array)$ids;
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }
        $companyID=array(
            "companyID"=>$companyID
        ) ;       
        $CreditCard=$CreditCard->admin_credit[$v];
        $CreditCard=array_merge($companyID,$CreditCard);
         return response()->json($CreditCard, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function updatecreditCard(Request $request)
    {
        $id=(int)$request->id;
        $companyID=(int)$request->comId;
        $CreditCardAdmin= CreditCardAdmin::raw()->updateOne(['companyID' => $companyID,'admin_credit._id' => $id], 
        ['$set' => 
        ['admin_credit.$.Name' => $request->Name,
        'admin_credit.$.displayName' => $request->displayName,
        'admin_credit.$.cardType' => $request->cardType,
        'admin_credit.$.cardHolderName' => $request->cardHolderName,
        'admin_credit.$.cardNo' => $request->cardNo,
        'admin_credit.$.openingBalanceDt' => strtotime($request->openingBalanceDt),
        'admin_credit.$.cardLimit' => $request->cardLimit,
        'admin_credit.$.openingBalance' => $request->openingBalance,
        'admin_credit.$.currentBalance' => $request->openingBalance,
        'admin_credit.$.edit_by' => Auth::user()->userName,
        'admin_credit.$.Name' => $request->Name,
        'admin_credit.$.deleteTime' => time()]]
        );
    }
    public function deletecreditCard(Request $request)
    {
        $id=(int)$request->id;
        $companyID=(int)$request->comId;
       $CreditCardAdmin= CreditCardAdmin::raw()->updateOne(['companyID' => $companyID,'admin_credit._id' => $id], 
        ['$set' => ['admin_credit.$.deleteStatus' => 'YES','admin_credit.$.deleteUser' => Auth::user()->userName,'admin_credit.$.deleteTime' => time()]]
        );

         if($CreditCardAdmin==true)
        {
         $arr = array('status' => 'success', 'message' => 'Credit Card  Deleted successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
     
    }
    public function restorecreditCard(Request $request)
    {
        $cardIds=$request->all_ids;
        $custID=(array)$request->custID;
        // dd($custID);
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $CreditCard = CreditCardAdmin::where('companyID',$company_id )->first();
            $CreditCardArray=$CreditCard->admin_credit;
            $arrayLength=count($CreditCardArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$CreditCard->admin_credit[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    $cardIds= str_replace( array('[', ']'), ' ', $cardIds);
                    if(is_string($cardIds))
                    {
                        $cardIds=explode(",",$cardIds);
                    }
                    foreach($cardIds as $credit_card_id)
                    {
                        $credit_card_id= str_replace( array('"', ']' ), ' ', $credit_card_id);
                        if($value==$credit_card_id)
                        {                        
                            $data[]=$i; 
                        }
                    }
                }
            }
            foreach($data as $row)
            {
                $CreditCardArray[$row]['deleteStatus'] = "NO";
                $CreditCard->admin_credit= $CreditCardArray;
                $save=$CreditCard->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Credit Card Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
      
    }
    public function export_Bank_Credit(Request $request)
    {
        $companyID=(int)Auth::user()->companyID;

        $p[] = array("Name of Bank","Name To Display ","Card Type ","Card Holder Name ","Card #","Opening Bal Dt ","Card Limit ","Opening Balance ");
                
        $b_credit = CreditCardAdmin::raw()->find(['companyID' => $companyID]);
        foreach ($b_credit as $bdebit) 
        {
            $bank_credit = $bdebit['admin_credit'];
            
            foreach ($bank_credit as $test) 
            {
                if($test['openingBalanceDt'] != null)
                {
                    $openingBalanceDt = date('m-d-Y',$test['openingBalanceDt']);
                }
                else
                {
                    $openingBalanceDt = "Not Mention";
                }
                $p[] = array(
                    $test['Name'],
                    $test['displayName'],
                    $test['cardType'],
                    $test['cardHolderName'],
                    $test['cardNo'],
                    $openingBalanceDt,
                    $test['cardLimit'],
                    $test['openingBalance'],
                    // $test['transacBalance'],
                );
            }
        }

        if (sizeof($p) > 1) 
        {
            echo json_encode($p);
        }
        else
        {
            unset($p);
            $p = "";
            echo json_encode($p);
        }
    }
    // public function searchCreditCard($db, $data, $helper)
    // {
    //     $companyID = (int)$_SESSION['companyId'];
    //     $search_by = $data['shipper_fields'];
    //     $search_value = $data['getoption'];
    //     $datasearch = new MongoDB\BSON\Regex('^' . $search_value, 'i');
    //     if ($search_by == 'shipperName') {
    //         $search_data = ['$match' => ["shipper.shipperName" => $datasearch]];
    //     } 
    //     // else if ($search_by == 'shipperAddress') {
    //     //     $search_data = ['$match' => ["shipper.shipperAddress" => $datasearch]];
    //     // } else if ($search_by == 'shipperLocation') {
    //     //     $search_data = ['$match' => ["shipper.shipperLocation" => $datasearch]];
    //     // } else if ($search_by == 'shipperPostal') {
    //     //     $search_data = ['$match' => ["shipper.shipperPostal" => $datasearch]];
    //     // } else if ($search_by == 'shipperContact') {
    //     //     $search_data = ['$match' => ["shipper.shipperContact" => $datasearch]];
    //     // } else if ($search_by == 'shipperEmail') {
    //     //     $search_data = ['$match' => ["shipper.shipperEmail" => $datasearch]];
    //     // } else if ($search_by == 'shipperTelephone') {
    //     //     $search_data = ['$match' => ["shipper.shipperTelephone" => $datasearch]];
    //     // } else if ($search_by == 'shipperExt') {
    //     //     $search_data = ['$match' => ["shipper.shipperExt" => $datasearch]];
    //     // } else if ($search_by == 'shipperTollFree') {
    //     //     $search_data = ['$match' => ["shipper.shipperTollFree" => $datasearch]];
    //     // } else if ($search_by == 'shipperFax') {
    //     //     $search_data = ['$match' => ["shipper.shipperFax" => $datasearch]];
    //     // } else if ($search_by == 'shipperShippingHours') {
    //     //     $search_data = ['$match' => ["shipper.shipperShippingHours" => $datasearch]];
    //     // } else if ($search_by == 'shipperAppointments') {
    //     //     $search_data = ['$match' => ["shipper.shipperAppointments" => $datasearch]];
    //     // } else if ($search_by == 'shipperIntersaction') {
    //     //     $search_data = ['$match' => ["shipper.shipperIntersaction" => $datasearch]];
    //     // } else if ($search_by == 'shipperStatus') {
    //     //     $search_data = ['$match' => ["shipper.shipperStatus" => $datasearch]];
    //     // } else if ($search_by == 'shippingNotes') {
    //     //     $search_data = ['$match' => ["shipper.shippingNotes" => $datasearch]];
    //     // } else if ($search_by == 'shipperAppointments') {
    //     //     $search_data = ['$match' => ["shipper.shipperAppointments" => $datasearch]];
    //     // }
    //     if (empty($search_value)) {
    //         $this->getTable($db,$data,$helper);
    //     } else {
    //         $show = $db->shipper->aggregate([
    //             ['$match' => ["companyID" => $companyID]],
    //             ['$unwind' => '$shipper'],
    //             $search_data,
    //             ['$limit' => 100]
    //         ]);
    //         $completedata = array();
    //         $shiptdata = array();
    //         $arrData1 = array();
    //         foreach ($show as $rw) {
    //             $main = $rw['_id'];
    //             $arrData1[] = $rw['shipper'];
    //         }
    //         if(!empty($main) && !empty($arrData1)){
    //             $shiptdata = array('_id' => $main, 'shipper' => $arrData1);
    //             $arrData1 = array('arrData1' => $shiptdata);
    //         }
    //         $completedata[][] = $arrData1;
    //         echo json_encode($completedata);
    //     }
    // }
    // // public function paginateShipper($db, $data)
    // // {
    // //     $privileges = json_decode($data['privilege']);
    // //     $companyID = (int)$data['companyId'];
    // //     $arr = json_decode($data['arr'],true);
    // //     $page_no = $data['page_no'];
    // //     $completedata = array();
    // //     $partialdata = array();
    // //     for($i = 0; $i < sizeof($arr); $i++){
    // //         $partialdata[] = $this->getData($db, $companyID,$arr[$i]['doc'],$arr[$i]['end'],$arr[$i]['start']);
    // //     }
    // //     $completedata[] = $partialdata;
    // //     $completedata[] = $page_no;
    // //     echo json_encode($completedata);
    // // }
    // public function CreditCardList($db, $data)
    // {
    //     $para = '^' . $data;
    //     $datasearch = new MongoDB\BSON\Regex($para, 'i');
    //     $show = $db->shipper->aggregate([
    //         ['$match' => ["companyID" => (int)$_SESSION['companyId']]],
    //         ['$unwind' => '$shipper'],
    //         ['$match' => ['shipper.shipperName' => $datasearch, 'shipper.shipperStatus' => "Active","shipper.deleteStatus"=>"NO"]],
    //         ['$project' => ['shipper._id' => 1, 'shipper.shipperName' => 1, 'shipper.shipperLocation' => 1, 'companyID' => (int)$_SESSION['companyId']]],
    //         ['$limit' => 100]
    //     ]);
    //     $shipper = array();
    //     $shipperList = array();
    //     foreach ($show as $s) {
    //         $q = 0;
    //         $shipper[$q] = $s['shipper'];
    //         $parent = $s['_id'];
    //         $q++;
    //         foreach ($shipper as $sr) {
    //             $shipperList[] = array("id" => $sr['_id'], "value" => $sr['shipperName'], "location" => $sr['shipperLocation'], "parent" => $parent);
    //         }
    //     }
    //     echo json_encode($shipperList);
    // } 
   

    
}
