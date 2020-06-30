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

<form action="" class="col-md-12" id="filter_form">
    <div class="row">
        <div class="col-sm form-group">
            {!! Form::label('name', 'Name', ['class' => 'label-control']) !!}
            {!! Form::text('name', request()->Name, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
        </div>
        <div class="col-sm form-group">
            {!! Form::label('category', 'Category', ['class' => 'label-control']) !!}
            {!! Form::select('category', $product_categories, request()->category, ['placeholder' => 'All Categories',
            'class' => 'form-control']) !!}
        </div>
        <div class="col-sm form-group">
            <div class="label-control">&nbsp;</div>
            <div style="margin-top: 11px;">
                <button type="submit" class="btn btn-dark">Apply</button>
                {{-- <a href="{{ url()->current() }}" type="button" class="btn btn-secondary">Reset</a> --}}
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
  
</script>