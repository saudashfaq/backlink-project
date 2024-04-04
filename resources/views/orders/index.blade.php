<!-- resources/views/orders/index.blade.php -->

@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<h1>Awaiting Orders</h1>

{{--
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Create Order</a>
--}}

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Buyer ID</th>
            <th>Seller ID</th>
            <th>Website ID</th>
            <th>Content Required</th>
            <th>Backlink Type</th>
            <th>Order Amount</th>
            {{--
                <th>Order Details</th>
            --}}
            <th>Order Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->buyer_id }}</td>
            <td>{{ $order->seller_id }}</td>
            <td>{{ $order->website_id }}</td>
            <td>{{ $order->content_required ? 'Yes' : 'No' }}</td>
            <td>{{ $order->backlink_type }}</td>
            <td>{{ $order->order_amount }}</td>
            {{--
                <td>{{ $order->order_details }}</td>
            --}}

            <td>{{ $order->order_status }}</td>
            <td>
                <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary">Edit</a>
                <!-- Add more actions as needed -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection