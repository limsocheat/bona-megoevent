<style>
    #filter_form select,
    input {
        text-decoration: none;
        color: black;
        border: 2px solid #efefef !important;
    }

    /* #filter_form .group_date{
        text-decoration: none ;
        color: black;
        border-radius: 2px solid black !important;
    } */
    #filter_form select option:hover {
        box-shadow: 0 0 10px 100px #1882A8 inset;
    }
</style>

<form action="{{ route('search') }}" class="col-md-12" id="filter_form">
    <div class="row">
        <div class="col-sm form-group">
            {!! Form::label('keyword', 'Keyword', ['class' => 'label-control']) !!}
            {!! Form::text('keyword', request()->keyword, ['placeholder' => 'Keyword', 'class' => 'form-control']) !!}
        </div>
        <div class="col-sm form-group">
            {!! Form::label('category', 'Category', ['class' => 'label-control']) !!}
            {!! Form::select('category', $event_categories, request()->category, ['placeholder' => 'All Categories',
            'class' => 'form-control']) !!}
        </div>
        <div class="col-sm form-group">
            {!! Form::label('type', 'Type', ['class' => 'label-control']) !!}
            {!! Form::select('type', $event_types, request()->type, ['placeholder' => 'All Types', 'class' =>
            'form-control']) !!}
        </div>
        <div class="col-sm form-group pr-0">
            {!! Form::label('period', 'Period', ['class' => 'label-control']) !!}
            {!! Form::text('date', request()->date ? request()->date : null, ['class' => 'form-control', 'id' =>
            'daterange']) !!}
        </div>
        <div class="col-sm form-group">
            <div class="label-control">&nbsp;</div>
            <div style="margin-top: 11px;">
                <button type="submit" class="btn btn-dark">Apply</button>
                <a href="{{ url()->current() }}" type="button" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    jQuery(document).ready(function($){

        $('#daterange').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
        });

        $('#daterange').val("<?php echo request()->date ?>");

    });
</script>