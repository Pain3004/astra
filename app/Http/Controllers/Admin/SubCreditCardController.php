<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCreditCard;
use App\Models\CreditCard;
use App\Models\CreditCardAdmin;
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
        $total_records = 0;
        $cursor = SubCreditCard::raw()->aggregate([
            ['$match' => ['companyID' => $companyID]],
            ['$project' => ['size' => ['$size' => ['$sub_credit']],
            ]]
        ]);
        foreach ($cursor as $v) {
            $total_records += (int)$v['size'];
        }
        $completedata = array();
        $partialdata = array();
        if(!empty($total_records)){

            $sub_one = CreditCardAdmin::raw()->aggregate([
                ['$match' => ['companyID' => $companyID]],
                ['$project' => ['admin_credit._id' => 1,'admin_credit.displayName'=>1]]
            ]);
            $cardHolder_Name = array();
            foreach ($sub_one as $value_1) {
                $bank = $value_1['admin_credit'];
                foreach ($bank as $row9) {
                    $company_id = $row9['_id'];
                    $cardHolder_Name[$company_id] = $row9['displayName'];
                }
            }
            $show1 =SubCreditCard::raw()->find(array('companyID' => $companyID));
            $c = 0;
            $arrData1 = "";
            foreach ($show1 as $row) {
                $mainID = $row;
            }
            $arrData1 = array(
                'mainID' => $mainID,
                'creditcard' => $cardHolder_Name,
            );
            $partialdata[]= $arrData1;
        }
        $completedata[] = $partialdata;
        $completedata[] = $total_records;
        echo json_encode($completedata);
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
