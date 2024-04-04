<!-- resources/views/orders/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Provide Backlink Details')

@section('content')
    <h1>Provide Details</h1>

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

        @if ( $rate && $rate->max_number_of_links )
            
            @php $x = 1; @endphp
            
            @while ($x < $rate->max_number_of_links)
                
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                        
                        @if ($x == 1)
                            <label for="inputLink">Link</label>    
                        @endif
                        
                        <input type="text" class="form-control" name="Links[{{$x}}]" placeholder="Input Link" value="{{ old("Links.$x", '') }}">
                        
                        @error("Links.$x")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-auto my-1">
                        
                        @if ($x == 1)
                            <label for="inputParaphrase">Paraphrase</label>    
                        @endif
                        
                        <input type="text" class="form-control" name="Phrases[{{$x}}]" placeholder="Input Paraphrase" value="{{ old("Phrases.$x", '') }}">
                        
                        @error("Phrases.$x")
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                    
                @php $x++; @endphp

            @endwhile
            
        @endif
   

        <!-- Add form fields based on your schema -->
        <div class="form-group">
            <label for="buyer_id">Instructions:</label>
            <textarea name="instructions" class="form-control" >{{ old('instructions', '') }}</textarea>
            @error("instructions")
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Add more form fields as needed -->

        <button type="submit" class="btn btn-primary">Buy Now</button>
    </form>
@endsection
