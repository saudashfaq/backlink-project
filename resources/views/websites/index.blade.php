@extends('layouts.app')

@section('title', 'Websites List')

@section('content')
    <h1>Websites List</h1>
    <!-- Display success message if available -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <!-- Display error message if available -->
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <a href="{{ route('websites.create') }}" class="btn btn-primary mb-3">Create New Website</a>

    @if(count($websites) > 0)
        <ul class="list-group">
            @foreach($websites as $website)
                <li class="list-group-item">
                    <strong>{{ $website->url }}</strong>
                    <br>
                    Details: {{ $website->details ?? 'N/A' }}
                    <br>
                    Status: {{ $website->website_status }}
                    <br>
                    Enabled: {{ $website->is_visible  ? "Yes" : "No" }}
                    
                </li>
                <li>
                    <a href="{{ route('websites.show', $website->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('websites.edit', $website->id) }}" class="btn btn-warning">Edit</a>

                    
                    <form method="POSt" action="{{ route( 'websites.destroy', $website->id ) }}">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    
                        
                    <!-- Add delete functionality if required -->
                </li>
                
            @endforeach
        </ul>
    @else
        <p>No websites found.</p>
    @endif
@endsection
