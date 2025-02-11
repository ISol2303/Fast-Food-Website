@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Promotion List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('promotions.create') }}" class="btn btn-primary mb-3">Create New Promotion</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Promo Code</th>
                <th>Quantity</th>
                <th>Discount Value</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promotions as $promotion)
                <tr>
                    <td>{{ $promotion->id }}</td>
                    <td>{{ $promotion->title }}</td>
                    <td>{{ $promotion->promo_code }}</td>
                    <td>{{ $promotion->quantity }}</td>
                    <td>{{ $promotion->discount_value }}</td>
                    <td>{{ $promotion->start_date }}</td>
                    <td>{{ $promotion->end_date }}</td>
                    <td>
                        <a href="{{ route('promotions.show', $promotion->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('promotions.edit', $promotion->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this promotion?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
