<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('start_date', 'Start Date') !!}
            {!! Form::date('start_date', null, ['class' =>
            'form-control', 'id' => 'StartDate', 'readonly' => @$event ? @$event->readonly : null]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('start_time', 'Start Time') !!}
            {!! Form::time('start_time', null, ['class' =>
            'form-control', 'readonly' => @$event ? @$event->readonly : null]) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('end_date', 'End Date') !!}
            {!! Form::date('end_date', null, ['class' =>
            'form-control', 'id' => 'EndDate', 'readonly' => @$event ? @$event->readonly : null]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('end_time', 'End Time') !!}
            {!! Form::time('end_time', null, ['class' =>
            'form-control', 'readonly' => @$event ? @$event->readonly : null]) !!}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('early_bird_date', 'Early Bird Last Date') !!}
            {!! Form::date('early_bird_date', null, [
            'class' => 'form-control', 'readonly' => @$event ? @$event->readonly : null]) !!}
        </div>
    </div>
</div>