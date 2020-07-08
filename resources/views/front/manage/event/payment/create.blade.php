@extends('layouts.app')

@section('title', 'Event Payment')

@section('content')
    <div class="py-4 container">
        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold">Event Payment <small>{{ $event->name }}</small></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @if (\Session::has('error'))
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                {!! \Session::get('error') !!}
                            </div>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <h4 class="font-weight-bold mb-4">Event Details</h4>
                        <table class="table table-bordered">
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
                    <div class="col-md-6">
                        <h4 class="font-weight-bold mb-4">Order Detail</h4>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total Hours
                                <span class="badge badge-primary badge-pill">{{ $event->total_hours }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total Grid Block
                                <span class="badge badge-primary badge-pill">{{ $event->total_grid_block }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Grid Block Value
                                <span class="badge badge-primary badge-pill">{{ Money::SGD(\Setting::get('event.grid_block_value')) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total Grid Block Price
                                <span class="badge badge-primary badge-pill">{{ Money::SGD($event->total_grid_block_price) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total 7% Tax
                                <span class="badge badge-primary badge-pill">{{ Money::SGD($event->total_tax) }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total Final Price
                                <span class="badge badge-primary badge-pill">{{ Money::SGD($event->total_final_price) }}</span>
                            </li>
                        </ul>

                        <div class="spacer"></div>

                        {!! Form::open(['route' => ['manage.event_payment.store'], 'method' => 'POST']) !!}
                            {!! Form::hidden('event_id', $event->id) !!}
                            {!! Form::submit('Place Order & Publish', ['class' => 'btn btn-primary btn-block']); !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection