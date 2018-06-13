@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin._nav', ['page' => 'category'])
        <div class="row">

            <form method="post" action="{{ route('admin.category.update', $category) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="col-form-label">Название</label>
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           name="name" value="{{ old('name', $category->name) }}" required>

                    @if($errors->has('name'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="slug" class="col-form-label">Url</label>
                    <input id="slug" type="text" class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                           name="slug" value="{{ old('slug', $category->slug) }}" required>

                    @if($errors->has('slug'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="parent" class="col-form-label">Родитель</label>
                    <select name="parent" class="form-control" id=parent"">
                        <option value=""></option>
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}" {{ $parent->id === $category->parent_id ? ' selected' : ''}}>
                                @for($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                                {{ $parent->name }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('parent'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('parent') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Обновить</button>
                </div>
            </form>

        </div>
    </div>
@endsection