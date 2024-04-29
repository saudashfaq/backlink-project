<!-- resources/views/orders/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Provide Backlink Details')

@section('content')
    <div class="container">
        <h1 class="text-center mt-5 mb-4">Provide Details</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('failure'))
            <div class="alert alert-danger">
                {{ session('failure') }}
            </div>
        @endif

        <form action="{{ route('orders.store', [$rate->id]) }}" method="post">
            @csrf
            @method('post')

            @if ($rate && $rate->max_number_of_links )
                @php $x = 1; @endphp
                @while ($x < $rate->max_number_of_links)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                @if ($x == 1)
                                    <label for="inputLink">Link</label>
                                @endif
                                <input type="text" class="form-control" name="Links[{{$x}}]" placeholder="Input Link" value="{{ old("Links.$x", '') }}">
                                @error("Links.$x")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                @if ($x == 1)
                                    <label for="inputParaphrase">Paraphrase</label>
                                @endif
                                <input type="text" class="form-control" name="Phrases[{{$x}}]" placeholder="Input Paraphrase" value="{{ old("Phrases.$x", '') }}">
                                @error("Phrases.$x")
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @php $x++; @endphp
                @endwhile
            @endif

            <div class="form-group">
                <label for="buyer_id">Instructions:</label>
                <textarea name="instructions" class="form-control">{{ old('instructions', '') }}</textarea>
                @error("instructions")
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Add more form fields as needed -->

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Buy Now</button>
            </div>
        </form>
    </div>
@endsection
