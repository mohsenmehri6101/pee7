<nav class="mt-3 navbar navbar-expand-lg navbar-dark bg-dark mt-2" style="margin-top:0px !important;">
    <a class="navbar-brand" href="index.html">صفحه نخست</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="rulespage.html">قوانین و مقررات<span class="sr-only">(current)</span></a>
            </li>
            <?php  $notes=\App\Models\Note::whereStatus('1')->pluck('title','id'); ?>
            @if($notes->count() >0)
            <li class="nav-item ">
                <a class="cursor-pointer nav-link dropdown-toggle" data-toggle="dropdown">اطلاعیه ها</a>
                <div class="dropdown-menu">
                    @foreach($notes as $key=>$value)
                        <a class="dropdown-item" href="{{ route('home.note',['id'=>$key]) }}">{{ $value }}</a>
                    @endforeach
                </div>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link " href="{{ route('home.faq') }}">سوالات متداول</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about_us.html">درباره ما</a>
            </li>
        </ul>
    </div>
</nav>
