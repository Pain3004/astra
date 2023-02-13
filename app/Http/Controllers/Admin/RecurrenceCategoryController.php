<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecurrenceCategory;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;
use carbon\carbon;

use Illuminate\Database\Eloquent\Collection;

class RecurrenceCategoryController extends Controller
{
    public function getRecurrenceCategory(Request $request)
    {
        $companyId=1;
       $RecurrenceCategory = RecurrenceCategory::where('companyID',$companyId)->get();  //only for company id one
        //    $RecurrenceCategory = RecurrenceCategory::get();
       return response()->json(['RecurrenceCategory'=>$RecurrenceCategory], 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }

    public function addRecurrenceCategory(Request $request)
    {

        $companyID=1;
        $totalRecurrenceCategoryArray=0;
        $getCompany_RecurrenceCategory = RecurrenceCategory::where('companyID',$companyID)->first();

        if($getCompany_RecurrenceCategory){
            $RecurrenceCategory_Array=$getCompany_RecurrenceCategory->fixPay;
            $total_RecurrenceCategory_Array=count($RecurrenceCategory_Array)+ 1;
        }
  
        $RecurrenceCategory_Data[]=array(    
                       '_id' => count($RecurrenceCategory_Array),
                       'fixPayType' => $request->fixPayType_name,
                       'counter' => 0,
                       'created_by' => Auth::user()->userFirstName,
                       'deleteStatus' => 'NO',
                       'deleteUser' => '',
                       'deleteTime' => '',
                       );

        if($getCompany_RecurrenceCategory){
            RecurrenceCategory::where(['companyID' => $companyID])->update([
                'counter'=> $total_RecurrenceCategory_Array,
                'fixPay' =>array_merge($RecurrenceCategory_Array,$RecurrenceCategory_Data) ,
            ]);

            $arrr_RecurrenceCategory = array('status' => 'success', 'message' => 'Equipment Type added successfully.'); 
            return json_encode($arrr_RecurrenceCategory);
        }else{
            try{
                    if(RecurrenceCategory::create([
                        // 'companyID' => (int)$_SESSION['companyId'],
                        '_id' => 0,
                        'companyID' => $companyID,
                        'counter' => 1,
                        'fixPay' => $RecurrenceCategory_Data,
                    ])) {
                        $arrr_RecurrenceCategory = array('status' => 'success', 'message' => 'Equipment Type added successfully.'); 
                        return json_encode($arrr_RecurrenceCategory);
                    }
            }
            catch(\Exception $error){
                return $error->getMessage();
            }
        }

      
    }

    public function editRecurrenceCategory(Request $request){

        $id=$request->Id;
        $companyID=(int)$request->comID;

        $result = RecurrenceCategory::where('companyID',$companyID)->first();
        $Array=$result->fixPay;
        $len=count($Array);
        $i=0;
        $v=0;
        for($i=0; $i<$len; $i++)
        {
            $ids=$Array[$i]['_id'];
            if($ids==$id)
            {
                $v=$i;
            }
        }
        
        $companyID=array(
            "companyID"=>$companyID
        ) ;

        $EditData=$Array[$v];
        $dataArray=array_merge($companyID,$EditData);
        return response()->json($dataArray, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);

    }

    public function updateRecurrenceCategory(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->compID;

        $result = RecurrenceCategory::where('companyID',$companyID)->first();
        $Array=$result->fixPay;
        $len=count($Array);
        $i=0;
        $v=0;
        for($i=0; $i<$len; $i++)
        {
            $ids=$Array[$i]['_id'];
            if($ids==$id)
            {
                $v=$i;
            }
        }

        $Array[$v]['fixPayType']=$request->name;        
        $Array[$v]['edit_by']=Auth::user()->userFirstName.' '.Auth::user()->userLastName; 
        $Array[$v]['edit_time']=Carbon::now()->timestamp;

        $result->fixPay=$Array;
        // dd($FuelVendor->fuelCard);
        if($result->save())
        {
         $arr = array('status' => 'success', 'message' => 'Recurrence Category updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }

    public function deleteRecurrenceCategory(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->comId;

        $result = RecurrenceCategory::where('companyID',$companyID)->first();
        $Array=$result->fixPay;
        $len=count($Array);
        $i=0;
        $v=0;
        for($i=0; $i<$len; $i++)
        {
            $ids=$Array[$i]['_id'];
            if($ids==$id)
            {
                $v=$i;
            }
        }

        $Array[$v]['deleteStatus']="Yes";  
        $Array[$v]['deleteUser']=Auth::user()->userFirstName.' '.Auth::user()->userLastName; 
        $Array[$v]['deleteTime']=strtotime(date('d-m-y h:i:s'));       
        
        $result->fixPay=$Array;
        // dd($FuelVendor->fuelCard);
        if($result->save())
        {
         $arr = array('status' => 'success', 'message' => 'Recurrence Category Deleted successfully.','statusCode' => 200); 
         return json_encode($arr);
        }
    }
    
    public function restoreRecurrenceCategory(Request $request)
    {
        //dd($request);
        $cardIds=$request->all_ids;
        $custID=(array)$request->custID;
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $RecurrenceCategory = RecurrenceCategory::where('companyID',$company_id )->first();
            $RecurrenceCategoryArray=$RecurrenceCategory->fixPay;
            $arrayLength=count($RecurrenceCategoryArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$RecurrenceCategory->fixPay[$i]['_id'];
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
                $RecurrenceCategoryArray[$row]['deleteStatus'] = "NO";
                $RecurrenceCategory->fixPay= $RecurrenceCategoryArray;
                $save=$RecurrenceCategory->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Recurrence Category Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
    }

    // public function adddriverRecurrence(Request $request){
            
    //         $unserializeData = [];
    //         parse_str($request->data,$unserializeData);

    //         if(isset($unserializeData['rec_PlusRecurrence'])){
    //             foreach($unserializeData['rec_PlusRecurrence'] as $key => $val){
                
    //                 $i_cate=$unserializeData['rec_PlusRecurrence'][$key];
    //                 $i_type=$unserializeData['rec_installmentType'][$key];
    //                 $amount=$unserializeData['rec_amount'][$key];
    //                 $installment=$unserializeData['rec_installment'][$key];
    //                 $startNo=$unserializeData['rec_startNo'][$key];
    //                 $startDate=$unserializeData['rec_startDate'][$key];
    //                 $internalNote=$unserializeData['rec_internalNote'][$key]; 
        
    //                 $array[]=((object)[
    //                     '_id'=>$key,
    //                     'installmentCategory'=>$i_cate,
    //                     'installmentType'=>$i_type,
    //                     'amount'=>$amount,
    //                     'installment'=>$installment,
    //                     'startNo'=>$startNo,
    //                     'startDate'=>strtotime($startDate),
    //                     'internalNote'=>$internalNote,
    //                 ]);        
    //             }
    //         }else{
    //             $array=array();
    //         }

    //         dd($array);
    


    // }
}
