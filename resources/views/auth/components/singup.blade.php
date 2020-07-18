
<div class="form-group ">
	<label for="email" class="col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
	<input id="email" type="email" class="form-control wizard-required  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >
	<div class="wizard-form-error"></div>
    <span class="message error">Please enter a valid email address.</span>
	@error('email')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<div class="form-group row">
	<label for="password" class="col-form-label text-md-left">{{ __('Password') }}</label>
	<input id="pass1"  type="password" class="form-control wizard-required @error('password') is-invalid @enderror" name="password"  required autocomplete="new-password" onkeyup="checkPass(); return false;">
	<div class="wizard-form-error"></div>
	<div id="error-nwl"></div>
	@error('password')
		<span class="invalid-feedback" role="alert">
			<strong>{{ $message }}</strong>
		</span>
	@enderror
</div>

<div class="form-group row">
	<label for="password-confirm" class="col-form-label text-md-left">{{ __('Confirm Password') }}</label>
	<input id="pass2" type="password" class="form-control wizard-required" name="password_confirmation" required autocomplete="new-password" onkeyup="checkPass(); return false;">
	<div class="wizard-form-error"></div>
</div>