@extends('admin.layouts.master')

@section('page_header')
    <li class="breadcrumb-item"><a class="text-info" href="{{ route('admin.setting.faq.index') }}">سوالات متداول</a></li>
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
                        <h3 class="card-title">سوالات متداول</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <a href="{{ route('admin.setting.faq.create') }}" class="btn bg-light-gradient border ml-1">
                                    ایجاد سوال</a>
                                <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-secondary text-center" style="font-size:85%;">
                    <div class="col">
                        <p>
                            <span class="fa fa-check text-success"></span>
                            فعال : به معنی نمایش سوال میباشد.
                        </p>
                    </div>
                    <div class="col">
                        <p>
                            <span class="fa fa-close text-danger"></span>
                            غیر فعال : به معنی عدم نمایش سوال میباشد.
                        </p>
                    </div>
                </div>
                <!-- questions -->
                <div class="accordion" id="questions">
                    @foreach( $questions as $question)
                        <div class="card">
                            <div class="card-header" id="{{ $question->id }}">
                                <h5 class="mb-0">
                                    <a class="question btn btn-link collapsed float-right" type="button" data-toggle="collapse" data-target="#collapse{{ $question->id }}" aria-expanded="false" aria-controls="collapse{{ $question->id }}">
                                    <span>{{ $question->question }}</span>
                                    </a>
                                </h5>
                                <div class="float-left">
                                    <a href="{{route('admin.setting.faq.edit',['faq'=>$question])}}}">
                                        <span class="fa fa-edit text-warning"></span>
                                    </a>
                                    <a style="cursor: pointer;" id="link_{{$question->id}}" onclick="active_inactive({{ $question->id }})">
                                            <span style="font-size:92%;" id="span_{{$question->id}}" class="px-2 px-1 badge {{ $question->status==1 ? 'fa fa-check text-success' : 'fa fa-close text-danger' }}">
                                            </span>
                                    </a>
                                    <a style="cursor: pointer !important;" onclick="destroy({{ $question->id }})">
                                        <span class="fa fa-trash-o text-danger"></span>
                                    </a>
                                    <form hidden id="{{$question->id}}_destroy" class="btn btn-sm btn-outline-danger" action="{{ route('admin.setting.faq.destroy'  , ['id' => $question->id]) }}" method="post">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                            <div id="collapse{{ $question->id }}" class="collapse" aria-labelledby="{{ $question->id }}" data-parent="#questions">
                                <div class="card-body text text-justify">
                                    {!! $question->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- questions -->
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $questions->render() }}
            </div>
        </div>
</section>
@endsection

@section('personalize_script')
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
                url:"{{route('admin.setting.faq.status')}}",
                data:{id:id},
                success:function(data){
                    //console.log('success');
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



$.ajax({
method:"get",
url:"{{route('admin.setting.faq.status')}}",
data:{id:id},
success:function(data){
console.log("hi");
if("hi")
{
console.log("hi");
}
else if("hi")
{
console.log(data.status);
}
}
})