<div class="form-group" style="height: 110px;">
	<div class="mego-company-wrapper" id="profile-preview">
		<img id="logoPreview" class="preview-img"
			src="http://simpleicon.com/wp-content/uploads/account.png"
			alt="Preview Image" width="100" height="100" />
		<div class="logo-upload-button">
			<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
		</div>
		{{ Form::file('logo', ['id' => "logoImage", "class" => "browse-input"]) }}
	</div>
</div>
<div class="form-group">
	{!! Form::label('name', 'Company Name') !!}
	{!! Form::text('name', null, ['placeholder' => 'Company Name', 'class' =>
	'form-control'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('registration_number', 'Registration Number') !!}
	{!! Form::text('registration_number', null, ['placeholder' => 'xxxxxxxx', 'class' =>
	'form-control']) !!}
</div>

<div class="form-group ">
	{!! Captcha::display($attributes = [
		'data-type' => 'audio',
	]) !!}
	@if ($errors->has('g-recaptcha-response'))
		<span class="help-block text-danger">
			<strong>{{ $errors->first('g-recaptcha-response') }}</strong>
		</span>
	@endif
</div>
