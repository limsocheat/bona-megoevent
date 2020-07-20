@extends('layouts.app')

@section('title', 'Exhibitor Registration')

@section('content')
<div class="container py-4">
    <div class="row">

        @if ($event->exhibitors->contains($user->id))
        <div class="col-md-12">
            <div class="alert alert-info" role="alert">
                You already requested or you are already an exhibitor!
            </div>
        </div>
        @endif

        <div class="col-md-12">
            @if (\Session::has('error'))
            <div class="alert alert-error">
                {!! \Session::get('error') !!}
            </div>
            @endif
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Event Details
                    <a href="{{ route('event', $event->id) }}" class="btn mego-gold-bg float-right">View Event</a>
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
                                <td>Exhibitors</td>
                                <td>
                                    {{ count($event->exhibitors) }}
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
                    <a href="{{ route('manage.profile.index') }}" class="btn mego-gold-bg float-right">Update
                        Information</a>
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
                    @if ($event->exhibitors->contains($user->id))
                    <a href="{{ route('manage.profile.index') }}" class="btn btn-outline-primary btn-block">View Request
                        List</a>
                    @else
                    {!! Form::open(['route' => ['event_exhibitor.store', $event->id], 'method' => 'POST']) !!}
                    {!! Form::submit('Submit', ['class' => 'btn mego-gold-bg btn-block']); !!}
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection