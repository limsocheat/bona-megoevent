<div class="form-group" style="height: 110px;">
	<div class="mego-avatar-wrapper">
		<img class="profile-pic"
			src= "http://simpleicon.com/wp-content/uploads/account.png"  />
		<div class="upload-button">
			<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
		</div>
		{{ Form::file('profile[image]', ['id' => "registerImage", "class" => "file-upload",'type' =>'file','accept'=>'image/*']) }}
	</div>
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