@extends('admin.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.setting.note.show',['note'=>$note]) }}" >{{ $note->title }}</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.note.index') }}">مقاله های ثبت شده</a></li>
    <li class="breadcrumb-item"><a class="text-secondary" href="{{ route('admin.setting.index') }}">تنظیمات سایت</a></li>
@endsection

@section('title')
    {{ $note->title }}
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col">
                <h2 class="mb-5 float-right">{{ $note->title }}</h2>
                <a href="{{ route('admin.setting.note.edit',['note'=>$note]) }}" class="btn  float-left">
                    <span class="fa fa-edit"></span>
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col">
                        @if($note->image)
                            <a target="_blank" class="my-4" href="{{ url('images/'.$note->image) }}">
                                <img class="rounded border" width="300" height="auto" src="{{ url('images/'.$note->image) }}" alt="">
                            </a>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text text-justify my-4">
                            {!! $note->text !!}
                        </div>
                    </div>
                </div>
                @if($note->images)
                <div class="bg-light-gradient text-center    p-3 border">
                    <div class="row">
                        @foreach($note->images as $image)
                            <div class="col">
                                <div class="thumbnail">
                                    <a target="_blank" class="my-4" href="{{ url('images/'.$image) }}">
                                        <img class="rounded border img-fluid" src="{{ url('images/'.$image) }}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
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