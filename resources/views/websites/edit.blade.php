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

<!-- Form for editing website details -->
<form action="{{ route('websites.update', ['id' => $website->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Website URL input -->
    <div class="form-group">
        <label for="url">Website URL</label>
        <input type="text" name="url" id="url" class="form-control" value="{{ $website->url }}">
        @error('url')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    

    <!-- Website details input -->
    <div class="form-group">
        <label for="details">Details</label>
        <textarea name="details" id="details" class="form-control" rows="4">{{ $website->details }}</textarea>
        @error('details')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Website status input -->
    <div class="form-group">
        <label for="website_status">Website Status</label>
        <select name="website_status" id="website_status" class="form-control">
            <option value="In Review" {{ $website->website_status === 'In Review' ? 'selected' : '' }}>In Review</option>
            <option value="Rejected" {{ $website->website_status === 'Rejected' ? 'selected' : '' }}>Rejected</option>
            <option value="Approved" {{ $website->website_status === 'Approved' ? 'selected' : '' }}>Approved</option>
        </select>
        @error('website_status')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- is_visible input -->
    <div class="form-group">
        <label for="is_visible">Visibility</label>
        <div class="form-check">
            <input type="checkbox" name="is_visible" id="is_visible" class="form-check-input" value="1" {{ old('is_visible', $website->is_visible) == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="is_visible">Visible</label>
        </div>
        <!-- Display validation error for is_visible -->
        @error('is_visible')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>


    <!-- Backlink rates -->
    <div class="form-group" id="backlink_rates_container">
        <label for="backlink_rates">Packages</label>
        <div id="backlink_rates">
            @foreach($website->websitebacklinkrates as $index => $rate)
            <div class="rate">
                <input type="hidden" name="backlink_rates[{{ $index }}][id]" value="{{ $rate->id }}">
                <label>Words Count:</label>
                <input type="text" name="backlink_rates[{{ $index }}][words_count]" value="{{ $rate->words_count }}">
                @error('backlink_rates.'.$index.'.words_count')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label>Price:</label>
                <input type="text" name="backlink_rates[{{ $index }}][price]" value="{{ $rate->price }}">
                @error('backlink_rates.'.$index.'.price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label>Max Number of Links:</label>
                <input type="text" name="backlink_rates[{{ $index }}][max_number_of_links]" value="{{ $rate->max_number_of_links }}">
                @error('backlink_rates.'.$index.'.max_number_of_links')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <button type="button" class="btn btn-danger btn-sm remove-rate">Remove</button>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-success btn-sm add-rate">Add Rate</button>
    </div>


    <!-- Categories with checkbox -->
    @php 
        $website_categories = $website->categories->pluck('id')->toArray()
    @endphp
    <div class="form-group">
        <label for="categories">Categories</label>
        <select style="height: 0px; width:0px; visibility:hidden;" name="categories[]" id="categories" class="form-control" multiple>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', $website_categories)) ? 'selected' : '' }}>
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}" {{ in_array($category->id, old('categories', $website_categories)) ? 'checked' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>




    <!-- Submit button -->
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('websites.index') }}"  class="btn btn-danger">Cancel</a>
</form>


@endsection

@section('additional_scripts')
    <script type="text/javascript">

    $(document).ready(function() {
        
        // Function to add a new backlink rate
        $(document).on('click', '.add-rate', function() {
            var index = $('#backlink_rates .rate').length;
            var newRate = `
                <div class="rate">
                    <input type="hidden" name="backlink_rates[${index}][id]" value="">
                    <label>Words Count:</label>
                    <input type="text" name="backlink_rates[${index}][words_count]" value="350">
                    <label>Price:</label>
                    <input type="text" name="backlink_rates[${index}][price]" value="5">
                    <label>Max Number of Links:</label>
                    <input type="text" name="backlink_rates[${index}][max_number_of_links]" value="3">
                    <button type="button" class="btn btn-danger btn-sm remove-rate">Remove</button>
                </div>`;
            $('#backlink_rates').append(newRate);
        });

        // Function to remove a backlink rate
        $(document).on('click', '.remove-rate', function() {
            $(this).closest('.rate').remove();
        });

    });
       
        
    </script>
@endsection