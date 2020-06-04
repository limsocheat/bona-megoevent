@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Exhibitor</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.event.create') }}" class="btn btn-primary">New Exhibitor</a>
       
    </div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                     {{-- <th>Event Experience</th>
                     <th>Event Team</th>
                    <th>Event Frequency</th>
                    <th>Event Attendance</th> --}}
					<th>Event Location</th> 
                    <th>Type</th>
					<th>Category</th>
                    <th>Name</th>
					<th>Start Date</th>
					<th>Start Time</th>
					<th>End Date</th>
					<th>End Time</th>
					<th>Location</th>
					<th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
						<td>{{ $event->option->name }}</td>
						<td>{{ $event->type->name }}</td>
						<td>{{ $event->category->name}}</td>
						<td>{{ $event->name}}</td>
						<td>{{ $event->start_date}}</td>
						<td>{{ $event->start_time}}</td>
						<td>{{ $event->end_date}}</td>
						<td>{{ $event->end_time}}</td>
						<td>{{ $event->location}}</td>
						<td>{{ $event->description}}</td>
					
                       
                     
                        {{-- <td>
                            <a href="{{ route('admin.exhibitor.edit', $exhibitor->id) }}" class="btn btn-primary btn-sm" style="float: left; margin-right: 5px">Edit</a>
                            {!! Form::open(['route' => ['admin.exhibitor.destroy', $exhibitor->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            {!! Form::close() !!}
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('plugins.Datatables', true)

@section('js')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection