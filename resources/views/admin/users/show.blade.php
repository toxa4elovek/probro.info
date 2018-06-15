@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin._nav', ['page' => 'category'])
        <div class="row">

            <div class="d-flex flex-row mb-3">
                <form method="post" action="{{ route('admin.users.create', $category) }}" class="mr-1">
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

        </div>
    </div>
@endsection