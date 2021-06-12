<table class="table table-bordered table-striped" id="html_table" width="100%">
    <thead>
    <tr>
        <th>شناسه</th>
        <th>عنوان دسته</th>
        <th>عنوان دسته والد</th>
        <th>تنظیمات</th>
    </tr>
    </thead>
    <tbody>

    @foreach($categories as $category)
        <tr style="">
            <td> {{ $category->id }} </td>
            <td> {{ $category->name }}</td>
            <td>
                @if($category->subcategories_id)
                    {{ category_name($categories,$category->subcategories_id) }}
                @else
                    دسته اصلی است.
                @endif
            </td>
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
    {{ $categories->render() }}
</div>

<?php

    function category_name($categories,$id)
    {
        $x = 0;
        $name = '';
        foreach ($categories as $category)
        {
            if ($category->id === $id)
                return $category->name;
        }
    }

?>