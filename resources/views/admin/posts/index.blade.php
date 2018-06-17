
@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin._nav', ['page' => 'post'])
        <div class="row">

            <a href="{{ route('admin.posts.create') }}" class="btn btn-done mb-1">Добавить пост</a>

            <table class="table table-bordered table-stripped col-md-12">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Пользователь</th>
                    <th>Заголовок</th>
                    <th>Краткое описание</th>
                    <th>Статус</th>
                    <th>Дата создания</th>
                </tr>
                </thead>

                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            <a href="{{ route('admin.posts.show', $post) }}">{{ $post->id }}</a>
                        </td>
                        <td>
                            {{ $post->owner->name }}
                        </td>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            {!!  str_limit($post->description, 200) !!}
                        </td>
                        <td>
                            @if($post->isDraft())
                                <span class="badge badge-danger">Черновик</span>
                            @elseif($post->isActive())
                                <span class="badge badge-success">Активен</span>
                            @elseif($post->isModerate())
                                <span class="badge badge-warning">На модерации</span>
                            @endif
                        </td>
                        <td>
                            {{ $post->created_at->format('d-m-Y') }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection