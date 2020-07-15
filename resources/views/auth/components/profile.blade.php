<div class="form-group" style="height: 110px;">
	<div class="mego-avatar-wrapper">
		<img class="profile-pic"
			src="http://simpleicon.com/wp-content/uploads/account.png"  />
		<div class="upload-button">
			<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
		</div>
		{{ Form::file('profile[image]', ['id' => "profileImage", "class" => "file-upload",'type' =>'file','accept'=>'image/*']) }}
	</div>
</div>
<div class="form-group">
	{!! Form::label('profile[first_name]', 'First Name') !!}
	{!! Form::text('profile[first_name]', null, ['placeholder' => 'First Name', 'class'=> 'form-control', 'required' => true])!!}
</div>
<div class="form-group">
	{!! Form::label('profile[last_name]', 'Last Name') !!}
	{!! Form::text('profile[last_name]', null, ['placeholder' => 'Last Name', 'class' =>'form-control', 'required' => true]) !!}
</div>
<div class="form-group">
	{!! Form::label('type', 'Type') !!}
	{!! Form::select('type', ['individual' => 'Individual', 'company' => 'Company'], null,['placeholder' => 'Select', 'class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('profile[job_title]', 'Job Title') !!}
	{!! Form::text('profile[job_title]', null, ['placeholder' => 'Job Title', 'class' =>
	'form-control']) !!}
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