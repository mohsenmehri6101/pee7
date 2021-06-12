@if(strpos($listInfo["route"], 'user'))
    @include('layouts.product.productTableUser',['listInfo'=>$listInfo])
@elseif(strpos($listInfo["route"], 'all'))
    @include('layouts.product.productTableAll',['listInfo'=>$listInfo])
@endif