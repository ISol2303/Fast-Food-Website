@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Promotion</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('promotions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="promo_code" class="form-label">Promo Code:</label>
            <input type="text" name="promo_code" id="promo_code" value="{{ old('promo_code') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="discount_value" class="form-label">Discount Value:</label>
            <input type="number" step="0.01" name="discount_value" id="discount_value" value="{{ old('discount_value') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date:</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Promotion</button>
    </form>
</div>
@endsection
