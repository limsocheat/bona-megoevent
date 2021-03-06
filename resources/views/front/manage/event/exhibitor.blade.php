
@extends('front.manage.layout.index')

@section('title', $event->name)

@section('content_profile')
<div class="col-md-10" style="margin-top: -25px">
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                Exhitors List
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exhibitors as $exhibitor)
                            <tr>
                                <td>
                                    {{ $exhibitor->name }}
                                </td>
                                <td>{{ $exhibitor->email }}</td>
                                <td>{{ $exhibitor->profile ? $exhibitor->profile->phone : null }}</td>
                                <td>{{ $exhibitor->company ? $exhibitor->company->name : null }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection