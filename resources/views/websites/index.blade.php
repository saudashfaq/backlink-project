@extends('layouts.app')

@section('title', 'Websites List')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center display-3">Websites List</h1>

        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif

        <!-- Search Bar -->
        <div class="col-md-6 order-md-2">
            <form action="#" method="GET" class="form-inline">
                <div class="form-group mr-2">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                </div>
                <button type="submit" class="btn btn-secondary">Search
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <!-- Create New Website Button -->
        <div class="col-md-3 order-md-3">
            <a href="{{ route('websites.create') }}" class="btn btn-primary">Create New Website</a>
        </div>
    </div>

    <div class="row">
        <!-- Filter Section -->
        <div class="col-md-3 order-md-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Filter</h5>
                    <form action="" method="POST">
                        <!-- Max Price -->
                        <div class="form-group">
                            <label for="max_price">Max Price</label>
                            <input type="number" class="form-control" id="max_price" name="max_price">
                        </div>
                        <!-- Min Price -->
                        <div class="form-group">
                            <label for="min_price">Min Price</label>
                            <input type="number" class="form-control" id="min_price" name="min_price">
                        </div>
                        <!-- Word Count -->
                        <div class="form-group">
                            <label for="word_count">Word Count</label>
                            <input type="number" class="form-control" id="word_count" name="word_count">
                        </div>
                        <!-- Sorting Options -->
                        <div class="form-group">
                            <label for="sorting">Sort By</label>
                            <select class="form-control" id="sorting" name="sorting">
                                <option value="alphabetical_asc">Alphabetical (A-Z)</option>
                                <option value="alphabetical_desc">Alphabetical (Z-A)</option>
                                <option value="price_asc">Price (Low to High)</option>
                                <option value="price_desc">Price (High to Low)</option>
                            </select>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- Additional Filter Columns -->
        <div class="col-md-3 order-md-1">
            <div class="card">
                <div class="card-body">
                    <!-- Duplicate Filter Column Code Here -->
                    <h5 class="card-title">Filter</h5>
                    <form action="#" method="GET">
                        <!-- Max Price -->
                        <div class="form-group">
                            <label for="max_price">Max Price</label>
                            <input type="number" class="form-control" id="max_price" name="max_price">
                        </div>
                        <!-- Min Price -->
                        <div class="form-group">
                            <label for="min_price">Min Price</label>
                            <input type="number" class="form-control" id="min_price" name="min_price">
                        </div>
                        <!-- Word Count -->
                        <div class="form-group">
                            <label for="word_count">Word Count</label>
                            <input type="number" class="form-control" id="word_count" name="word_count">
                        </div>
                        <!-- Sorting Options -->
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="alphabetical_asc">Alphabetical (A-Z)</option>
                                <option value="alphabetical_desc">Alphabetical (Z-A)</option>
                                <option value="price_asc">Price (Low to High)</option>
                                <option value="price_desc">Price (High to Low)</option>
                            </select>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 order-md-1">
            <div class="card">
                <div class="card-body">
                    <!-- Duplicate Filter Column Code Here -->
                    <h5 class="card-title">Filter</h5>
                    <form action="#" method="GET">
                        <!-- Max Price -->
                        <div class="form-group">
                            <label for="max_price">Max Price</label>
                            <input type="number" class="form-control" id="max_price" name="max_price">
                        </div>
                        <!-- Min Price -->
                        <div class="form-group">
                            <label for="min_price">Min Price</label>
                            <input type="number" class="form-control" id="min_price" name="min_price">
                        </div>
                        <!-- Word Count -->
                        <div class="form-group">
                            <label for="word_count">Word Count</label>
                            <input type="number" class="form-control" id="word_count" name="word_count">
                        </div>
                        <!-- Sorting Options -->
                        <div class="form-group">
                            <label for="sorting">Sort By</label>
                            <select class="form-control" id="sorting" name="sorting">
                                <option value="alphabetical_asc">Alphabetical (A-Z)</option>
                                <option value="alphabetical_desc">Alphabetical (Z-A)</option>
                                <option value="price_asc">Price (Low to High)</option>
                                <option value="price_desc">Price (High to Low)</option>
                            </select>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(count($websites) > 0)
        <div class="row">
            @foreach($websites as $website)
                <div class="col-md-6 mb-4 mt-2">
                    <div class="card">
                        <div class="card-body" id="cards-body">
                            <h5 class="card-title">{{ $website->url }}</h5>
                            <p class="card-text mb-1">Details: {{ $website->details ?? 'N/A' }}</p>
                            <p class="card-text mb-1">Status: {{ $website->website_status }}</p>
                            <p class="card-text mb-1">Enabled: {{ $website->is_visible ? "Yes" : "No" }}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    <a href="{{ route('websites.show', $website->id) }}" class="btn btn-info mr-2">View</a>
                                    <a href="{{ route('websites.edit', $website->id) }}" class="btn btn-warning mr-2">Edit</a>
                                </div>
                                <form method="POST" action="{{ route('websites.destroy', $website->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No websites found.</p>
        @endif
        </div>
        @endsection
