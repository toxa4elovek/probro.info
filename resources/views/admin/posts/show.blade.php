@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('admin.posts.elements.admin-panel', ['post' => $post])

                <ul class="post-list">
                    <li class="post-block">
                        <div class="post-block-header">
                            <h3>
                                <a class="post-block-header-link" href="#">{{ $post->title }}</a>
                            </h3>
                        </div>
                        <div class="post-block-content">
                            <div class="post-block-content-body">
                                <div class="body-content">
                                    <img class="body-img-full rounded float-left img-fluid" src={{ $post->img }} alt="">
                                    <p class="body-text text-justify">
                                        {{ $post->description }}
                                    </p>
                                </div>
                                <div class="statistics clear">
                                    <div class="post-statistics">
                                        <a href="#" class="fa fa-calendar">
                                            <time>{{ $post->published_at }}</time>
                                        </a>
                                    </div>
                                    <div class="post-statistics">
                                        <a href="#" class="fa fa-user">
                                            <span>{{ $post->owner->name }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Сео</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->seo->title }}</h6>
                    <p class="card-text">{{ $post->seo->description }}</p>
                    <p class="card-text">{{ $post->seo->keywords }}</p>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection