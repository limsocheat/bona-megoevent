@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Contact</h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact_number</th>
                    <th>Country</th>
                    <td>Conpany_name</td>
                    <td>Type</td>
                    <td>Message</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>

                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->contact_number}}</td>
                    <td>{{ $contact->country}}</td>
                    <td>{{ $contact->company_name}}</td>
                    <td>{{ $contact->type}}</td>
                    <td>{{ $contact->message}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('plugins.Datatables', true)

