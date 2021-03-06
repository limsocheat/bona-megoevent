@extends('front.manage.layout.index')

@section('title', 'Events')

@section('content_profile')

<div class="col-md-10" style="margin-top: -25px">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-left">Manage Event</h2>
                        <a class="btn  float-right mego-gold-bg" href="{{ route('manage.event.create') }}">New Event</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        {!! Form::open(['route' => 'manage.event.index', 'method' => 'GET']) !!}
                        <div class="row">
                            <div class="col-md-3 form-group">
                                {!! Form::label('name', 'Name', ['class' => 'label-control']) !!}
                                {!! Form::text('name', request()->name, ['placeholder' => 'Name', 'class' =>
                                'form-control']) !!}
                            </div>
                            <div class="col-md-3 form-group">
                                {!! Form::label('status', 'Status', ['class' => 'label-control']) !!}
                                {!! Form::select('status', ['draft' => 'Draft', 'published' => 'Published'],
                                request()->status, ['placeholder' => 'Status', 'class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-3 form-group">
                                {!! Form::label('payment', 'Payment', ['class' => 'label-control']) !!}
                                {!! Form::select('payment', ['paid' => 'Paid', 'unpaid' => 'Unpaid'],
                                request()->payment, ['placeholder' => 'Payment Status', 'class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-3 form-group">
                                <div class="label-control">&nbsp;</div>
                                <div style="margin-top: 9px;">
                                    {!! Form::submit('Filter', ['class' => 'btn mego-gold-bg btn-block']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Exhibitors</th>
                                <th>Orders</th>
                                <th>Tickets</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->type ? $event->type->name : null }}</td>
                                    <td>{{ $event->category ? $event->category->name : null }}</td>
                                    <td>{{ $event->display_start_date }} @ {{ $event->display_start_time }}</td>
                                    <td>{{ $event->display_end_date }} @ {{ $event->display_end_time }}</td>
                                    <td><a href="{{ route('manage.event_exhibitor.show', $event->id) }}"
                                            class="mego-btn btn-sm mego-outline-gold text-capitalize text-decoration-none">{{ count($event->exhibitors) }}</a>
                                    </td>
                                    <td><a href="{{ route('manage.order.index') }}?event_id={{ $event->id }}"
                                            class="mego-btn btn-sm mego-outline-gold text-capitalize text-decoration-none">{{ count($event->purchases) }}</a>
                                    </td>
                                    <td><a href="{{ route('manage.order_ticket.index') }}?event_id={{ $event->id }}"
                                            class="mego-btn btn-sm mego-outline-gold text-capitalize text-decoration-none">{{ count($event->tickets) }}</a>
                                    </td>
                                    <td>
                                        <div
                                            class="badge {{ $event->status == 'published' ? 'badge-success' : 'badge-secondary'  }} text-capitalize">
                                            {{ $event->status }}</div>
                                    </td>
                                    <td>
                                        <a href="{{ route('manage.event.edit', $event->id) }}"
                                            class="btn btn-sm mego-gold-bg">Edit</a>
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
</div>
</div>
@endsection