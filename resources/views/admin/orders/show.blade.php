@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Order Details (ID: {{ $order->id }})</h1>

        <div class="card p-4 shadow-sm">
            <p><strong>User:</strong> {{ $order->user->name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Branch:</strong> {{ $order->branch->name ?? 'N/A' }}</p>
            <p><strong>Status:</strong>
                <span class="badge {{ $order->status == 'Completed' ? 'bg-success' : 'bg-warning' }}">
                    {{ $order->status }}
                </span>
            </p>
            <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
        </div>

        <h2 class="mt-4">Order Items</h2>
        <div class="card p-4 shadow-sm">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Item Type</th>
                        <th>Item ID</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->item_type }}</td>
                            <td>{{ $item->item_id }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>${{ number_format($item->discount_value, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
