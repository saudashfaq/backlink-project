@extends('layouts.app')

@section('title', 'Websites List')

@section('content')
    <h1>Websites List</h1>

    @if(count($websites) > 0)
        <ul class="list-group">
            @foreach($websites as $website)
                <li class="list-group-item">
                    <strong>{{ $website->url }}</strong>
                    <br>
                    Content Available: {{ $website->content_available ? 'Yes' : 'No' }}
                    <br>
                    Other Info: {{ $website->other_info ?? 'N/A' }}
                    <br>
                    Status: {{ $website->status }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No websites found.</p>
    @endif
@endsection
