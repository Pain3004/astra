<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCreditCard;
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
        $companyId=1;
        $SubCreditCard = SubCreditCard::where('companyID',$companyId)->get();  //only for company id one
        $CreditCard = CreditCard::where('companyID',$companyId)->get();  //only for company id one
        // $SubCreditCard = SubCreditCard::get();
        // $CreditCard = CreditCard::get();
       //dd($bankData);
       return response()->json(['SubCreditCard'=>$SubCreditCard, 'CreditCard'=>$CreditCard], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function storesubCreditCard(Request $request)
    {
        request()->validate([
            'displayName' => 'required',
            'mainCard' => 'required',
            'cardHolderName' => 'required',
        ]);
        $companyID=(int)1;
        $SubCreditCard = SubCreditCard::where('companyID',$companyID)->get();
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
                SubCreditCard::where(['companyID' =>$companyID])->update([
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
                    if(SubCreditCard::create([
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
        $SubCreditCard = SubCreditCard::where('companyID',$companyID)->first();
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
        $SubCreditCard = SubCreditCard::where('companyID',$companyID)->first();
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
        $SubCreditCard = SubCreditCard::where('companyID',$companyID)->first();
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
            $SubCreditCard = SubCreditCard::where('companyID',$company_id )->first();
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
