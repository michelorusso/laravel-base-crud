@extends('layouts.app')

@section('main_content')
    <h2>Comic Shop</h2>

    <section>
        <div class="container">

            <div class="row">

                @foreach ($comics as $comic)
                    
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $comic->poster }}" alt="{{ $comic->title }}">
                        <div class="card-body">

                          <h5 class="card-title" style=" font-size: 13px" >{{ $comic->title }}</h5>

                          <a href="{{ route('comics.show', [
                              'comic' => $comic->id
                          ]) }}" class="btn btn-primary" style="font-size: 13px">Look Details
                          </a>

                          <a href="{{ route('comics.edit', [
                              'comic' => $comic->id
                          ]) }}" class="btn btn-secondary" style="font-size: 13px">Edit Comic Info
                          </a>

                        </div>
                      </div>
                </div>

                @endforeach
            </div>

        </div>
    </section>

@endsection