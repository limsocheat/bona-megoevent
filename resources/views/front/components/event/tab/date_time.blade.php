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

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('early_bird_date', 'Early Bird Last Date') !!}
            {!! Form::date('early_bird_date', null, [
            'class' => 'form-control', 'readonly' => @$event ? @$event->readonly : null]) !!}
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($){
        $('#StartDate').datepicker({
            todayBtn:  1,
            autoclose: true,
            format: "yyyy-mm-dd",
            startDate: '0d'
        }).on('changeDate', function (selected) {
            var minDate = new Date(selected.date.valueOf());
            $('#EndDate').datepicker('setStartDate', minDate);
        });

        $('#EndDate').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            startDate: '+1d'
        }).on('changeDate', function (selected) {
            var maxDate = new Date(selected.date.valueOf());
            $('#StartDate').datepicker('setEndDate', maxDate);
        });
    });
</script>