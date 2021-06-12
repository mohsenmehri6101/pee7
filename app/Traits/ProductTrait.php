<?php

namespace App\Traits;
trait ProductTrait
{
    public function ShowProductAll(){
    }
    public function ShowProductUser()
    {
        $products=Product::where('user_id',auth()->user()->id)->get();
        return Datatables::of($products)
            ->setRowClass('text font-italic')
            ->setRowId('{{$id}}_tr')
            ->setRowAttr(['align' => 'center'])
            ->editColumn('state', function ($products) {
                if ($products->state == 0) return 'تمام شده';
                if ($products->state == 1) return 'موجود';
            })
            ->addColumn('code', 'p{{$id}}u{{ $user_id}}')
            ->editColumn('setting', 'supplier.product.yajra.settings_column')
            ->rawColumns(['setting'])
            ->setRowData([
                'data-expire' => '{{verta($expire_date)->formatDifference() }}',
            ])
            ->make(true);
    }
}
