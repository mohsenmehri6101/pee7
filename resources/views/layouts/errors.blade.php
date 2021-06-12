@if(count($errors))
    <div class="row">
        <div class="col">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul style="list-style: none !important;">
                    @foreach($errors->all() as $error)
                        <li class="my-4">
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif