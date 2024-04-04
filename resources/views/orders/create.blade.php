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

@php

$buyers = $sellers = $users;

@endphp

<form action="{{ route('orders.store') }}" method="POST">
    @csrf

    <!-- Website selection -->
    <div class="form-group">
        <label for="website_id">Website</label>
        <select name="website_id" id="website_id" class="form-control">
            <option value="">Select Website</option>
            @foreach($websites as $website)
            <option value="{{ $website->id }}">{{ $website->url }}</option>
            @endforeach
        </select>
    </div>

    <!-- Website backlink rates selection -->
    <div class="form-group" id="backlink_rates_container">
        <label for="website_backlink_rate_id">Website Backlink Rates</label>
        <select name="website_backlink_rate_id[]" id="website_backlink_rate_id" class="form-control" multiple>
            <!-- Options will be populated dynamically based on the selected website -->
        </select>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary">Create Order</button>

    <a href="{{ route('orders.index') }}" class="btn btn-danger">Cancel</a>
</form>

@endsection

@section('additional_scripts')
<script type="text/javascript">
    $(document).ready(function() {
        // Function to update website backlink rates based on the selected website
        document.getElementById('website_id').addEventListener('change', function() {
            var websiteId = this.value;
            var backlinkRatesContainer = document.getElementById('backlink_rates_container');
            var select = document.createElement('select');
            select.name = 'website_backlink_rate_id[]';
            select.id = 'website_backlink_rate_id';
            select.multiple = true;
            select.classList.add('form-control');

            // Fetch the website backlink rates for the selected website using AJAX
            fetch('/fetch-website-backlink-rates/' + websiteId)
                .then(response => response.json())
                .then(data => {
                    // Populate options with website backlink rates
                    data.forEach(rate => {
                        var option = document.createElement('option');
                        option.value = rate.id;
                        option.textContent = rate.words_count + rate.price;
                        select.appendChild(option);
                        alert('populated');
                    });
                    // Replace existing select element with the updated one
                    backlinkRatesContainer.innerHTML = '';
                    backlinkRatesContainer.appendChild(select);
                })
                .catch(error => console.error('Error fetching data:', error));
        });

    });
</script>
@endsection