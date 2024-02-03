<!-- resources/views/websites/create.blade.php -->

@extends('layouts.app')

@section('title', 'Create Website')

@section('content')
    <h1>Create Website</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('websites.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="url">URL:</label>
            <input type="url" name="url" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content_available">Content Available:</label>
            <input type="checkbox" name="content_available" class="form-check-input">
        </div>

        <div class="form-group">
            <label for="other_info">Other Info:</label>
            <textarea name="other_info" class="form-control"></textarea>
        </div>

        <div class="form-group">
    <label for="status">Status:</label>
    <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="status" name="status" checked>
        <label class="custom-control-label" for="status">Active</label>
    </div>
</div>

        <div class="form-group">
            <label for="categories">Categories:</label>
            <select name="categories[]" class="form-control" multiple>
                <!-- Populate categories dynamically based on your database or a predefined list -->
                <!-- Example: -->
                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <div class="form-group">
            <label for="backlink_type">Backlink Type:</label>
            <select name="backlink_type" class="form-control">
                <!-- Populate backlink types dynamically based on your database or a predefined list -->
                <!-- Example: -->
                <option value="backlink">Backlink</option>
                <option value="guest_post">Guest Post</option>
                <!-- Add more options as needed -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
