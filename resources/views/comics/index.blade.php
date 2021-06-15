@extends('layouts.app')

@section('main_content')
    <h2>Comic Shop</h2>

    <section>
        <div class="container">

            <div class="row">

                @foreach ($comics as $comic)
                    
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $comic->poster }}" alt="{{ $comic->title }}">
                        <div class="card-body">
                          <h5 class="card-title">{{ $comic->title }}</h5>
                          <a href="{{ route('comics.show', [
                              'comic' => $comic->id
                          ]) }}" class="btn btn-primary">Look Details</a>
                        </div>
                      </div>
                </div>

                @endforeach
            </div>

        </div>
    </section>

@endsection