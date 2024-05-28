@extends('layouts.app')

@section('title', 'Website Details')

@section('content')
<div class="container">
    <h1 class="my-4">Website Details</h1>

    <!-- Domain Details Section -->
    <div class="card mb-4 website-details">
        <div class="card-body">
            <h5 class="card-title">Domain Details Section:</h5>
            <p><strong>URL:</strong> {{ $website->url }}</p>
            <p><strong>Details:</strong> {{ $website->details }}</p>
            <p><strong>Status:</strong> {{ $website->website_status }}</p>
            <p><strong>Success rate:</strong> {{ $website->success_rate }}</p>
            <p><strong>Seller:</strong> {{ $website->seller }}</p>
        </div>
    </div>

    <!-- Categories Dropdown Section -->
    <div class="card mb-4 website-categories">
        <div class="card-body">
            <h5 class="card-title"><b>Categories</b></h5>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="categoriesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Category
                </button>
                <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                    @foreach ($website->categories as $category)
                    <a class="dropdown-item" href="#">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Packages Section as Table -->
    <div class="card mb-4 website-packages">
        <div class="card-body">
            <h5 class="card-title"><b>Packages</b></h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Words Count</th>
                            <th>Price</th>
                            <th>Backlinks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($website->websiteBacklinkRates as $rate)
                        <tr>
                            <td>{{ $rate->words_count }}</td>
                            <td>${{ $rate->price }}</td>
                            <td>{{ $rate->max_number_of_links }}</td>
                            <td>
                            <form action="{{ route('orders.add_to_cart', ['id' => $website->id, 'website_id' => $website->id, 'rate_id' => $rate->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-info">Add to cart</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection