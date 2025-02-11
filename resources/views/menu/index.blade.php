@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Our Menu</h1>

    <!-- Search and Category Filter -->
    <div class="row mb-4">
        <form action="{{ route('menu.index') }}" method="GET">
            <div class="row g-2">
                <!-- Search Input with Separate Search Button -->
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search for menu items...">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </div>
                <!-- Category Filter Dropdown -->
                <div class="col-md-4">
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Filter Button for Category (nếu cần thiết riêng biệt) -->
                <div class="col-md-2">
                    <button class="btn btn-outline-secondary w-100" type="submit">Filter</button>
                </div>
            </div>
        </form>
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
                            <p>
                                Category:
                                <span class="badge bg-info">
                                    {{ $item->category->name ?? 'N/A' }}
                                </span>
                            </p>
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
