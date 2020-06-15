<style>
    #filter_form select,input{
        text-decoration: none ;
        color: black;
        border: 2px solid black !important;
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

<form action="" class="col-md-12" id="filter_form">
    <div class="row">
        <div class="col-sm form-group">
            <label for="Search">Keyword</label>
            <input type="text" class="form-control keyword" id="usr" placeholder="Keyword">
        </div>
        <div class="col-sm form-group">
            {!! Form::label('category', 'Category', ['class' => 'label-control']) !!}
            {!! Form::select('category', $event_categories, null, ['placeholder' => 'All Categories', 'class' => 'form-control']) !!}
        </div>
        <div class="col-sm form-group">
            {!! Form::label('type', 'Type', ['class' => 'label-control']) !!}
            {!! Form::select('type', $event_types, null, ['placeholder' => 'All Types', 'class' => 'form-control']) !!}
        </div>
        <!-- <div class="col-sm form-group">
            {!! Form::label('audience', 'Audience', ['class' => 'label-control']) !!}
            {!! Form::select('audience', $event_types, null, ['placeholder' => 'All Audiences', 'class' => 'form-control']) !!}
        </div> -->
        <div class="col-sm form-group pr-0">
            {!! Form::label('period', 'Period', ['class' => 'label-control']) !!}
            <div class="col-sm p-0">
                <input type="date" class="form-control" id="stard-date" placeholder="Start date">
            </div>
            {{-- {!! Form::select('period', $event_types, null, ['placeholder' => 'Start & End Date', 'class' => 'form-control']) !!} --}}
        </div>
        <div class="col-sm form-group pl-1">
            <div class="label-control">&nbsp;</div>
            <div class="col-sm p-0" style="margin-top:11px;">
                <input type="date" class="form-control" id="stard-date" placeholder="End date">
            </div>
        </div>
        <div class="col-sm form-group">
            <div class="label-control">&nbsp;</div>
            <div style="margin-top: 11px;"  >
                <a href="{{ route('search') }}" type="button" class="btn btn-dark">Apply</a>
                <button type="button" class="btn btn-secondary">Reset</button>
            </div>
        </div>
    </div>
</form>