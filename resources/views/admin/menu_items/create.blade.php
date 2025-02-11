@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Create Menu Item</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card p-4 shadow-sm">
            <form action="{{ route('menu_items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description:</label>
                    <textarea class="form-control" name="description">{{ old('description') }}"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price:</label>
                    <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Upload Image:</label>
                    <input type="file" class="form-control" name="image_url">
                </div>
                <div class="mb-3">
                    <label class="form-label">Category:</label>
                    <select class="form-select" name="category_id" required>
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Is Active:</label>
                    <select class="form-select" name="is_active" required>
                        <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
