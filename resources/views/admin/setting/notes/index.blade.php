@extends('admin.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.setting.note.index') }}">مقاله های ثبت شده</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.index') }}">تنظیمات سایت</a></li>
@endsection

@section('title')
    مقاله های ثبت شده
@endsection

@section('content')
<section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">مقاله های ثبت شده</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <a href="{{ route('admin.setting.note.create') }}" class="btn bg-light-gradient border ml-1">ایجاد مقاله</a>
                                <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover bg-se">
                            <tbody>
                            <tr class="bg-secondary-gradient">
                                <th>عنوان</th>
                                <th>تاریخ ایجاد</th>
                                <th>نویسنده</th>
                                <th>
                                    وضعیت
                                    <a style="cursor: pointer !important;" data-toggle="modal" data-target="#explain_status">
                                        <span class="badge badge-info">
                                        توضیح
                                    </span>
                                    </a>
                                </th>
                                <th>تنظیمات</th>
                            </tr>
                            @foreach($notes as $note)
                                <tr>
                                    <td>
                                        {{ $note->title }}
                                    </td>
                                    <td>
                                        <?php $v = new \Hekmatinasser\Verta\Verta($note->created_at);?>
                                        {!! $v->formatDifference(); !!}
                                    </td>
                                    <td>
                                        {{ $note->user->name }}
                                    </td>
                                    <td>
                                        {{--<a id="link_{{$note->id}}" onclick="active_inactive({{ $note->id }})" data-toggle="tooltip" data-placement="right" title="active/inactive">--}}
                                        <a style="cursor:pointer !important;" id="link_{{$note->id}}" onclick="active_inactive({{ $note->id }})">
                                            <span id="span_{{$note->id}}" class="px-2 px-1 badge {{ $note->status==1 ? 'badge-success' : 'badge-danger' }}">
                                                {{ $note->status==1 ? 'فعال' : 'غیرفعال' }}
                                            </span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.setting.note.edit',['note'=>$note]) }}" class="btn btn-sm bg-light-gradient border">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.setting.note.show',['note'=>$note]) }}" class="btn btn-sm bg-light-gradient border">
                                            <i class="fa fa-info px-1"></i>
                                        </a>
                                        <button onclick="destroy({{ $note->id }})" class="btn btn-sm bg-light-gradient border">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <form hidden id="{{$note->id}}_destroy" class="btn btn-sm btn-outline-danger" action="{{ route('admin.setting.note.destroy'  , ['id' => $note->id]) }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    <div class="row">
        <div class="col">
            {{ $notes->render() }}
        </div>
    </div>
</section>
@endsection

@section('personalize_script')
    <div class="modal fade" id="explain_status">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close float-left" data-dismiss="modal">&times;</button>
                    <br>
                    <hr>
                    <p>
                        فعال : به معنی نمایش یادداشت میباشد.
                    </p>
                    <p>
                        غیر فعال : به معنی عدم نمایش یادداشت میباشد.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        var i=1;
        plus=function(){
            i=i+1;
        }
        destroy=function (id) {
            document.getElementById(id+"_destroy").submit();
        }
    </script>
    <script>
        active_inactive=function(id){
            $.ajax({
                method:"get",
                url:"{{route('admin.setting.note.status')}}",
                data:{id:id},
                success:function(data){
                    console.log(data.status);
                    if(data.status==1)
                    {
                        //1 active
                        $('#span_'+id).text("فعال");
                        //$('#link_'+id).attr('title','active');
                        $('#span_'+id).removeClass( "badge-danger" ).addClass( "badge-success" );
                    }
                    else if(data.status==0)
                    {
                        // 0 inactive
                        $('#span_'+id).text("غیرفعال");
                        //$('#link_'+id).attr('title','inactive');
                        $('#span_'+id).removeClass( " badge-success" ).addClass( "badge-danger" );
                    }
                }
            })
        }
        $( document ).ready(function()
        {
        });
    </script>
@endsection

@section('personalize_css')
@endsection