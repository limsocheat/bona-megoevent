@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {!! Form::open(['route' => 'event.store', 'method' => "POST"]) !!}
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Event') }}
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('event_experience_id', 'What\'s your level of experience hosting events?') !!}
                            {!! Form::select('event_experience_id', $event_experiences, null, ['placeholder' => 'select', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('event_team_id', 'How many people help plan your events online?') !!}
                            {!! Form::select('event_team_id', $event_teams, null, ['placeholder' => 'select', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('event_frequency_id', 'How often do you plan to host events?') !!}
                            {!! Form::select('event_frequency_id', $event_frequencies, null, ['placeholder' => 'select', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('event_attendance_id', 'How many people do you expect will attend this event?') !!}
                            {!! Form::select('event_attendance_id', $event_attendances, null, ['placeholder' => 'select', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('type_id', 'What type of event are you hosting today?') !!}
                            {!! Form::select('type_id', $types, null, ['placeholder' => 'select', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('category_id', 'How would you categorize your event?') !!}
                            {!! Form::select('category_id', $categories, null, ['placeholder' => 'select', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('name', 'Name of your event') !!}
                            {!! Form::text('name', null, ['placeholder' => 'event name', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('mode', 'Mode') !!}
                            {!! Form::select('mode', ['single' => 'Single Event', 'recurring' => 'Recurring Event'], 'single', ['placeholder' => 'select', 'class' => 'form-control']) !!}
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('start_date', 'Start Date') !!}
                                    {!! Form::date('start_date', null, ['placeholder' => 'Start Date', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('start_time', 'Start Time') !!}
                                    {!! Form::time('start_time', null, ['placeholder' => 'Start Time', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('end_date', 'End Date') !!}
                                    {!! Form::date('end_date', null, ['placeholder' => 'End Date', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('end_time', 'End Time') !!}
                                    {!! Form::time('end_time', null, ['placeholder' => 'End Time', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('event_location_id', 'Event Location') !!}
                            {!! Form::select('event_location_id', $event_locations, null, ['placeholder' => 'select', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('location', 'Location Details') !!}
                            {!! Form::text('location', null, ['placeholder' => 'location details', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['placeholder' => 'description', 'class' => 'form-control']) !!}
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
@endsection
