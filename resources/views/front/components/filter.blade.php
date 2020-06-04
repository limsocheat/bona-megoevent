<form action="" class="col-md-12">
    <div class="row">
        <div class="col-md-3 form-group">
            {!! Form::label('category', 'Category', ['class' => 'label-control']) !!}
            {!! Form::select('category', $event_categories, null, ['placeholder' => 'All Categories', 'class' => 'form-control']) !!}
        </div>
        <div class="col-md-3 form-group">
            {!! Form::label('type', 'Type', ['class' => 'label-control']) !!}
            {!! Form::select('type', $event_types, null, ['placeholder' => 'All Types', 'class' => 'form-control']) !!}
        </div>
        <div class="col-md-3 form-group">
            {!! Form::label('audience', 'Audience', ['class' => 'label-control']) !!}
            {!! Form::select('audience', $event_types, null, ['placeholder' => 'All Audiences', 'class' => 'form-control']) !!}
        </div>
        <div class="col-md-3 form-group">
            {!! Form::label('period', 'Period', ['class' => 'label-control']) !!}
            {!! Form::select('period', $event_types, null, ['placeholder' => 'All Time', 'class' => 'form-control']) !!}
        </div>
    </div>
</form>