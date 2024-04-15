@extends('layouts.app')

@section('title', 'Websites List')

@section('content')
    <div class="container">
        <h1 class="my-4">Websites List</h1>
        
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

        <div class="row mb-3">
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
            <div class="col-md-6 order-md-1">
                <a href="{{ route('websites.create') }}" class="btn btn-primary">Create New Website</a>
            </div>
        </div>

        @if(count($websites) > 0)
            <div class="row">
                @foreach($websites as $website)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
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



{{-- @extends('layouts.app')

@section('title', 'Websites List')

@section('content')
    <div class="container">
        <h1 class="my-4">Websites List</h1>
        
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

        <a href="{{ route('websites.create') }}" class="btn btn-primary mb-3">Create New Website</a>

        @if(count($websites) > 0)
            <div class="row">
                @foreach($websites as $website)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $website->url }}</h5>
                                <p class="card-text mb-1">Details: {{ $website->details ?? 'N/A' }}</p>
                                <p class="card-text mb-1">Status: {{ $website->website_status }}</p>
                                <p class="card-text mb-1">Enabled: {{ $website->is_visible ? "Yes" : "No" }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div>
                                        <a href="{{ route('websites.show', $website->id) }}" class="btn btn-primary mr-2">View</a>
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
@endsection --}}
