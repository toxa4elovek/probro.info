@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('elements.category', ['categories' => $categories])

        @include('elements.posts', ['posts' => $posts])

    </div>
</div>
@endsection
