@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('elements.category', ['categories' => ['Посты', 'Новости']])

        @include('elements.posts')

    </div>
</div>
@endsection
