<script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>
{!! NoCaptcha::display() !!}
<input type="hidden" class="form-control @error('g-recaptcha-response') is-invalid @enderror" >
@error('g-recaptcha-response')
<span class="text-red invalid-feedback">
    {{ $message }}
</span>
@enderror