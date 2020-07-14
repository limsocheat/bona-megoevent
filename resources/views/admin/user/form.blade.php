<div class="form-group">
	{!! Form::label('name', 'User Name') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('email', 'E-Mail Address') !!}
	{!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('role', 'Role') !!}
	{!! Form::select('role', $roles, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('password', 'Password') !!}
	{!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('password_confirmation', 'Password Confirmation') !!}
	{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>