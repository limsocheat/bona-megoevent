<div class="form-group">
    {!! Form::label('name', 'Event Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('type_id', 'Type') !!}
    {!! Form::select('type_id', $types, null, ['class' =>
    'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', $categories, null, ['class' =>
    'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('location_id', 'Event Location') !!}
    {!! Form::select('location_id', $event_locations, null, ['class'
    =>
    'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' =>
    'form-control']) !!}
</div>