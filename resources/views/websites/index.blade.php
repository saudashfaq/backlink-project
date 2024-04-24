@extends('layouts.app')

@section('title', 'Websites List')

@section('content')
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
             <div class="row">
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
                {{-- <div class="col-md-6 order-md-3 text-md-right">
                    <a href="/" class="btn btn-dark">Add to cart</a>
                </div>
            </div> --}}
            

            
        </div>
        
        <div class="container">
            <div class="row justify-content-center">
                <!-- Filter Section -->
                <div class="col-md-12">
                    <h1 class="text-center" id="filter">Filter</h1>
                </div>
                <!-- Single Form Tag -->
                <form action="#" method="GET" class="col-md-8">
                    <div class="row">
                        <!-- First Filter Column -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
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
                                            <option value="busines">Busines</option>
                                            <option value="web-development">Web-development</option>
                                            <option value="books">Books</option>
                                            <option value="design">Design</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Second Filter Column -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
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
    <div class="col-md-6 mb-4 mt-2">
        <div class="card website-card">
            <div class="card-body">
                <h5 class="card-title">{{ $website->url }}</h5>
                <p class="card-text mb-1">Details: {{ $website->details ?? 'N/A' }}</p>
                <p class="card-text mb-1">Status: {{ $website->website_status }}</p>
                <p class="card-text mb-1">Enabled: {{ $website->is_visible ? "Yes" : "No" }}</p>
                <div class="button-group mt-3">
                    <a href="{{ route('websites.show', $website->id) }}" class="btn btn-primary mr-2">View</a>
                    <a href="{{ route('websites.edit', $website->id) }}" class="btn btn-warning mr-2">Edit</a>
                    <a href="/" class="btn btn-dark mr-2">Purchase</a>
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
