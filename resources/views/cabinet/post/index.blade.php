@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @include('elements.posts', ['posts' => $posts, 'categoryName' => 'Мои посты'])

        </div>
    </div>

@endsection