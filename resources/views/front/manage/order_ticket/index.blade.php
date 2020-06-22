@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Manage Order Tickets <small>For Organizer</small></h2>
                </div>
                <div class="card-content">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Purchase</th>
                                <th>Event</th>
                                <th>Participant</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                <td>
                                    {{$ticket->code}}
                                </td>
                                <td>
                                    {{ $ticket->purchase->display_created_at }}
                                </td>
                                <td>
                                    {{ $ticket->purchase->event->name }}
                                    <br>
                                    <small>
                                        {{ $ticket->purchase->event->display_start_date }} @
                                        {{ $ticket->purchase->event->display_start_time }}
                                    </small>
                                </td>
                                <td>
                                    {{ $ticket->purchase->user->name }}
                                </td>
                                <td>
                                    <a href="{{ route('manage.ticket.show', $ticket->id) }}"
                                        class="btn btn-primary">View
                                        Ticket</a>
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