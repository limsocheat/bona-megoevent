@component('mail::message')
# Ticket
@php
    $event  = $ticket->purchase->event;
@endphp
<h2 class="ml-1">{{ $event->name }}</h2>
<p class="ml-1">{{ $event->start_date }} @ {{ $event->start_time }}</p>
@component('mail::table')
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">Ticket #</th>
                <th scope="col">Ticket Type</th>
                <th scope="col">Purchaser</th>
                <th scope="col">Security Code</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>Online Purchase</td>
                <td>{{ $ticket->purchase->user->name }}</td>
                <td>{{ $ticket->code }}</td>
            </tr>
        </tbody>
    </table>
@endcomponent

@component('mail::button', ['url' => route('manage.ticket.show', $ticket->id)])
View Ticket
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
