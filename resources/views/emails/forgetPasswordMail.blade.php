@component('mail::message')
    <h3>
        فراموشی پسورد
    </h3>
    <br>
    <p>
        <a href='{{ url("password/reset/".$token."?email=".$user->email) }}' target="_blank">Reset Password</a>
    </p>
@endcomponent
