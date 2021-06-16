@extends('layouts.app')

@section('main_content')

    <section>
        <div class="container">
            <h1>Title: {{ $comic->title }}</h1>

            <div class="card">
                <img class="card-img-top" style="width: 200px" src="{{ $comic->poster }}" alt="{{ $comic->title }}">
                <div class="card-body">
                
                    @if($comic->description)
                    <p class="card-text">{{ $comic->description }}</p>
                    @endif

                    <div class="card-text"><b>Price:</b>: {{ $comic->price }}</div>

                    <div class="card-text"><b>Submission date:</b>  {{ $comic->start_date }}</div>
                    
                </div>
            </div>
        </div>
    </section>
    
@endsection