@extends('layouts.app')

@section('content')
<div class="container profile-container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Personal Information</h2>
                </div>
                <div class="card-body">
                    <p><strong>Full Name:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Phone:</strong> {{ Auth::user()->phone ?? 'Not updated' }}</p>
                    <p><strong>Address:</strong> {{ Auth::user()->address ?? 'Not updated' }}</p>
                    <p>
                        <strong>Role:</strong>
                        @if(Auth::user()->role == 1)
                            Admin
                        @elseif(Auth::user()->role == 2)
                            User
                        @else
                            Unknown
                        @endif
                    </p>
                    <p><strong>Joined Date:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
