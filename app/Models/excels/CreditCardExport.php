<?php
namespace App\Models\excels;
use App\Models\CreditCardAdmin;
use Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CreditCardExport implements FromCollection, WithMapping, WithHeadings
{
    protected $ids,$proHeadingPush;
    function __construct($ids) {
        $this->ids = $ids;
      }

    public function collection()

    {

        $b_credit = CreditCardAdmin::raw()->find(['companyID' => (int)Auth::user()->companyID]);

        return $b_credit;

    }



    public function headings(): array

    {



        $proHeading= [
            'Name of Bank',
            'Name To Display',
            'Card Holder Name',
            'Card #',
            'Opening Bal Dt ',
            'Opening Balance',
            'Card Limit ',
        ];
        if(!empty($this->proHeadingPush)){
          $proHeading = array_merge($proHeading,$this->proHeadingPush);
        }
            return $proHeading;
    }



    /**

    * @var bCredit $b_credit

    */

    public function map($bCredit): array

    {
        dd($bCredit);
        foreach ($bCredit as $bdebit) 
        {
            dd($bCredit);
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
                // $p[] = array(
                //     $test['Name'],
                //     $test['displayName'],
                //     $test['cardType'],
                //     $test['cardHolderName'],
                //     $test['cardNo'],
                //         $openingBalanceDt,
                //     $test['cardLimit'],
                //     $test['openingBalance'],
                // );
            }
        }
            $returnProHeading = [
                $test['Name'],
                $test['displayName'],
                $test['cardType'],
                $test['cardHolderName'],
                $test['cardNo'],
                    $openingBalanceDt,
                $test['cardLimit'],
                $test['openingBalance'],

            ];

            $allRecCS = array();

            if(!empty($this->proHeadingPush)){

              foreach ($this->proHeadingPush as $key => $proHPvalue) {

                $allProCSD = $key;

                $allRecCS[] = $product->$allProCSD;

              }

              $returnProHeading = array_merge($returnProHeading,$allRecCS);

            }



        return $returnProHeading;

    }

}

