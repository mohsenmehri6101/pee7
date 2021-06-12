<table class="table table-bordered table-striped" id="html_table" width="100%">
    <thead>
    <tr>
        <th>شناسه</th>
        <th>عنوان دسته</th>

        <th>تنظیمات</th>
    </tr>
    </thead>

    <tbody>

    @foreach($units as $unit)
        <tr style="">
            <td> {{ $unit->id }} </td>
            <td> {{ $unit->name }}</td>
            
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

<div class="row" style="">
    {{ $units->render() }}
</div>

