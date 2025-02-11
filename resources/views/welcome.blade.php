@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Banner -->
    <div class="jumbotron text-center bg-light p-5 mb-4 shadow-sm rounded">
        <h1 class="display-4">Welcome to Fast Food Delight!</h1>
        <p class="lead">Enjoy the best fast food with fresh ingredients and quick service.</p>
        <a href="{{ url('/menu') }}" class="btn btn-primary btn-lg">View Menu</a>
    </div>

    <!-- Category Filters -->
    <div class="text-center mb-4">
        <h2>Explore Our Menu</h2>
        <div class="d-flex justify-content-center flex-wrap">
            @if(isset($categories) && count($categories) > 0)
                @foreach($categories as $category)
                    <a href="?category={{ $category->id }}" class="btn btn-outline-primary m-2">{{ $category->name }}</a>
                @endforeach
            @else
                <p class="text-muted">No categories available.</p>
            @endif
        </div>
    </div>

    <!-- Menu Items -->
    <div id="menu" class="row">
        @if(isset($menuItems) && count($menuItems) > 0)
            @foreach($menuItems as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        @if($item->image_url)
                            <img src="{{ asset('storage/' . $item->image_url) }}" class="card-img-top" alt="{{ $item->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text text-muted">{{ $item->description }}</p>
                            <p class="fw-bold">Price: ${{ number_format($item->price, 2) }}</p>
                            <p>Category: <span class="badge bg-info">{{ $item->category->name ?? 'N/A' }}</span></p>
                            <p>Status:
                                @if($item->is_active)
                                    <span class="badge bg-success">Available</span>
                                @else
                                    <span class="badge bg-danger">Not Available</span>
                                @endif
                            </p>
                            @auth
                                <a href="{{ route('cart.add', $item->id) }}" class="btn btn-primary w-100">Add to Cart</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-warning w-100">Login to Order</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center text-muted">No menu items available.</p>
        @endif
    </div>
</div>
@endsection
