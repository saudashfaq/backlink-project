@php

use Carbon\Carbon;

@endphp
<!-- resources/views/orders/index.blade.php -->

@extends('layouts.app')

@section('title', 'Process Orders')

@section('content')
<h1>Orders</h1>

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



<ul class="nav nav-tabs" id="myTabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#pending_orders" role="tab" aria-controls="tab1" aria-selected="true">Tab 1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#in_processing_orders" role="tab" aria-controls="tab2" aria-selected="false">Tab 2</a>
    </li>
</ul>
<div class="tab-content" id="myTabsContent">
    <div class="tab-pane fade show active" id="pending_orders" role="tabpanel" aria-labelledby="tab1-tab">
        <h2>Pending Orders:</h2>
        <table class="table">
            <thead>
                <tr>

                    <th>Website</th>
                    <th>Earnings</th>
                    <th>Received On</th>
                    <th>Act before</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->website->url }}</td>
                    <td>{{ '$'.$order->order_amount }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ Carbon::parse($order->order_status_updated_at)->addDays(10) }}</td>
                    <td>{{ strtoupper($order->order_status) }}</td>
                    {{--
                <td>{{ $order->order_details }}</td>
                    --}}


                    <td>
                        <a href="#" id="accept_order" class="btn btn-primary">Accept</a>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary">Edit</a>

                        <!-- Add more actions as needed -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="in_processing_orders" role="tabpanel" aria-labelledby="tab2-tab">
        <h2>In Processing Orders:</h2>
        <table class="table">
            <thead>
                <tr>

                    <th>Website</th>
                    <th>Earnings</th>
                    <th>Received On</th>
                    <th>Act before</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->website->url }}</td>
                    <td>{{ '$'.$order->order_amount }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ Carbon::parse($order->order_status_updated_at)->addDays(10) }}</td>
                    <td>{{ strtoupper($order->order_status) }}</td>
                    {{--
                <td>{{ $order->order_details }}</td>
                    --}}


                    <td>
                        <a href="#" id="accept_order" class="btn btn-primary">Accept</a>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary">Edit</a>

                        <!-- Add more actions as needed -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>











@endsection

@section( 'scripts' )


<script>
    $(document).ready(function() {
        $('#accept_order').click(function(e) {
            e.preventDefault(); // Prevent default link behavior (e.g., navigating to a new page)

            // Make AJAX request
            $.ajax({
                url: '/Orders/update-order-status', // Replace with your actual endpoint URL
                method: 'GET', // Use POST or GET based on your requirement
                data: {
                    // Add any data you want to send with the request
                    status: 'accept',

                },
                success: function(response) {
                    // Handle successful response
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection