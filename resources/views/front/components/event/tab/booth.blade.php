<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('diamond_max', 'Diamond Pax') !!}
            {!! Form::number('diamond_max', null, ['class' =>
            'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('gold_max', 'Gold Pax') !!}
            {!! Form::number('gold_max', null, ['class' =>
            'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('silver_max', 'Silver Pax') !!}
            {!! Form::number('silver_max', null, ['class' =>
            'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('bronze_max', 'Bronze Pax') !!}
            {!! Form::number('bronze_max', null, ['class' =>
            'form-control']) !!}
        </div>
    </div>
</div>