@extends('admin.layouts.master')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h5 style="margin-bottom: 0">
                        نمایش و مدیریت واحد های کالا
                    </h5>
                </div>
                <div class="col-sm-6">
                    <div style="float: left">
                        <button class="btn btn-dark" data-toggle="modal" data-target="#NewUnit">افزودن واحد جدید</button>
                    </div>
                </div>
            </div>


        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <input id="search" type="text" class="form-control" placeholder="جستجو در دسته ها...">
                </div>
            </div>
            <hr>
            <div class="row">

                <div class="col-sm-12" id="result">

                </div>

            </div>
        </div>

    </div>
    <div class="modal fade" id="NewUnit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">افزودن دسته بندی جدید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{url('admin/insertunit')}}">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <label class="col-form-label col-lg-3 col-sm-12">نام واحد</label>
                                <div class="col-lg-7 col-md-7 col-sm-12">
                                    <input type="text" class="form-control m-input" name="name" id="name"
                                           aria-describedby="emailHelp" placeholder="نام واحد را وارد نمایید">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: 10px">انصراف</button>
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
@section('title')
    مشاهده و مدیریت واحد ها
@endsection


@section('personalize_script')

    <script>
        fetch_data();
        $('#search').keyup(function () {
            fetch_data($('#search').val());
        });
        function fetch_data(search = '') {
            $.ajax({
                url : "{{url('admin/getunit')}}",
                method : "GET",
                data : {search:search},
                success: function (data) {
                    $('#result').html(data);
                }
            })
        }
        $(document).on('click','.pagination a',function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getCategories(page , $('#search').val(),$('#categories_status').children('option:selected').val())
        });
        function getCategories(page, search , categories_status) {
            var url = "{{url('admin/getunit?page=')}}"+page;
            $.ajax({
                type : 'get',
                url : url,
                data : {search:search , categories_status:categories_status}
            }).done(function (data) {
                $('#result').html(data);
            })
        }



    </script>
@endsection

@section('personalize_css')
@endsection