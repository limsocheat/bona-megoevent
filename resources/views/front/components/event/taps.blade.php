<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<body>

    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Image & Video</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">Date and Time</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">Booth</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu2">Fee</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            {{-- Tap1 --}}
            <div id="home" class="tab-pane active"><br>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        {!! Form::model($event, ['route' => ['manage.event.update', $event->id], 'method' => 'PUT']) !!}
                        <div class="card">
                            <div class="card-header">
                                {{ __('Update Event') }}
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    {!! Form::label('id', 'Event ID') !!}
                                    {!! Form::text('id', null, ['placeholder' => 'event id', 'class' => 'form-control'])
                                    !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('name', 'Event Name') !!}
                                    {!! Form::text('name', null, ['placeholder' => 'event name', 'class' =>
                                    'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('EventType ID') !!}
                                    {!! Form::select('type_id', $types, null, ['placeholder' => 'select', 'class' =>
                                    'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('Organiser') !!}
                                    {!! Form::select('category_id', $categories, null, ['placeholder' => 'select',
                                    'class' =>
                                    'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('location_id', 'Event Location') !!}
                                    {!! Form::select('location_id', $event_locations, null, ['placeholder' => 'select',
                                    'class' =>
                                    'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('description', 'Description') !!}
                                    {!! Form::textarea('description', null, ['placeholder' => 'description', 'class' =>
                                    'form-control '])
                                    !!}
                                </div>
                            </div>

                            <div class="card-footer">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            {{-- Tap2 --}}
            <div id="menu1" class="tab-pane fade"><br>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="container lst">
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Sorry!</strong> Please check your iput again.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <h3 class="well">Udate Image</h3>
                                <form method="post" action="{{url('file')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="input-group hdtuto control-group lst increment">
                                        <input type="file" name="filenames[]" class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success" type="button">
                                                <i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                    <div class="clone hide">
                                        <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                            <input type="file" name="filenames[]" class="myfrm form-control">
                                            <div class="input-group-btn">
                                                <button class="btn btn-dark" type="button"><i class="fldemo glyphicon glyphicon-remove"></i>
                                                    Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark" style="margin-top:10px">Submit</button>
                                </form>              
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function() {
                            
                                  $(".btn-success").click(function(){ 
                            
                                      var lsthmtl = $(".clone").html();
                            
                                      $(".increment").after(lsthmtl);
                            
                                  });
                            
                                  $("body").on("click",".btn-danger",function(){ 
                            
                                      $(this).parents(".hdtuto control-group lst").remove();
                            
                                  });
                            
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tap3 --}}
            <div id="menu2" class="tab-pane fade"><br>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        {!! Form::model($event, ['route' => ['manage.event.update', $event->id], 'method' => 'PUT']) !!}
                        <div class="card">
                            <div class="card-header">
                                {{ __('Update Event') }}
                            </div>
                
                            <div class="card-body">
                
                                <div class="form-group">
                                    {!! Form::label('id', 'Event ID') !!}
                                    {!! Form::text('id', null, ['placeholder' => 'event id', 'class' => 'form-control'])
                                    !!}
                                </div>
                
                                <div class="form-group">
                                    {!! Form::label('name', 'Event Name') !!}
                                    {!! Form::text('name', null, ['placeholder' => 'event name', 'class' =>
                                    'form-control']) !!}
                                </div>
                
                                <div class="form-group">
                                    {!! Form::label('EventType ID') !!}
                                    {!! Form::select('type_id', $types, null, ['placeholder' => 'select', 'class' =>
                                    'form-control']) !!}
                                </div>
                
                                <div class="form-group">
                                    {!! Form::label('Organiser') !!}
                                    {!! Form::select('category_id', $categories, null, ['placeholder' => 'select',
                                    'class' =>
                                    'form-control']) !!}
                                </div>
                
                                <div class="form-group">
                                    {!! Form::label('location_id', 'Event Location') !!}
                                    {!! Form::select('location_id', $event_locations, null, ['placeholder' => 'select',
                                    'class' =>
                                    'form-control']) !!}
                                </div>
                
                                <div class="form-group">
                                    {!! Form::label('description', 'Description') !!}
                                    {!! Form::textarea('description', null, ['placeholder' => 'description', 'class' =>
                                    'form-control '])
                                    !!}
                                </div>
                            </div>
                
                            <div class="card-footer">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
                            </div>
                        </div>
                
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            {{-- Tap4 --}}
            <div id="menu2" class="tab-pane fade"><br>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        {!! Form::model($event, ['route' => ['manage.event.update', $event->id], 'method' => 'PUT']) !!}
                        <div class="card">
                            <div class="card-header">
                                {{ __('Update Event') }}
                            </div>
            
                            <div class="card-body">
            
                                <div class="form-group">
                                    {!! Form::label('id', 'Event ID') !!}
                                    {!! Form::text('id', null, ['placeholder' => 'event id', 'class' => 'form-control'])
                                    !!}
                                </div>
            
                                <div class="form-group">
                                    {!! Form::label('name', 'Event Name') !!}
                                    {!! Form::text('name', null, ['placeholder' => 'event name', 'class' =>
                                    'form-control']) !!}
                                </div>
            
                                <div class="form-group">
                                    {!! Form::label('EventType ID') !!}
                                    {!! Form::select('type_id', $types, null, ['placeholder' => 'select', 'class' =>
                                    'form-control']) !!}
                                </div>
            
                                <div class="form-group">
                                    {!! Form::label('Organiser') !!}
                                    {!! Form::select('category_id', $categories, null, ['placeholder' => 'select',
                                    'class' =>
                                    'form-control']) !!}
                                </div>
            
                                <div class="form-group">
                                    {!! Form::label('location_id', 'Event Location') !!}
                                    {!! Form::select('location_id', $event_locations, null, ['placeholder' => 'select',
                                    'class' =>
                                    'form-control']) !!}
                                </div>
            
                                <div class="form-group">
                                    {!! Form::label('description', 'Description') !!}
                                    {!! Form::textarea('description', null, ['placeholder' => 'description', 'class' =>
                                    'form-control '])
                                    !!}
                                </div>
                            </div>
            
                            <div class="card-footer">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
                            </div>
                        </div>
            
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            {{-- Tap5 --}}
            <div id="menu2" class="tab-pane fade"><br>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        {!! Form::model($event, ['route' => ['manage.event.update', $event->id], 'method' => 'PUT']) !!}
                        <div class="card">
                            <div class="card-header">
                                {{ __('Update Event') }}
                            </div>
            
                            <div class="card-body">
            
                                <div class="form-group">
                                    {!! Form::label('id', 'Event ID') !!}
                                    {!! Form::text('id', null, ['placeholder' => 'event id', 'class' => 'form-control'])
                                    !!}
                                </div>
            
                                <div class="form-group">
                                    {!! Form::label('name', 'Event Name') !!}
                                    {!! Form::text('name', null, ['placeholder' => 'event name', 'class' =>
                                    'form-control']) !!}
                                </div>
            
                                <div class="form-group">
                                    {!! Form::label('EventType ID') !!}
                                    {!! Form::select('type_id', $types, null, ['placeholder' => 'select', 'class' =>
                                    'form-control']) !!}
                                </div>
            
                                <div class="form-group">
                                    {!! Form::label('Organiser') !!}
                                    {!! Form::select('category_id', $categories, null, ['placeholder' => 'select',
                                    'class' =>
                                    'form-control']) !!}
                                </div>
            
                                <div class="form-group">
                                    {!! Form::label('location_id', 'Event Location') !!}
                                    {!! Form::select('location_id', $event_locations, null, ['placeholder' => 'select',
                                    'class' =>
                                    'form-control']) !!}
                                </div>
            
                                <div class="form-group">
                                    {!! Form::label('description', 'Description') !!}
                                    {!! Form::textarea('description', null, ['placeholder' => 'description', 'class' =>
                                    'form-control '])
                                    !!}
                                </div>
                            </div>
            
                            <div class="card-footer">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
                            </div>
                        </div>
            
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>