@extends('layouts.app')

@section('main_content')

    <section>
        <div class="container">
            <h2>Metti in vendita il tuo fumetto</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Create form --}}
            <form action="{{ route('comics.store') }}" method="post">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="poster">Poster</label>
                    <input type="text" class="form-control" name="poster" id="poster" value="{{ old('poster') }}">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="start_date">Submission date</label>
                    <input type="text" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}">
                </div>

                <input type="submit" class="btn btn-primary" value="Vendi Fumetto">
            </form>
            {{-- End create form --}}
        </div>
    </section>
    
@endsection