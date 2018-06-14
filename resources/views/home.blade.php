@extends('layouts.app')

@if(Request::is('category/*'))
    @section('meta')
        <title>ProBro | {{$category->name}}</title>
    @endsection
@endif

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('elements.category', ['categories' => $categories])

        @include('elements.posts', ['posts' => $posts, 'categoryName' => 'Все'])

    </div>
</div>
@endsection
