@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Menu Items</h1>
        <a href="{{ route('menu_items.create') }}" class="btn btn-primary">Create New Menu Item</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width:5%;">ID</th>
                    <th style="width:20%;">Name</th>
                    <th style="width:20%;">Image</th>
                    <th style="width:15%;">Category</th>
                    <th style="width:10%;">Price</th>
                    <th style="width:10%;">Active</th>
                    <th style="width:20%;" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menuItems as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            @if($item->image_url)
                                <img src="{{ asset('storage/' . $item->image_url) }}" alt="{{ $item->name }}" width="100">
                            @else
                                <img src="{{ asset('images/default.png') }}" alt="No Image" width="100">
                            @endif
                        </td>
                        <td>{{ $item->category->name ?? 'N/A' }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->is_active ? 'Yes' : 'No' }}</td>
                        <td class="text-center">
                            <a href="{{ route('menu_items.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('menu_items.destroy', $item) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @if($menuItems->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">No menu items found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
