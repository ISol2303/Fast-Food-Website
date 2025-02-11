@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Promotion Details</h1>

    <div class="mb-2">
        <strong>ID:</strong> {{ $promotion->id }}
    </div>
    <div class="mb-2">
        <strong>Title:</strong> {{ $promotion->title }}
    </div>
    <div class="mb-2">
        <strong>Description:</strong> {{ $promotion->description }}
    </div>
    <div class="mb-2">
        <strong>Promo Code:</strong> {{ $promotion->promo_code }}
    </div>
    <div class="mb-2">
        <strong>Quantity:</strong> {{ $promotion->quantity }}
    </div>
    <div class="mb-2">
        <strong>Discount Value:</strong> {{ $promotion->discount_value }}
    </div>
    <div class="mb-2">
        <strong>Start Date:</strong> {{ $promotion->start_date }}
    </div>
    <div class="mb-2">
        <strong>End Date:</strong> {{ $promotion->end_date }}
    </div>

    <a href="{{ route('promotions.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
