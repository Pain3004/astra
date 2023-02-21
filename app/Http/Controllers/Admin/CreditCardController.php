<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreditCard;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class CreditCardController extends Controller
{
    public function getcreditCard(Request $request){
        $companyId=(int)1;
        $creditCard = CreditCardAdmin::where('companyID',$companyId)->get();
       //dd($bankData);
       return response()->json($creditCard, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
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
        $companyID=(int)1;
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
        $id=$request->id;
        $companyID=(int)$request->comId;
        $CreditCard = CreditCardAdmin::where('companyID',$companyID)->first();
        $CreditCardArray=$CreditCard->admin_credit;
        $cardLength=count($CreditCardArray);
        $i=0;
        $v=0;
        for($i=0; $i<$cardLength; $i++)
        {
            $ids=$CreditCard->admin_credit[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        $CreditCardArray[$v]['Name' ]= $request->Name;
        $CreditCardArray[$v]['displayName' ]= $request->displayName;
        $CreditCardArray[$v]['cardType' ]= $request->cardType;
        $CreditCardArray[$v]['cardHolderName' ]= $request->cardHolderName;
        $CreditCardArray[$v]['cardNo' ]= $request->cardNo;
        $CreditCardArray[$v]['openingBalanceDt' ]= $request->openingBalanceDt;
        $CreditCardArray[$v]['cardLimit' ]= $request->cardLimit;
        $CreditCardArray[$v]['openingBalance' ]= $request->openingBalance;
        $CreditCardArray[$v]['currentBalance' ]= '';
        $CreditCardArray[$v]['created_by' ]= Auth::user()->userFirstName;
        $CreditCardArray[$v]['created_time' ]= date('d-m-y h:i:s');
        $CreditCardArray[$v]['edit_by' ]=Auth::user()->userName;
        $CreditCardArray[$v]['edit_time' ]=time();
        $CreditCardArray[$v]['deleteStatus' ]="NO"; 
        $CreditCard->admin_credit=$CreditCardArray;
        if($CreditCard->save())
        {
         $arr = array('status' => 'success', 'message' => 'Credit Card Updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
    }
    public function deletecreditCard(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;
        $CreditCard = CreditCardAdmin::where('companyID',$companyID)->first();
        $CreditCardArray=$CreditCard->admin_credit;
        $cardLength=count($CreditCardArray);
        $i=0;
        $v=0;
        for($i=0; $i<$cardLength; $i++)
        {
            $ids=$CreditCard->admin_credit[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        $CreditCardArray[$v]['deleteStatus']="YES";
        $CreditCard->admin_credit=$CreditCardArray;
        if($CreditCard->save())
        {
         $arr = array('status' => 'success', 'message' => 'Credit Card delete successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
    }
    public function restorecreditCard(Request $request)
    {
        $cardIds=$request->all_ids;
        $custID=(array)$request->custID;
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
            //
            // dd($data);
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

   

    
}
