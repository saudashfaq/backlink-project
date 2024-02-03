<!-- resources/views/orders/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
    <h1>Edit Order</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('orders.update', $order) }}" method="post">
        @csrf
        @method('put')

        <!-- Add form fields based on your schema -->
        <div class="form-group">
            <label for="buyer_id">Buyer ID:</label>
            <input type="text" name="buyer_id" class="form-control" value="{{ $order->buyer_id }}" required>
        </div>

        <!-- Add more form fields as needed -->

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
