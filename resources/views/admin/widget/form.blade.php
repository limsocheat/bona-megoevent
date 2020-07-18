<div class="card-body">
	<div class="form-group">
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('location', 'Location') !!}
		{!! Form::select('location', [
		'footer-1' => 'Footer 1',
		'footer-2' => 'Footer 2',
		'footer-3' => 'Footer 3',
		'footer-4' => 'Footer 4',
		], null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('body', 'Description') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
	</div>
</div>