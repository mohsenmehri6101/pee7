<table class="table table-striped" id="html_table" width="100%">
    <thead>
    <tr>
        <th class="text-info font-weight-bold">شهرستان</th>
        <th class="text-info font-weight-bold">کد دفتر</th>
        <th class="text-info font-weight-bold">مدیریت</th>
        <th class="text-info font-weight-bold">شماره تلفن</th>
        <th class="text-info font-weight-bold text-center">تنظیمات</th>
    </tr>
    </thead>
    <tbody>
    @foreach($agencies as $agency)
        <tr>
            <td> {{ $agency->location->city }} </td>
            <td> {{ $agency->code_agency }} </td>
            <td> {{ $agency->management }} </td>
            <td> {{ $agency->contact->mobiles }} </td>
            <td class="text-center">
                <a href="{{ route('supplier.agency.edit',['agency'=>$agency]) }}" class="btn btn-sm bg-light-gradient border">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ route('supplier.agency.show',['agency'=>$agency]) }}" class="btn btn-sm bg-light-gradient border">
                    <i class="fa fa-info px-1"></i>
                </a>
                <button onclick="destroy({{ $agency->id }})" class="btn btn-sm bg-light-gradient border">
                    <i class="fa fa-trash"></i>
                </button>
                <form hidden id="{{$agency->id}}_destroy" class="btn btn-sm btn-outline-danger" action="{{ route('supplier.agency.destroy'  , ['id' =>$agency->id]) }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="row" style="text-align: center;">
    {{ $agencies->links() }}
</div>