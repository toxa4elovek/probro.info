@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin._nav', ['page' => 'post'])


            <table class="table table-bordered table-stripped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Краткое описание</th>
                    <th>Краткое описание</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            @for($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                            <a href="{{ route('admin.category.show', $category) }}">{{ $category->name }}</a>
                        </td>
                        <td>
                            {{ $category->slug }}
                        </td>

                        <td>
                            {{ $category->posts->count() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection