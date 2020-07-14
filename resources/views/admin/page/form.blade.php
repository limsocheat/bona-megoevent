<div class="card-body">
<div class="form-group">
	{!! Form::label('slug', 'Slug') !!}
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('title', 'Title') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('description', 'Description') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
</div>
</div>
            