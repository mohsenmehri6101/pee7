<div class="widget-user-header bg-info">
<div class="widget-user-image">
    <img style="background-color:white;" class="img-circle elevation-2" src="{{ url('images/'.auth()->user()->image)}}" alt="User Avatar">
</div>
<!-- /.widget-user-image -->
<h3 class="widget-user-username">
    {{ auth()->user()->name }}
</h3>
<h6 class="widget-user-desc">
    @if(! auth()->user()->completeInfo)
        <a href="{{ urlCustom('profile/create') }}" class="btn btn-sm btn-danger">تکمیل اطلاعات</a>
    @else
        <a href="{{ urlCustom('profile/edit') }}" class="btn btn-sm btn-warning">
            ویرایش اطلاعات</a>
    @endif
</h6>
</div>
