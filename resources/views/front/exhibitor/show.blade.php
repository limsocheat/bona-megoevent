@extends('layouts.app')

@section ('title', $exhibitor->exhibitor_name)

@section('content')

<div class="container">
    <div class="mego-hero-image mt-4">
        <div class="mego-hero-text">
            <h1 style="font-size:48px">{{ $exhibitor->exhibitor_name }}</h1>
        </div>
    </div>
    <div class="row py-4">
        <div class="col-sm-6 mt-4 p-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <img src="{{ $exhibitor->exhibitor_image }}" alt="{{ $exhibitor->exhibitor_name }}"
                                class="rounded img-thumbnail" style="max-width: 300px; text-align: center">
                        </div>
                        <div class="col-md-12">
                            <h3>{{ $exhibitor->exhibitor_name }}</h3>
                            <ul>
                                <li>Email: {{ $exhibitor->email }}</li>
                                @if ($exhibitor->profile && $exhibitor->profile->phone)
                                <li>Phone: {{ $exhibitor->profile ? $exhibitor->profile->phone: null }}</li>
                                @endif
                                @if ($exhibitor->profile && $exhibitor->profile->address)
                                <li>Address: {{ $exhibitor->profile ? $exhibitor->profile->address: null }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mt-4 p-auto mego-txt-line-height">
        </div>
    </div>
</div>
@endsection