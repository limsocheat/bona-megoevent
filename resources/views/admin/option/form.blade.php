<div class="form-group">
	{!! Form::label('name', 'Name') !!}
	{!! Form::text('name', null, [ 'class' => 'form-control']) !!}
</div>
	<div class="form-group">
	{!! Form::label('type', 'Type :') !!}
		{{ Form::select('type', ['event_team' => 'event_team', 'event_attendance' => 'event_attendance', 'event_frequency' => 'event_frequency','event_location'=>'event_location'], null, ['id' => 'type','class' => 'form-control']) }}
	</div>

<div class="form-group">
	{!! Form::label('description', 'Descrition') !!}
	{!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>
	<div class="form-group">
	{!! Form::label('active', 'Active') !!}
	{!! Form::select('active', [true => 'Active', false => 'Inactive'], null, [ 'class' => 'form-control']) !!}
</div>