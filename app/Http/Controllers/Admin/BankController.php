<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Company;
use File;
use Image;
use MongoDB\BSON\ObjectId;
use Auth;
use PDF;

use Illuminate\Database\Eloquent\Collection;

class BankController extends Controller
{
    public function getBankData(Request $request){
        $companyId=(int)1;
        //$bankData = Bank::where('deleteStatus','NO')->get();
        $bankData = Bank::where('companyID',$companyId)->get();
       //dd($bankData);
       return response()->json($bankData, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function createBankData(Request $request)
    {
        $companyId=(int)1;
        $bankData=Bank::where('companyID',$companyId)->get();
        // dd($bankData);
        foreach( $bankData as  $bankData_data)
        {
            // dd($bankData_data);
            if($bankData_data)
            {
                $bankDataArray=$bankData_data->admin_bank;
                $ids=array();
                foreach( $bankDataArray as $key=> $admin_bank_id)
                {
                    $ids[]=$admin_bank_id['_id'];
                }
                $ids=max($ids);
                $totalbankDataArray=$ids+1;
            }
            else
            {
                $totalbankDataArray=0; 
            }
            $bankDataData[]=array(    
                '_id' => $totalbankDataArray,
                'bankName' => $request->bankName,
                'bankAddresss' => $request->bankAddresss,
                'accountHolder' => $request->accountHolder,
                'accountNo' => $request->accountNo,
                'routingNo'=>$request->routingNo,
                'openingBalDate'=>$request->openingBalDate,
                'openingBalance'=>$request->openingBalance,
                'currentcheqNo'=>$request->currentcheqNo,
                'currentBalance'=>$request->currentcheqNo,
                'counter' =>0,
                'created_by' => Auth::user()->userFirstName,
                'created_time' => date('d-m-y h:i:s'),
                'edit_by' =>Auth::user()->userName,
                'edit_time' =>time(),
                'deleteStatus' =>"NO",                    
            ); 
            // dd( $bankDataData);
            if($bankData_data)
            {                
                Bank::where(['companyID' =>$companyId])->update([
                'counter'=> $totalbankDataArray+1,
                'admin_bank' =>array_merge($bankDataArray,$bankDataData) ,
                ]);
                $arrbankData = array('status' => 'success', 'message' => 'Bank Details added successfully.'); 
                return json_encode($arrbankData);
            }
            else
            {
                try
                {
                    if(Bank::create([
                        '_id' => 1,
                        'companyID' => $companyID,
                        'counter' => 1,
                        'admin_bank' => $bankDataData,
                    ])) 
                    {
                        $arrbankData = array('status' => 'success', 'message' => 'Bank Details added successfully.'); 
                        return json_encode($arrbankData);
                    }
                }
                catch(\Exception $error)
                {
                    return $error->getMessage();
                }
            }
        }

    }
    public function editBankData(Request $request)
    {        
        $id=$request->bankId;
        $companyID=(int)$request->compID;
        $Bank = Bank::where('companyID',$companyID)->first();
        // dd($Bank );
        $BankArray=$Bank->admin_bank;
        $fuelLength=count($BankArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$Bank->admin_bank[$i]['_id'];
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
        $Bank=$Bank->admin_bank[$v];
        $Bank=array_merge($companyID,$Bank);
         return response()->json($Bank, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);

    }
    public function updateBankData(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->compID;
        $Bank = Bank::where('companyID',$companyID)->first();
        $BankArray=$Bank->admin_bank;
        $fuelLength=count($BankArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$Bank->admin_bank[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        $BankArray[$v][ 'bankName' ]= $request->bankName;
        $BankArray[$v][ 'bankAddresss' ]= $request->bankAddresss;
        $BankArray[$v][ 'accountHolder' ]= $request->accountHolder;
        $BankArray[$v][ 'accountNo' ]= $request->accountNo;
        $BankArray[$v][ 'routingNo']=$request->routingNo;
        $BankArray[$v][ 'openingBalDate']=$request->openingBalDate;
        $BankArray[$v][ 'openingBalance']=$request->openingBalance;
        $BankArray[$v][ 'currentcheqNo']=$request->currentcheqNo;
        $BankArray[$v][ 'currentBalance']=$request->currentcheqNo;
        $BankArray[$v][ 'counter' ]=0;
        $BankArray[$v][ 'created_by' ]= Auth::user()->userFirstName;
        $BankArray[$v][ 'created_time' ]= date('d-m-y h:i:s');
        $BankArray[$v][ 'edit_by' ]=Auth::user()->userName;
        $BankArray[$v][ 'edit_time' ]=time();
        $BankArray[$v][ 'deleteStatus' ]="NO";  
        $Bank->admin_bank=$BankArray;
        if($Bank->save())
        {
         $arr = array('status' => 'success', 'message' => 'Company Updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
        
    }
    public function deleteBankData(Request $request)
    {
        $id=$request->id;
        $companyID=(int)$request->compID;
        $Bank = Bank::where('companyID',$companyID)->first();
        $BankArray=$Bank->admin_bank;
        $fuelLength=count($BankArray);
        $i=0;
        $v=0;
        for($i=0; $i<$fuelLength; $i++)
        {
            $ids=$Bank->admin_bank[$i];
            foreach($ids as $value)
            {
                if($value==$id)
                {
                    $v=$i;
                }
            }
        }  
        $BankArray[$v]['deleteStatus']="YES";
        $Bank->admin_bank=$BankArray;
        if($Bank->save())
        {
         $arr = array('status' => 'success', 'message' => 'Company Updated successfully.','statusCode' => 200); 
         return json_encode($arr);
        } 
    }
    public function getCompanyHolder(Request $request)
    {
        $companyId=(int)1;
        $Company=Company::where('companyID',$companyId)->first();    
        return response()->json($Company, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }
    public function CreateCompany(Request $request)
    {
        request()->validate([
        ]);  
        $path = public_path().'/CompanyFiles'; 
        // dd($path);       
        if(!File::exists($path)) {
           
          File::makeDirectory($path, $mode = 0777, true, true);
          }
          $privilege=Auth::user()->privilege;
         
          try{
                if ($files = $request->file('file')) {
                    foreach ($request->file('file') as $file) {
                      $name =  time().rand(0,1000).$file->getClientOriginalName();
                      $filePath=$file->move(public_path().'/CompanyFiles/', $name);
                      $data[] = $name;
                      $size = File::size($filePath);
                      
                      $CompanyFiles[]=array(
                          'status' => 'company',
                          'filename' =>$name,
                          'originalname' => $file->getClientOriginalName(),
                          'filesize' =>$size ,
                          'targetfilepath' => "CompanyFiles/".$name,
                          'privilege' => $privilege,
                      );
                  }
                }
            }
           
          catch(\Exception $error){
              return $error->getMessage();
          } 
            
        try{
            $companyID=(int)1;
            $getCompanyData = Company::where('companyID',$companyID)->first();
                if($getCompanyData){
                    $CompanyArray=$getCompanyData->company;
                    $ids=array();
                    foreach( $CompanyArray as $key=> $get_comp)
                    {
                        $ids[]=$get_comp['_id'];
                    }
                    $ids=max($ids);
                    $totalCompanyArray=$ids+1;
                }else{
                    $totalCompanyArray=0; 
                }
                if(isset($CompanyFiles)){
                    $fileUpload=array($CompanyFiles);
                }else{
                    $fileUpload=array();
                }
            
            $CompanyData[]=array(    
                    '_id' => $totalCompanyArray,
                    'companyName'=>$request->companyName,
                    'shippingAddress'=>$request->shippingAddress,
                    'telephoneNo'=>$request->telephoneNo,
                    'faxNo'=>$request->faxNo,
                    'mcNo'=>$request->mcNo,
                    'usDotNo'=>$request->usDotNo,
                    'mailingAddress'=>$request->mailingAddress,
                    'factoringCompany'=>$request->factoringCompany,
                    'website'=>$request->website,
                    'addbankCompany'=>'',
                    'file' => $fileUpload,                   
                    'insertedTime' => time(),
                    'insertedUserId' =>Auth::user()->_id,
                    'deleteStatus' => "NO",
                    'edit_by' =>Auth::user()->userName,
                    'edit_time' =>'',
                        
                );
                if($getCompanyData){
                    $trailerArray=$getCompanyData->company;
                    Company::where(['companyID' =>$companyID ])->update([
                        'counter'=> $totalCompanyArray+1,
                        'company' =>array_merge($trailerArray,$CompanyData) ,
                    ]);

                    $data = [
                        'success' => true,
                        'message'=> 'Company added successfully'
                    ] ;
                    
                    return response()->json($data);
                }else{
                    if(Company::create([
                        '_id' => new ObjectId(),
                        'companyID' => $companyID,
                        'counter' => $totalCompanyArray+1,
                        'company' => $CompanyData,
                    ])) {
                        $data = [
                            'success' => true,
                            'message'=> 'company added successfully'
                            ] ;
                            return response()->json($data);
                    }
                }
        } 
        catch(\Exception $error){
            return $error->getMessage();
        }
    }
    public function restoreBankData(Request $request)
    {
        // echo "gfgfgfdg"; exit;
        $bankIds=$request->all_ids;
        $custID=(array)$request->custID;
        // dd($bankIds);
        foreach($custID as $company_id)
        {
            $company_id=str_replace( array( '\'', '"',
            ',' , ' " " ', '[', ']' ), ' ', $company_id);
            $company_id=(int)$company_id;
            $Bank = Bank::where('companyID',$company_id )->first();
            $BankArray=$Bank->admin_bank;
            $arrayLength=count($BankArray);         
            $i=0;
            $v=0;
            $data=array();
            for ($i=0; $i<$arrayLength; $i++){
                $ids=$Bank->admin_bank[$i]['_id'];
                $ids=(array)$ids;
                foreach ($ids as $value){
                    $bankIds= str_replace( array('[', ']'), ' ', $bankIds);
                    if(is_string($bankIds))
                    {
                        $bankIds=explode(",",$bankIds);
                    }
                    foreach($bankIds as $bank_d_ids)
                    {
                        $bank_d_ids= str_replace( array('"', ']' ), ' ', $bank_d_ids);
                        if($value==$bank_d_ids)
                        {                        
                            $data[]=$i; 
                        }
                    }
                }
            }
            // dd($data);
            foreach($data as $row)
            {
                $BankArray[$row]['deleteStatus'] = "NO";
                $Bank->admin_bank= $BankArray;
                $save=$Bank->save();
            }
            if (isset($save)) {
                $arr = array('status' => 'success', 'message' => 'Bank Restored successfully.','statusCode' => 200); 
            return json_encode($arr);
            }
        }
    }
   

    
}
