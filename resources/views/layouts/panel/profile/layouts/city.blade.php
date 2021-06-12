<option value="0">لطفا شهر خود را انتخاب نمایید</option>
@foreach($cities as $city)
    <option value="{{$city->name}}">{{ $city->name }}</option>
@endforeach