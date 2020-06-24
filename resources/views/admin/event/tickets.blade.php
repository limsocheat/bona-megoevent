@extends('adminlte::page')

@section('title', 'Event Tickets')

@section('content_header')
    <h1>Event Tickets</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table id="datatable" class="table table-striped">
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
@stop

@section('plugins.Datatables', true)

@section('js')
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    } );
</script>
@endsection