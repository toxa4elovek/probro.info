<div class="col-md-8">
    @if(count($posts) > 0)

    <ul class="post-list">

        @foreach($posts as $post)

        <li class="post-block">
            <div class="post-block-header">
                <h3>
                    <a class="post-block-header-link" href="#">{{ $post->title }}</a>
                </h3>
            </div>
            <div class="post-block-content">
                <nav aria-label="post-block-content-breadcrumb breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Категория</a></li>
                        <li class="breadcrumb-item"><a href="#">Категория</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Категория</li>
                    </ol>
                </nav>
                <div class="post-block-content-body">
                    <div class="body-content">
                        <img class="body-img rounded float-left img-fluid" src={{ $post->img }} alt="">
                        <p class="body-text text-justify">
                            {!! str_limit(nl2br($post->description), 800) !!}
                        </p>
                    </div>
                    <div class="read-more">
                        <a href="#">Читать далее</a>
                    </div>
                    @if($post->isDraft())
                        <div class="alert alert-danger text-center">
                            Это черновик
                        </div>
                    @elseif($post->isActive())
                        <div class="alert alert-success text-center">Пост опубликован</div>
                    @elseif($post->isModerate())
                        <div class="alert alert-warning text-center">Пост находится на модерации</div>
                    @endif
                    <div class="statistics clear">
                        <div class="post-statistics">
                            <a href="#" class="fa fa-calendar">
                                <time>{{ $post->created_at }}</time>
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
            <div class="row justify-content-center mb-3">
                @if($post->isDraft())
                    <form method="POST" action="{{ route('cabinet.post.moderate', $post) }}" class="mr-3">
                        @csrf
                        <button class="btn btn-success">Опубликовать</button>
                    </form>
                    <a href="{{ route('cabinet.post.edit', $post) }}" class="btn btn-primary mr-3">Редактировать</a>
                    <form method="POST" action="{{ route('cabinet.post.destroy', $post) }}" class="mr-3">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Удалить</button>
                    </form>
                @elseif($post->isActive())
                    <a href="" class="btn btn-warning mr-3">Снять с публикации</a>
                @elseif($post->isModerate())
                    <form method="POST" action="{{ route('cabinet.post.destroy', $post) }}" class="mr-3">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Удалить</button>
                    </form>
                    <a href="{{ route('cabinet.post.edit', $post) }}" class="btn btn-primary mr-3">Редактировать</a>
                @endif
            </div>
        </li>

        @endforeach
    </ul>

    @else
        <h4>Постов не найдено</h4>
    @endif
</div>