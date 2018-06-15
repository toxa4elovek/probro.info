@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin._nav', ['page' => 'category'])
        <div class="row">

            <div class="d-flex flex-row mb-3">
                <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-primary mr-1">Редактировать</a>


                <form method="post" action="{{ route('admin.category.destroy', $category) }}" class="mr-1">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">Удалить</button>
                </form>
            </div>

            <table class="table table-bordered table stripped">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $category->id }}</td>
                </tr>
                <tr>
                    <th>Название</th>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <th>Url</th>
                    <td>{{ $category->slug }}</td>
                </tr>
                </tbody>
            </table>
            <h3>Дочерние категории</h3>
            @include('admin.categories.table', ['categories' => $children])

        </div>
    </div>
@endsection