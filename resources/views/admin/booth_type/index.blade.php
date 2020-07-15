@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Booth Type</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.booth_type.create') }}" class="btn btn-primary">New Booth Type</a>
       
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Image</th>
                        <th>Name</th>
                        <th>Pricing</th>
                        <th>Total </th>
                        <th>Vip_Speech</th>
                        <th>Vip_Moderator</th>
                        <th>Banner_Page</th>
                        <th>Banner_Homepage</th>
                        <th>Number</th>
                        <th>Auction</th>
                        <th>Leads</th>
                        <th>live_Chat</th>
                        <th>Surveys</th>
                        <th>Description</th>
                        <th class="mego-action-button">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booth_types as $booth_type)
                        <tr>
                            <td><img src="{{ $booth_type->image_url }}" class="rounded mx-auto mego-datatable-image" ></td>
                            <td>{{ $booth_type->name }}</td>
                            <td>{{ $booth_type->pricing }}</td>
                            <td>{{ $booth_type->total}}</td>
                            <td>{{ $booth_type->vip_speech}}</td>
                            <td>{{ $booth_type->vip_moderator}}</td>
                            <td>{{ $booth_type->ads_event}}</td>
                            <td>{{ $booth_type->banner_ads_homepage}}</td>
                            <td>{{ $booth_type->number_products}}</td>
                            <td>{{ $booth_type->auction}}</td>
                            <td>{{ $booth_type->leads}}</td>
                            <td>{{ $booth_type->live_chat}}</td>
                            <td>{{ $booth_type->surveys}}</td>
                            <td>{{ $booth_type->description}}</td>
                        
                            <td>
                                <a href="{{ route('admin.booth_type.edit', $booth_type->id) }}" class="btn btn-primary btn-sm mego-button-edit" >Edit</a>
                                {!! Form::open(['route' => ['admin.booth_type.destroy', $booth_type->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('plugins.Datatables', true)

