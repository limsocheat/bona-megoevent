@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Slide</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.slide.create') }}" class="btn btn-primary">New Slide</a>
       
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th class="mego-action-button">Sub Title</th>
					<th>Image</th>
					<th>Location</th>
                    <th class="mego-action-button">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($slides as $slide)
                    <tr>
                        <td>{{ $slide->title }}</td>
						<td>{{ $slide->sub_title}}</td>
						<td><img src="{{ $slide->image_url }}"  alt=""  class="rounded mx-auto mego-datatable-image"></td>
						<td>{{ $slide->location}}</td>
                        <td>
                            <a href="{{ route('admin.slide.edit', $slide->id) }}" class="btn btn-primary btn-sm mego-button-edit">Edit</a>
                            {!! Form::open(['route' => ['admin.slide.destroy', $slide->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('plugins.Datatables', true)

