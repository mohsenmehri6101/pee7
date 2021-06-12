@extends('supplier.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('supplier.agency.index') }}">نمایندگی ها</a></li>
@endsection

@section('title')
صفحه پشتیبان
@endsection

@section('content')
<!-- create clerk -->
<div class="card">
        <div class="card-header bg-light-gradient">
            <div class="row">
                <div class="float-right col-md-6 col-sm-6">
                    <h5>
                        نمایندگی های ثبت شده
                    </h5>
                </div>
                <div class="float-left col-md-6 col-sm-6">
                    <a type="button" class="float-left btn btn-success" href="{{ route('supplier.agency.create') }}">
                        معرفی نمایندگی جدید
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <input id="search" type="text" class="form-control" placeholder="جستجو ...">
                </div>
            </div>
            <br>
            <div class="row" id="result">
            </div>
        </div>
    </div>
</div>
@endsection

@section('personalize_script')
    <script>
        $(document).ready(function(){
            fetch_data();
            $('#search').keyup(function () {
                fetch_data($('#search').val(),$('#suppliers_status').children('option:selected').val());
            });
            function fetch_data(search = '') {
                $.ajax({
                    url : "{{ route('supplier.agency.search') }}",
                    method : "GET",
                    data : {search:search},
                    success: function (data){
                        $('#result').html(data);
                        console.log(data);
                    },
                })
            }
            $('body').on('click','.pagination a',function (event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                var search=$('#search').val();
                getAgencies(page,search);
            });
            function getAgencies(page,search) {
                $.ajax({
                    type : 'get',
                    url : "{{url('supplier/agency/search?page=')}}"+page,
                    data : {search:search}
                }).done(function (data) {
                    $('#result').html(data);
                })
            }
        });
        destroy=function (id) {
            document.getElementById(id+"_destroy").submit();
        }
    </script>
@endsection