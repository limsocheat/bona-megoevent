@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Manager User</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header text-right">
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">New User</a>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th class="mego-action-button">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach ($user->getRoleNames() as $role)
                        <span>{{ $role }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary btn-sm mego-button-edit">Edit</a>
                         {!! Form::open(['route' => ['admin.user.destroy', $user->id], 'onsubmit' => "return confirm('Are you sure?')", 'method' => 'DELETE']) !!}
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                         {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('plugins.Datatables', true)

