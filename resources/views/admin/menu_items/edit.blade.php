@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Edit Menu Item</h3>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('menu_items.update', $menuItem) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $menuItem->name) }}" required>
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea name="description" class="form-control">{{ old('description', $menuItem->description) }}</textarea>
                </div>

                <!-- Price -->
                <div class="mb-3">
                    <label class="form-label">Price:</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $menuItem->price) }}" required>
                </div>

                <!-- Upload Image -->
                <div class="mb-3">
                    <label class="form-label">Upload Image:</label>
                    <input type="file" name="image_url" class="form-control">
                    @if($menuItem->image_url)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $menuItem->image_url) }}" alt="{{ $menuItem->name }}" class="img-thumbnail" width="120">
                        </div>
                    @endif
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label class="form-label">Category:</label>
                    <select name="category_id" class="form-select" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Is Active -->
                <div class="mb-3">
                    <label class="form-label">Is Active:</label>
                    <select name="is_active" class="form-select" required>
                        <option value="1" {{ old('is_active', $menuItem->is_active) == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('is_active', $menuItem->is_active) == '0' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('menu_items.index') }}" class="btn btn-secondary">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
