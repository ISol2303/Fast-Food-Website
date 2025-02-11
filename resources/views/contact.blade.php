@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Contact Information</h1>
    <p>Please find our branch contact information below:</p>

    <div class="row">
        @foreach($branches as $branch)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $branch->name }}</h5>
                        <p class="card-text">
                            <strong>Address:</strong> {{ $branch->address }}<br>
                            <strong>Phone:</strong> {{ $branch->phone }}<br>
                            <strong>Operating Hours:</strong> {{ $branch->operating_hours }}<br>
                            @if($branch->latitude && $branch->longitude)
                                <strong>Location:</strong> ({{ $branch->latitude }}, {{ $branch->longitude }})
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
