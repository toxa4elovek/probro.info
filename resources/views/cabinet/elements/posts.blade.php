<div class="col-md-4">
    <div class="tab-block-left nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="tab-link nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Профиль</a>
        <a class="tab-link nav-link" id="v-pills-post-tab" data-toggle="pill" href="#v-pills-post" role="tab" aria-controls="v-pills-post" aria-selected="false">Посты</a>
    </div>
</div>
<div class="col-md-8">
    <div class="tab-block-right tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div class="profile-block">
                <form action="#" method="post" class="form-active">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Name" placeholder="Имя :">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email :">
                    </div>
                    <div class="button">
                        <input type="button" class="btn btn-primary" value="Изменить">
                    </div>
                </form>
            </div>
            <div class="profile-block">
                <form action="#" method="post" class="form-active">
                    <div class="form-group">
                        <input type="password" class="form-control" name="old-password" placeholder="Старый пароль :">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="new-password" placeholder="Новый пароль :">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirm-password" placeholder="Повторите пароль :">
                    </div>
                    <div class="button">
                        <input type="button" class="btn btn-primary" value="Изменить">
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-post" role="tabpanel" aria-labelledby="v-pills-post-tab">
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
                            <div class="alert alert-error text-center">
                                Это черновик
                            </div>
                        @elseif($post->isActive())
                            <div class="alert alert-done text-center">Пост опубликован</div>
                        @elseif($post->isModerate())
                            <div class="alert alert-notice text-center">Пост находится на модерации</div>
                        @endif
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
                        <div class="post-manage-buttons">
                            @if($post->isDraft())
                                <form method="POST" action="{{ route('cabinet.post.moderate', $post) }}">
                                    @csrf
                                    <button class="btn btn-success manage-button">Опубликовать</button>
                                </form>
                                <a href="{{ route('cabinet.post.edit', $post) }}" class="btn btn-primary manage-button">Редактировать</a>
                                <form method="POST" action="{{ route('cabinet.post.destroy', $post) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger manage-button">Удалить</button>
                                </form>
                            @elseif($post->isActive())
                                <a href="" class="btn btn-outline-secondary">Снять с публикации</a>
                            @elseif($post->isModerate())
                                <form method="POST" action="{{ route('cabinet.post.destroy', $post) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger manage-button">Удалить</button>
                                </form>
                                <a href="{{ route('cabinet.post.edit', $post) }}" class="btn btn-primary">Редактировать</a>
                            @endif
                        </div>
                    </div>
                </li>

                @endforeach
            </ul>

            @else
                <h4>Постов не найдено</h4>
            @endif
        </div>
    </div>
</div>