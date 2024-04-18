@extends('layouts.app')

@section('title', 'Websites List')

@section('content')
    <div class="container">
        <h1 class="my-4">Websites List</h1>

        <div class="card mb-4 text-info bg-dark">
            <div class="card-body">
                <h5 class="card-title">Website Details</h5>
                <p><strong>URL:</strong> {{ $website->url }}</p>
                <p><strong>Details:</strong> {{ $website->details }}</p>
                <p><strong>Status:</strong> {{ $website->website_status }}</p>
            </div>
        </div>

        <div class="card mb-4" id="show-cat">
            <div class="card-body">
                <h5 class="card-title">Categories</h5>
                <ul class="list-group">
                    @foreach ($website->categories as $category)
                        <li class="list-group-item">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="card mb-4" id="show-pac">
            <div class="card-body">
                <h5 class="card-title">Packages</h5>
                <ul class="list-group">
                    @foreach ($website->websiteBacklinkRates as $rate)
                        <li class="list-group-item">
                            <strong>Words Count:</strong> {{ $rate->words_count }}, 
                            <strong>Price:</strong> {{ $rate->price }}, 
                            <strong>Backlinks:</strong> {{ $rate->max_number_of_links }},
                            <a href="{{ route('orders.provide_details', ['website_id' => $website->id, 'rate_id' => $rate->id ]) }}" class="btn btn-primary">Buy</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
