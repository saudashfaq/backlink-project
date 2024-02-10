@extends('layouts.app')

@section('title', 'Websites List')

@section('content')
<h1>Websites List</h1>

    <p><strong>URL:</strong> {{ $website->url }}</p>
    <p><strong>Details:</strong> {{ $website->details }}</p>
    <p><strong>Status:</strong> {{ $website->website_status }}</p>

    <p><strong>Categories:</strong></p>
    <ul>
        @foreach ($website->categories as $category)
        <li>{{ $category->name }}</li>
        @endforeach
    </ul>

    <p><strong>Packages:</strong></p>
    <ul>
        @foreach ($website->websiteBacklinkRates as $rate)
        <li>Words Count: {{ $rate->words_count }}, Price: {{ $rate->price }}, Backlinks: {{ $rate->max_number_of_links}} </li>
        @endforeach
    </ul>

    <a href="{{ route('websites.edit', $website->id) }}" class="btn btn-primary">Edit</a>


@endsection