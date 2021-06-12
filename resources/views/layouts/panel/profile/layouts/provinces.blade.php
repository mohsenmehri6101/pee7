<select  name="province" id="provinces"  class="form-control select2" data-live-search="true">
    <option value="0">استان خود را انتخاب کنید</option>
    @foreach(\App\Models\Province::select('name')->get() as $province)
        <option value="{{ $province->name }}">{{ $province->name }}</option>
    @endforeach
</select>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        $('.select2').select2();
        $('#provinces').on('change',function () {
            let nameProvince = $(this).children("option:selected").val();
            $.ajax({
                url: "{{ route('ajax.get.city') }}",
                method : "Post",
                data : {
                    "_token": "{{ csrf_token() }}",
                    nameProvince : nameProvince},
                dataType : 'json',
            }).done(function (data) {
                $('#city_id').html(data);
            });
        })
    })
</script>
