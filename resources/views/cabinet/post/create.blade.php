@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/modules.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container">

        <form action="{{ route('cabinet.post.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card mb-3">
                    <div class="card-header">
                        Создание поста
                    </div>

                    <div class="card-body pb2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class="col-form-label">{{ __('messages.title') }}</label>
                                    <input id="title" type="text"
                                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"
                                           value="{{ old('title') }}" required>
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">{{ __('messages.category') }}</label>
                                    <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" id="category" name="category_id">
                                        <option>Выберите категорию</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ (int)old('category_id') === $category->id ? 'selected' : '' }}>
                                                @for($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="img" class="col-form-label">{{ __('messages.image') }}</label>
                            <input type="file" class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}" name="img" id="postImg">
                            @if ($errors->has('img'))
                                <span class="invalid-feedback">
                                 <strong>{{ $errors->first('img') }}</strong>
                             </span>
                            @endif
                        </div>



                        <div class="form-group">
                            <label for="description" class="col-form-label">{{ __('messages.description') }}</label>
                            <textarea name="description" id="description"
                                      class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="10">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="invalid-feedback">
                                 <strong>{{ $errors->first('description') }}</strong>
                             </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                </div>
            </form>

    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/post/create.js') }}" defer></script>
@endsection
