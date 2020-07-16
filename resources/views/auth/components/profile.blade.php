<div class="form-group">
	<div class="mego-avatar-wrapper">
		<img class="profile-pic" src="http://simpleicon.com/wp-content/uploads/account.png" />
		<div class="upload-button">
			<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
		</div>
		{{ Form::file('profile[image]', ['id' => "profileImage", "class" => "file-upload",'type' =>'file','accept'=>'image/*']) }}
	</div>
</div>
<div class="form-group">
	<label for="first_name" class="wizard-form-text-label">First Name*</label>
	<input type="text" class="form-control wizard-required" name="profile[first_name]" id="first_name">
	<div class="wizard-form-error"></div>
</div>
<div class="form-group">
	<label for="last_name" class="wizard-form-text-label">Last Name*</label>
	<input type="text" class="form-control wizard-required" name="profile[last_name]" id="last_name">
	<div class="wizard-form-error"></div>
</div>
<div class="form-group">
	{!! Form::label('profile[job_title]', 'Job Title') !!}
	{!! Form::text('profile[job_title]', null, ['placeholder' => 'Job Title', 'class' =>
	'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('profile[country_id]', 'Country') !!}
	{!! Form::select('profile[country_id]', $countries, null, ['placeholder' => 'Country','class' => 'form-control'])
	!!}
</div>
<div class="form-group">
	{!! Form::label('profile[address]', 'Address') !!}
	{!! Form::text('profile[address]', null, ['placeholder' => 'Address', 'class' =>'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('profile[phone]', 'Tel') !!}
	{!! Form::text('profile[phone]', null, ['placeholder' => '(xxx)-xxx-xxxx', 'class' => 'form-control phone-format',])
	!!}
</div>