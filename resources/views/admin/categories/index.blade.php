@extends('layouts.app')


@section('content')
    <div class="container">
        @include('admin._nav', ['page' => 'category'])
        <div class="row">

            <p><a href="{{ route('admin.category.create') }}" class="btn btn-success">Добавить категорию</a></p>

            @include('admin.categories.table', $categories)
        </div>
    </div>

@endsection