@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Branch</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('branches.update', $branch->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Branch Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $branch->name) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea name="address" id="address" class="form-control" rows="3">{{ old('address', $branch->address) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $branch->phone) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="operating_hours" class="form-label">Operating Hours:</label>
            <input type="text" name="operating_hours" id="operating_hours" value="{{ old('operating_hours', $branch->operating_hours) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude:</label>
            <input type="number" step="0.000001" name="latitude" id="latitude" value="{{ old('latitude', $branch->latitude) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude:</label>
            <input type="number" step="0.000001" name="longitude" id="longitude" value="{{ old('longitude', $branch->longitude) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Branch</button>
    </form>
</div>
@endsection
