@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($tickets as $ticket)

            <h2 class="mb-5">View Ticket #{{ $ticket->id }}</h2>

            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <h2 class="ml-1">{{ $ticket->purchase->event->name }}</h2>
                        <p class="ml-1">{{ $ticket->purchase->event->display_start_date }} @
                            {{ $ticket->purchase->event->display_start_time }}</p>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Ticket #</th>
                                        <th scope="col">Ticket Type</th>
                                        <th scope="col">Purchaser</th>
                                        <th class="text-right">Security Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $ticket->id }}</td>
                                        <td>Online Purchased</td>
                                        <td>{{ $ticket->purchase->user->name }}</td>
                                        <td class="text-right">{{ $ticket->code }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Venue</th>
                                        <th colspan="2" class="text-right">Event Manager</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            {{ $ticket->purchase->event->location ? $ticket->purchase->event->location->name : "To Be Announced" }}
                                            <br>
                                            {{ $ticket->purchase->event->location ? $ticket->purchase->event->location->address : "To Be Announced" }}
                                            <br>
                                            <a href="#">Map</a>
                                        </td>
                                        <td colspan="2" class="text-right">F. Scott Fitzgerald</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            {!! QrCode::size(250)->generate('ItSolutionStuff.com'); !!}
                        </div>
                        <div class="col-sm-8 text-right">
                            <h2 class="ml-1">Check in for this Event</h2>
                            <p>Scan this QR code at the event to check in.</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection