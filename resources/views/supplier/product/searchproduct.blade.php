<table class="table table-bordered table-striped" id="html_table" width="100%">
    <thead>
    <tr>
        <th>ردیف</th>
        <th>شناسه</th>
        <th>عنوان کالا</th>
        <th>برند کالا</th>
        <th>مقدار</th>
        <th>واحد کالا</th>
        <th>قیمت هر واحد</th>
        <th>شهر محل تحویل</th>
        <th>توضیحات تکمیلی</th>
        <th>تنظیمات</th>
    </tr>
    </thead>

    <tbody>
    @foreach($products as $product)
        <tr style="">
            <td>1</td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->brand }}</td>
            <td>{{ $product->amount }}</td>
            <td>{{ $product->unit_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $cities[$product->city_id - 1]->name }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <button type="button" class="btn btn-sm btn-accent m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="ویرایش">
                    <i class="la la-pencil"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger m-btn--air" data-container="body" data-toggle="m-tooltip" data-placement="bottom" title="" data-original-title="حذف">
                    <i class="la la-trash"></i>
                </button>
            </td>
    </tr>
    @endforeach

    </tbody>

</table>

<div class="row" style="text-align: center">
    {{$products->render()}}
</div>
