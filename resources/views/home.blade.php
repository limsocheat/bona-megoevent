@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)    
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->type ? $event->type->name : null }}</td>
                                    <td>{{ $event->category ? $event->category->name : null }}</td>
                                    <td>{{ $event->start_date }} {{ $event->start_time }}</td>
                                    <td>{{ $event->end_date }} {{ $event->end_time }}</td>
                                    <td>
                                        <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
