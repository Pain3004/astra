<?php

namespace App\Models\excels;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;


class BankExport  implements FromCollection, WithMapping, WithHeadings 
{
    public function collection()

    {
        // $Product = Product::with('reviews', 'brand', 'stocks', 'user', 'user.shop','category','productcondition','productType')
        // ->leftJoin('warehouse','warehouse.id','=','products.warehouse_id')
        // ->leftJoin('users','users.id','=','products.supplier_id')
        // ->leftJoin('product_types','product_types.id','=','products.product_type_id')
        // ->leftJoin('brands','brands.id','=','products.brand_id')
        // ->leftJoin('product_stocks','products.id','=','product_stocks.product_id')
        // ->leftJoin('site_options','site_options.option_value','=','products.model')
        // ->leftJoin('productconditions','productconditions.id','=','products.productcondition_id')
        // ->leftJoin('categories','categories.id','=','products.category_id')
        // ->orderBy('products.id', 'DESC')
        // ->groupBy('products.id')
        // ->select('products.*','warehouse.name as warehouse_name','users.name as supplier_name','site_options.low_stock','memo_details.product_id','memo_details.item_status','product_types.listing_type','product_types.product_type_name','brands.name as brand_name','product_stocks.sku','product_stocks.qty','productconditions.name as productconditions_name','categories.name as categories_name','memo_details.memo_id as memosdetailId','memos.memo_number','retail_resellers.customer_group','retail_resellers.company','retail_resellers.customer_name')
        // ->leftJoin('memo_details','memo_details.product_id','=','products.id')
        // ->leftJoin('memos', 'memos.id', '=', 'memo_details.memo_id')
        // ->LeftJoin('retail_resellers', 'memos.customer_name', '=', 'retail_resellers.id')
        // ->whereIn('products.id',$this->ids)
        // ->get();

        // return $Product;

    }
}
