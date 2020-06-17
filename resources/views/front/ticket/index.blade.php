@extends('layouts.app')

@section('title', 'Ticket')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="m-auto shadow-sm p-3 mb-5 bg-white">
                <h2 class="ml-1">Black Tie Dinner & Ballroom Dance</h2>
                <p class="ml-1">June 15, 2020 @ 6:00pm</p>
                <div class="table-responsive">
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
                                <th scope="row">1</th>
                                <td>Club Members</td>
                                <td>Bob Snell</td>
                                <td>1bo$sn@mdo</td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="2">Venue</th>
                                <th colspan="2" class="text-center">Event Manager</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">Winchester Mysterly house</td>
                                <td colspan="2" class="text-center">F. Scott Fitzgerald</td>
                            </tr>
                            <tr>
                                <td colspan="4">525 S Winchester Blvd San Jose</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <a href="#">http://525-S-Winchester-Blvd-San-Jose</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-8 mt-5 ">
            <div class="m-auto shadow-sm p-3 mb-5 bg-white">
                <div class="row">
                    <div class="col-sm-4">
                        <P>QR CODE</P>
                    </div>
                    <div class="col-sm-8">
                        <h2 class="ml-1">Check in for this Event</h2>
                        <p>Scan this QR code at the event to check in.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection