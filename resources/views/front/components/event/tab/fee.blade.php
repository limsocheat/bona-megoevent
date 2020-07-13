<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('pax_min', 'Min Pax') !!}
            {!! Form::number('pax_min', null, ['class' =>
            'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('pax_max', 'Max Pax') !!}
            {!! Form::number('pax_max', null, [ 'class' =>
            'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('pax_min_last_date', 'Min Pax Last Date') !!}
            {!! Form::number('pax_min_last_date', null, [
            'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('price', 'Event Price') !!}
            {!! Form::number('price', null, ['class' =>
            'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('early_bird_price', 'Early Bird Price') !!}
            {!! Form::number('early_bird_price', null, [ 'class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('group_price', 'Group Price Per Pax') !!}
            {!! Form::number('group_price', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('group_min_pax', 'Group Price Minimum No of Pax') !!}
            {!! Form::number('group_min_pax', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>