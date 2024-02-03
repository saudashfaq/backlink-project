<!-- resources/views/websites/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Edit Website')

@section('content')
<h1>Edit Website</h1>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('websites.update', $website) }}" method="post">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" class="form-control" value="{{ $website->user_id }}" required>
    </div>

    <div class="form-group">
        <label for="url">URL:</label>
        <input type="url" name="url" class="form-control" value="{{ $website->url }}" required>
    </div>

    <div class="form-group">
        <label for="content_available">Content Available:</label>
        <input type="checkbox" name="content_available" class="form-check-input" {{ $website->content_available ? 'checked' : '' }}>
    </div>

    <div class="form-group">
        <label for="other_info">Other Info:</label>
        <textarea name="other_info" class="form-control">{{ $website->other_info }}</textarea>
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="status" name="status" {{ $website->status ? 'checked' : '' }}>
            <label class="custom-control-label" for="status">Active</label>
        </div>
    </div>

    <div class="form-group">
        <label for="categories">Categories:</label>
        <select name="categories[]" class="form-control" multiple>
            <!-- Populate categories dynamically based on your database or a predefined list -->
            <!-- Example: -->
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $website->categories->contains($category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="backlink_type">Backlink Type:</label>
        <select name="backlink_type" class="form-control">
            <!-- Populate backlink types dynamically based on your database or a predefined list -->
            <!-- Example: -->
            @foreach($backlinkTypes as $type)
            <option value="{{ $type }}" {{ $website->backlink_type === $type ? 'selected' : '' }}>
                {{ $type }}
            </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection