<option value="0">لطفا شهر خود را انتخاب نمایید</option>
@foreach($cities as $city)
    <option value="{{$city->name}}" {{ $city_now == $city->name ? 'selected'  : '' }}>{{ $city->name }}</option>
@endforeach