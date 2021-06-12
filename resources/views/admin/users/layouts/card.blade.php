<!-- cards -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-light-gradient">
        <div class="inner">
            <h3>
                <i class="text-secondary fa fa-{{$icon}}"></i>
            </h3>
            <p>
               {{ $title }}
                  ({{ $count }})
            </p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route($link) }}" style="color:black !important;"
           class="small-box-footer bg-secondary-gradient">
            اطلاعات بیشتر
            <i class="fa fa-arrow-circle-left"></i>
        </a>
    </div>
</div>
<!-- cards -->
