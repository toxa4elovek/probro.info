@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @foreach($posts as $post)

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{!! nl2br($post->description) !!}</p>
                        <p class="card-text"><small class="text-muted">{{ $post->published_at }}</small></p>
                    </div>
                    <img class="card-img-bottom" src="{{ $post->img }}" alt="{{ $post->title }}">
                </div>

            @endforeach

        </div>
    </div>

@endsection