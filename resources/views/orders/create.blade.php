<!-- resources/views/orders/create.blade.php -->

@extends('layouts.app')

@section('title', 'Create Order')

@section('content')
    <h1>Create Order</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="post">
        @csrf

        <!-- Add form fields based on your schema -->
        <div class="form-group">
            <label for="buyer_id">Buyer ID:</label>
            <input type="text" name="buyer_id" class="form-control" required>
        </div>

        <!-- Add more form fields as needed -->

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('orders.index') }}"  class="btn btn-danger">Cancel</a>
    </form>
@endsection
