@extends('layouts.app')

@section('title', 'Exhibitor Registration')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Event Details
                        <a href="{{ route('event', $event->id) }}" class="btn btn-outline-primary float-right">View Event</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        Name
                                    </td>
                                    <td>
                                        {{ $event->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Start
                                    </td>
                                    <td>
                                        {{ $event->display_start_date }} @ {{ $event->display_start_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        End
                                    </td>
                                    <td>
                                        {{ $event->display_end_date }} @ {{ $event->display_end_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Location
                                    </td>
                                    <td>
                                        {{ $event->location ? $event->location->name : null }}
                                        <br>
                                        {{ $event->location ? $event->location->address : null }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Exhibitor Information
                        <a href="{{ route('manage.profile.index') }}" class="btn btn-outline-primary float-right">Update Information</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Name</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $user->profile ? $user->profile->phone : null }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $user->profile ? $user->profile->address : null }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        {!! Form::open(['route' => 'manage.profile.update', 'method' => 'PUT']) !!}
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']); !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection