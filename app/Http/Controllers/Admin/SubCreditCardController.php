<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCreditCardAdmin;
use App\Models\CreditCard;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class SubCreditCardController extends Controller
{
    public function getsubCreditCard(Request $request){
        $companyID=(int)Auth::user()->companyID;
    //     $SubCreditCard = SubCreditCardAdmin::where('companyID',$companyId)->get(); 
    //     $CreditCard = CreditCardAdmin::where('companyID',$companyId)->get();  
    //    return response()->json(['SubCreditCard'=>$SubCreditCard, 'CreditCard'=>$CreditCard], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);




        // $collection = $db->driver;
        $show1 = SubCreditCardAdmin::raw()->aggregate([
            ['$lookup' => [
                'from' => 'credit_card_admin',
                'localField' => 'companyID',
                'foreignField' => 'companyID',
                'as' => 'subCreditCardDetails'
            ]],
            ['$match' => ['companyID' => $companyID]],
            ['$unwind' => '$driver'],
            ['$match' => ['sub_credit.mainCard' => 'admin_credit._id']],
        ]);
    
        foreach ($show1 as $row) {
            $id = $row['_id'];
            dd($id);
            $sub_credit_card[$id] = $row['sub_credit'];
            $driverDetails = $row['DriverDetail'];
            foreach ($driverDetails as $row3) {
                $currency = $row3['currency'];
                $currencyType = array();
                foreach ($currency as $c) {
                    $currencyId = $c['_id'];
                    $currencyType[$currencyId] = $c['currencyType'];
                }
            }
            foreach ($driver as $row2) {
                $row2['masterID'] = $id;
                if (empty($row2['dateOfbirth'])) {
                    $row2['dateOfbirth'] = '';
                } else {
                    $row2['dateOfbirth'] = date("Y-m-d", $row2['dateOfbirth']);
                }

                if (empty($row2['dateOfhire'])) {
                    $row2['dateOfhire'] = '';
                } else {
                    $row2['dateOfhire'] = date("Y-m-d", $row2['dateOfhire']);
                }

                if (empty($row2['driverLicenseExp'])) {
                    $row2['driverLicenseExp'] = '';
                } else {
                    $row2['driverLicenseExp'] = date("Y-m-d", $row2['driverLicenseExp']);
                }

                if (empty($row2['driverLastMedical'])) {
                    $row2['driverLastMedical'] = '';
                } else {
                    $row2['driverLastMedical'] = date("Y-m-d", $row2['driverLastMedical']);
                }

                if (empty($row2['driverNextMedical'])) {
                    $row2['driverNextMedical'] = '';
                } else {
                    $row2['driverNextMedical'] = date("Y-m-d", $row2['driverNextMedical']);
                }

                if (empty($row2['driverLastDrugTest'])) {
                    $row2['driverLastDrugTest'] = '';
                } else {
                    $row2['driverLastDrugTest'] = date("Y-m-d", $row2['driverLastDrugTest']);
                }

                if (empty($row2['driverNextDrugTest'])) {
                    $row2['driverNextDrugTest'] = '';
                } else {
                    $row2['driverNextDrugTest'] = date("Y-m-d", $row2['driverNextDrugTest']);
                }

                if (empty($row2['passportExpiry'])) {
                    $row2['passportExpiry'] = '';
                } else {
                    $row2['passportExpiry'] = date("Y-m-d", $row2['passportExpiry']);
                }

                if (empty($row2['fastCardExpiry'])) {
                    $row2['fastCardExpiry'] = '';
                } else {
                    $row2['fastCardExpiry'] = date("Y-m-d", $row2['fastCardExpiry']);
                }

                if (empty($row2['hazmatExpiry'])) {
                    $row2['hazmatExpiry'] = '';
                } else {
                    $row2['hazmatExpiry'] = date("Y-m-d", $row2['hazmatExpiry']);
                }

                if (empty($row2['terminationDate'])) {
                    $row2['terminationDate'] = '';
                } else {
                    $row2['terminationDate'] = date("Y-m-d", $row2['terminationDate']);
                }
                $row2['currencyID'] = $row2['currency'];
                $row2['currency'] = $currencyType[$row2['currency']];
                $i = 0;
                $j = 0;
                foreach ($row2['recurrenceSubtract'] as $subRecArr) {
                    $row2['installmentSub'][] = $subRecArr['installmentCategoryStore'];
                    $row2['installmentTypSub'][] = $subRecArr['installmentTypeStore'];
                    $row2['amountStoSub'][] = $subRecArr['amountStore'];
                    $row2['installmentStoSub'][] = $subRecArr['installmentStore'];
                    $row2['startNoStoSub'][] = $subRecArr['startNoStore'];
                    $row2['startDateStoSub'][] = date("Y-m-d",$subRecArr['startDateStore']);
                    $row2['internalNoteStoSub'][] = $subRecArr['internalNoteStore'];
                    $j++;
                }
                $row2['subRecLength'] = $j;

                foreach ($row2['recurrenceAdd'] as $addRecArr) {
                    $row2['installmentAdd'][] = $addRecArr['installmentCategoryStore'];
                    $row2['installmentTypAdd'][] = $addRecArr['installmentTypeStore'];
                    $row2['amountStoAdd'][] = $addRecArr['amountStore'];
                    $row2['installmentStoAdd'][] = $addRecArr['installmentStore'];
                    $row2['startNoStoAdd'][] = $addRecArr['startNoStore'];
                    $row2['startDateStoAdd'][] = date("Y-m-d",$addRecArr['startDateStore']);
                    $row2['internalNoteStoAdd'][] = $addRecArr['internalNoteStore'];
                    $i++;
                }
                $row2['addRecLength'] = $i;

                // send data to main function
                $r = $row2;
            }
        }
        echo json_encode($r);
    }
    public function storesubCreditCard(Request $request)
    {
        request()->validate([
            'displayName' => 'required',
            'mainCard' => 'required',
            'cardHolderName' => 'required',
        ]);
        $companyID=(int)1;
        $SubCreditCard = SubCreditCardAdmin::where('companyID',$companyID)->get();
        foreach( $SubCreditCard as  $SubCreditCard_data)
        {
            if($SubCreditCard_data)
            {
                $SubCreditCardArray=$SubCreditCard_data->sub_credit;
                $ids=array();
                foreach( $SubCreditCardArray as $key=> $getSubCreditCard_data)
                {
                    $ids[]=$getSubCreditCard_data['_id'];
                }
                $ids=max($ids);
                $totalSubCreditCardArray=$ids+1;
            }
            else
            {
                $totalSubCreditCardArray=0; 
            }
            // dd($request->cardNo);
            $SubCreditCardData[]=array(    
                '_id' => $totalSubCreditCardArray,
                'displayName' => $request->displayName,
                'mainCard' => $request->mainCard,
                'cardHolderName' => $request->cardHolderName,
                'cardNo' => $request->cardNo,
                'counter' =>$totalSubCreditCardArray,
                'created_by' => Auth::user()->userFirstName,
                'created_time' => date('d-m-y h:i:s'),
                'edit_by' =>Auth::user()->userName,
                'edit_time' =>time(),
                'deleteStatus' =>"NO",                    
            ); 
            if($SubCreditCard_data)
            {                
                SubCreditCardAdmin::where(['companyID' =>$companyID])->update([
                'counter'=> $totalSubCreditCardArray+1,
                'sub_credit' =>array_merge($SubCreditCardArray,$SubCreditCardData) ,
                ]);
                $arrSubCreditCard = array('status' => 'success', 'message' => 'Sub Credit Card added successfully.'); 
                return json_encode($arrSubCreditCard);
            }
            else
            {
                try
                {
                    if(SubCreditCardAdmin::create([
                        '_id' => 1,
                        'companyID' => $companyID,
                        'counter' => 1,
                        'sub_credit' => $SubCreditCardData,
                    ])) 
                    {
                        $arrSubCreditCard = array('status' => 'success', 'message' => 'Sub Credit Card added successfully.'); 
                        return json_encode($arrSubCreditCard);
                    }
                }
                catch(\Exception $error)
                {
                    return $error->getMessage();
                }
            }
        }  
    }
    public function editsubCreditCard(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;
        $SubCreditCard = SubCreditCardAdmin::where('companyID',$companyID)->first();
     //    dd($SubCreditCard);
         $SubCreditCardArray=$SubCreditCard->sub_credit;
         $cardLength=count($SubCreditCardArray);
         $i=0;
         $v=0;
         for($i=0; $i<$cardLength; $i++)
         {
             $ids=$SubCreditCard->sub_credit[$i]['_id'];
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
         $SubCreditCard=$SubCreditCard->sub_credit[$v];
         $SubCreditCard=array_merge($companyID,$SubCreditCard);
          return response()->json($SubCreditCard, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function updatesubCreditCard(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;
        $SubCreditCard = SubCreditCardAdmin::where('companyID',$companyID)->first();
        $SubCreditCardArray=$SubCreditCard->sub_credit;
        $cardLength=count($SubCreditCardArray);
        $i=0;
        $v=0;
        for($i=0; $i<$cardLength; $i++)
        {
            $ids=$SubCreditCard->sub_credit[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        } 
        $SubCreditCardArray[$v]['displayName' ]= $request->displayName;
        $SubCreditCardArray[$v]['mainCard' ]= $request->mainCard;
        $SubCreditCardArray[$v]['cardHolderName' ]= $request->cardHolderName;
        $SubCreditCardArray[$v]['cardNo' ]= $request->cardNo;
        $SubCreditCardArray[$v]['created_by' ]= Auth::user()->userFirstName;
        $SubCreditCardArray[$v]['created_time' ]= date('d-m-y h:i:s');
        $SubCreditCardArray[$v]['edit_by' ]=Auth::user()->userName;
        $SubCreditCardArray[$v]['edit_time' ]=time();
        $SubCreditCardArray[$v]['deleteStatus' ]="NO"; 
        $SubCreditCard->sub_credit=$SubCreditCardArray;
        if($SubCreditCard->save())
        {
         $arr = array('status' => 'success', 'message' => 'Sub Credit Card Updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
    }
    public function deletesubCreditCard(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;
        $SubCreditCard = SubCreditCardAdmin::where('companyID',$companyID)->first();
        $SubCreditCardArray=$SubCreditCard->sub_credit;
        $cardLength=count($SubCreditCardArray);
        $i=0;
        $v=0;
        for($i=0; $i<$cardLength; $i++)
        {
            $ids=$SubCreditCard->sub_credit[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        $SubCreditCardArray[$v]['deleteStatus']="YES";
        $SubCreditCard->sub_credit=$SubCreditCardArray;
        if($SubCreditCard->save())
        {
         $arr = array('status' => 'success', 'message' => 'Sub Credit Card delete successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
    }
    public function restoresubCreditCard(Request $request)
    {
        $cardIds=$request->all_ids;
        $custID=(array)$request->custID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $SubCreditCard = SubCreditCardAdmin::where('companyID',$company_id )->first();
            $SubCreditCardArray=$SubCreditCard->sub_credit;
            $arrayLength=count($SubCreditCardArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$SubCreditCard->sub_credit[$i]['_id'];
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
            //
            // dd($data);
            foreach($data as $row)
            {
                $SubCreditCardArray[$row]['deleteStatus'] = "NO";
                $SubCreditCard->sub_credit= $SubCreditCardArray;
                $save=$SubCreditCard->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Sub Credit Card Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
    }
    
}
