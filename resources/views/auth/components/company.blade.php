<div class="form-group">
	{!! Form::label('type', 'Type *') !!}
	{!! Form::select('type', ['individual' => 'Individual', 'company' => 'Company'], null,['placeholder' => 'Select', 'class' => 'form-control wizard-required', 'id' => 'register-account-type']) !!}
	<div class="wizard-form-error"></div>
</div>
	<div class="Company box">
		<div class="form-group" style="height: 110px;">
			<div class="mego-company-wrapper" id="profile-preview">
				<img id="logoPreview" class="preview-img" src="http://simpleicon.com/wp-content/uploads/account.png"
					alt="Preview Image" width="100" height="100" />
				<div class="logo-upload-button">
					<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
				</div>
				{{ Form::file('company[logo]', ['id' => "logoImage", "class" => "browse-input"]) }}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('company[name]', 'Company Name') !!}
			{!! Form::text('company[name]', null, ['placeholder' => 'Company Name', 'class' =>'form-control', 'id' => 'register-company-name'])
			!!}
			<div class="wizard-form-error"></div>
		</div>
		<div class="form-group">
			{!! Form::label('company[registration_number]', 'Registration Number') !!}
			{!! Form::text('company[registration_number]', null, ['placeholder' => 'xxxxxxxx', 'class' =>'form-control', 'id' => 'register-company-number']) !!}
			<div class="wizard-form-error"></div>
		</div>
	</div>
{{-- <div class="Individual box">You are register with individual! </div> --}}
		
<div class="form-group ">
	{!! Captcha::display($attributes = [
	'data-type' => 'audio',
	]) !!}
	@if ($errors->has('g-recaptcha-response'))
	<span class="help-block text-danger wizard-required">
		<strong>{{ $errors->first('g-recaptcha-response') }}</strong>
	</span>
	@endif
</div>