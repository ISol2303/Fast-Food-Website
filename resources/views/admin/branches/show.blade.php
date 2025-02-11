@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Branch Details</h1>

    <div class="mb-2">
        <strong>ID:</strong> {{ $branch->id }}
    </div>
    <div class="mb-2">
        <strong>Name:</strong> {{ $branch->name }}
    </div>
    <div class="mb-2">
        <strong>Address:</strong> {{ $branch->address }}
    </div>
    <div class="mb-2">
        <strong>Phone:</strong> {{ $branch->phone }}
    </div>
    <div class="mb-2">
        <strong>Operating Hours:</strong> {{ $branch->operating_hours }}
    </div>
    <div class="mb-2">
        <strong>Latitude:</strong> {{ $branch->latitude }}
    </div>
    <div class="mb-2">
        <strong>Longitude:</strong> {{ $branch->longitude }}
    </div>

    <a href="{{ route('branches.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
