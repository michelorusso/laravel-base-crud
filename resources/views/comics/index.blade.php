@extends('layouts.app')

@section('main_content')
    <h2>Comic Shop</h2>

    <section>
        <div class="container">

            <div class="row">

                @foreach ($comics as $comic)
                    
                <div class="col-3">
                    <div class="card" style="width: 18rem; text-align: center">
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

                          <form style="text-align: center" action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <input type="submit" class="btn btn-danger" value="Delete" onClick="return confirm('are you sure you want to delete the comic?');">
                            </form>

                        </div>
                      </div>
                </div>

                @endforeach
            </div>

        </div>
    </section>

@endsection