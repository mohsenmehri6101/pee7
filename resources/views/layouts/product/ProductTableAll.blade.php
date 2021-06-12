<table class="table border" id="tableMe">
    <thead>
    <tr class="text-center">
        <th class="border-right">کد کالا</th>
        <th class="border-right">نام کالا</th>
        <th class="border-right">وضعیت</th>
        <th class="border-right">تاریخ انقضا</th>
    </tr>
    </thead>
</table>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(){
        //let getScript=$.getScript("https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/dataTables.bootstrap.js");
        $(function() {
            $('#tableMe').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! $listInfo["route"] !!}',
                columns: [
                    { data:'code', name: 'code'},
                    { data:'name', name: 'name' },
                    { data:'state', name: 'state' },
                    { data:'DT_RowData.data-expire',name:'expire',orderable:false,searchable:false }
                ]
            });
            $('input[type="search"]').addClass('form-control');
            $('input[type="search"]').attr("placeholder","جستجو...");
            $('select[name="tableme_length"]').addClass('rounded');
        });
        //dataTable
    });
</script>