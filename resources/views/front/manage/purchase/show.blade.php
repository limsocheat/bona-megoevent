@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-3">View Purchase #{{ $purchase->id }}</h2>

    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    Purchase Details
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    Code
                                </td>
                                <td>
                                    <strong>{{ $purchase->id }}</strong>
                                </td>
                                <td>
                                    Date
                                </td>
                                <td>
                                    <strong>{{ $purchase->display_created_at }}</strong>
                                </td>
                                <td>
                                    Tickets
                                </td>
                                <td>
                                    <strong>{{ count($purchase->tickets) }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Event Details
                </div>
                <div class="card-body">
                    <table class="table">

                        <body>
                            <tr>
                                <td>
                                    Event Name
                                </td>
                                <td>
                                    {{ $purchase->event->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Event Start
                                </td>
                                <td>
                                    {{ $purchase->event->display_start_date }} @
                                    {{ $purchase->event->display_start_time }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Event End
                                </td>
                                <td>
                                    {{ $purchase->event->display_end_date }} @ {{ $purchase->event->display_end_time }}
                                </td>
                            </tr>
                        </body>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Participant Details
                </div>
                <div class="card-body">
                    <table class="table">

                        <body>
                            <tr>
                                <td>
                                    Participant Name
                                </td>
                                <td>
                                    {{ $purchase->user->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Participant Email
                                </td>
                                <td>
                                    {{ $purchase->user->email }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Participant Phone
                                </td>
                                <td>
                                    {{$purchase->user->profile ? $purchase->user->profile->phone : null }}
                                </td>
                            </tr>
                        </body>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection