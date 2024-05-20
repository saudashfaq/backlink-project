@extends('layouts.app')

@section('title', 'Websites List')

@section('content')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <div class="container">
        <h1 class="my-4 text-center display-3" id="head">Websites List</h1>
        
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
        <div class="row mb-4">
            <div class="col-md-6 offset-md-6">
                <form action="#" method="GET" class="form-inline">
                    <div class="form-group mr-2 mb-2 mb-md-0">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                    </div>
                    <button type="submit" class="btn btn-secondary">Search
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Filter Section -->
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-12">
                    <h2 class="text-center" id="filter">Filter</h2>
                </div>
                
                <form action="#" method="GET" class="col-md-10">
                    <div class="row">
                        <!-- First Filter Column -->
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
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
                                    <!-- Category -->
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" id="category" name="category">
                                            <option value="">Select a category</option>
                                            <option value="busines">Business</option>
                                            <option value="web-development">Web Development</option>
                                            <option value="books">Books</option>
                                            <option value="design">Design</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Second Filter Column -->
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Sorting Options -->
                                    <div class="form-group">
                                        <label for="sorting">Sort By</label>
                                        <select class="form-control" id="sorting" name="sorting">
                                            <option value="">Sorting</option>
                                            <option value="alphabetical_asc">Alphabetical (A-Z)</option>
                                            <option value="alphabetical_desc">Alphabetical (Z-A)</option>
                                            <option value="price_asc">Price (Low to High)</option>
                                            <option value="price_desc">Price (High to Low)</option>
                                        </select>
                                    </div>
                                    <!-- Min Word Count -->
                                    <div class="form-group">
                                        <label for="min_word_count">Min Word Count</label>
                                        <input type="number" class="form-control" id="min_word_count" name="min_word_count">
                                    </div>
                                    <!-- Max Word Count -->
                                    <div class="form-group">
                                        <label for="max_word_count">Max Word Count</label>
                                        <input type="number" class="form-control" id="max_word_count" name="max_word_count">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Apply Filters Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-3">Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>

        @if(count($websites) > 0)
            <div class="row">
                @foreach($websites as $website)
                    <div class="col-lg-6 mb-4">
                        <div class="card website-card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $website->url }}</h5>
                                <p class="card-text mb-1">Details: {{ $website->details ?? 'N/A' }}</p>
                                <p class="card-text mb-1">Status: {{ $website->website_status }}</p>
                                <p class="card-text mb-1">Enabled: {{ $website->is_visible ? "Yes" : "No" }}</p>
                                <div class="button-group mt-3">
                                    <a href="{{ route('websites.show', $website->id) }}" class="btn btn-primary mr-2 mb-2">View</a>
                                    <a href="{{ route('websites.edit', $website->id) }}" class="btn btn-warning mr-2 mb-2">Edit</a>
                                    <a href="/" class="btn btn-dark mr-2 mb-2">Purchase</a>
                                    <form method="POST" action="{{ route('websites.destroy', $website->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mb-2">Delete</button>
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
    <script>
        // Script to toggle the sidebar
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
@endsection
