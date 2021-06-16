@extends('layouts.app')

@section('main_content')
    <section>
        <div class="container">
            <h1>Modifica info Fumetto: {{ $comic->title }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Edit form --}}
            <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Nome</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $comic->title }}">
                </div>

                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $comic->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="poster">Poster</label>
                    <input type="text" class="form-control" name="poster" id="poster" value="{{ $comic->poster }}">
                    <img style="max-height: 100px" src="{{ $comic->poster }}">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price" value="{{ $comic->price }}">
                </div>

                <div class="form-group">
                    <label for="start_date">Submission date</label>
                    <input type="text" class="form-control" name="start_date" id="start_date" value="{{ $comic->start_date }}">
                </div>

                <input type="submit" class="btn btn-primary" value="Modifica">
            </form>
            {{-- End Edit form --}}
        </div>
    </section>
@endsection