<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Traits\ProductTrait;

class ProductController extends Controller
{
    public function EditColumnState($state){
        if ($state == 0) return 'تمام شده';
        if ($state== 1) return 'موجود';
    }
    public function ShowProductUser()
    {
        $products=Product::where('user_id',auth()->user()->id)->whereDelete(0)->get();
        return Datatables::of($products)
            ->setRowClass('text font-italic')
            ->setRowId('{{$id}}_tr')
            ->setRowAttr(['align' => 'center'])
            ->editColumn('state', function ($products) {
                if ($products->state == 0) return 'تمام شده';
                if ($products->state == 1) return 'موجود';
            })
            ->editColumn('setting', 'layouts.product.SettingColumnUser')
            ->editColumn('state_block', 'layouts.product.SettingColumnUserBlock')
            ->rawColumns(['setting','state_block'])
            ->setRowData([
                'data-expire' => '{{verta($expire_date)->formatDifference() }}',
            ])
            ->make(true);
    }

    public function ShowProductAll()
    {
        $products=Product::whereDelete(0)->get();
        return Datatables::of($products)
            ->setRowClass('text font-italic')
            ->setRowId('{{$id}}_tr')
            ->setRowAttr(['align' => 'center'])
            ->editColumn('state', function ($products) {
                if ($products->state == 0) return 'تمام شده';
                if ($products->state == 1) return 'موجود';
            })
            ->setRowData([
                'data-expire' => '{{verta($expire_date)->formatDifference() }}',
            ])
            ->make(true);
    }
}