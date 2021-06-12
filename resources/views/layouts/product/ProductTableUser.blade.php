<table class="table border" id="tableMe">
    <thead>
    <tr class="text-center">
        <th class="border-right">کد کالا</th>
        <th class="border-right">نام کالا</th>
        <th class="border-right">مقدار</th>
        <th class="border-right">تاریخ انقضا</th>
        <th class="border-right">تنظیمات</th>
        <th class="border-right">وضعیت</th>
    </tr>
    </thead>
</table>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        $(function() {
            $('#tableMe').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! $listInfo["route"] !!}',
                columns: [
                    { data:'code', name: 'code'},
                    { data:'name', name: 'name' },
                    { data:'state', name: 'state' },
                    { data:'DT_RowData.data-expire',name:'expire',orderable:false,searchable:false },
                    { data:"setting",name:"setting",orderable:false,searchable:false},
                    { data:'state_block', name: 'state_block'}
                ]
            });
            $('input[type="search"]').addClass('form-control');
            $('input[type="search"]').attr("placeholder","جستجو...");
            $('select[name="tableme_length"]').addClass('rounded');
        });
        //dataTable
    });
</script>
<script src="{{ url('panel/js/settingColumnProductTableUser.js') }}" defer></script>