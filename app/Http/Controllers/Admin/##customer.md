##customer
-'edit' not working.

## Trailer
- 'License Plate', 'VIN' field is not fill in edit page.
- 'Plate Expiry', 'DOT Expiry Date', 'Activation Date', is not update in list after edited.
- 'upload file' in edit not show properly.
- show console error when 'delete'.
- 'restore' not working.

## Truck
-'Ownership','status' field is not fill in edit page.

## user
-'Company Name','Office' field is not fill in edit page.
- need to set 'restore' functionality.

## External Carrier
-in Add External Carrier 4th tab Add Equipment is not same as old website
-not proper validation so we can not add it.
-also issue in edit.









   public function editFactCompany(Request $request)
    {
        $id=$request->id;
        $companyID=(int)Auth::user()->companyID;
        $Factoring_company_add = Factoring_company_add::where('companyID',$companyID)->first();
        $Factoring_company_add=collect($Factoring_company_add->factoring);
        $Factoring_company_add = $Factoring_company_add->chunk(4);
        // dd($Factoring_company_add);
        $data=count($Factoring_company_add);
        // dd($data);
        $i=0;
        $v=0;
        for($j=0; $j<$data;$j++)
        {
            // $Factoring_company_addArray=$Factoring_company_add[$j]->factoring;
            // $facComLength=count($Factoring_company_addArray);
       
            // for($i=0; $i<$facComLength; $i++)
            // {
            foreach ($Factoring_company_add as $key=>$r)
            {
                // dd($Factoring_company_add[$j][$key]['_id']);
                $ids=$Factoring_company_add[$j][$key]['_id'];
                $ids=(array)$ids;
                // dd($ids);
                foreach($ids as $value)
                {
                    // dd($id);
                    if($value==$id)
                    {
                        $v=$key;
                    }
                    $companyID=array(
                        "companyID"=>$companyID
                    ) ;       
                    $Factoring_company_add=$Factoring_company_add[$j][$v];
                    $Factoring_company_add=array_merge($companyID,$Factoring_company_add);
                }
            }
        }
        dd($Factoring_company_add);
        // $companyID=array(
        //     "companyID"=>$companyID
        // ) ;       
        // $Factoring_company_add=$Factoring_company_add->factoring[$v];
        // $Factoring_company_add=array_merge($companyID,$Factoring_company_add);
         return response()->json($Factoring_company_add, 200, [], JSON_PARTIAL_OUTPUT_ON_ERROR);
    }