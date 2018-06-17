<?php
/**
 * @var \App\Entity\Post\Post $post
 */
?>
<div class="card mb-3">
    <div class="card-body">
        <div class="row justify-content-around">
            @if($post->isDraft())
                <form action="{{ route('admin.posts.moderate', $post) }}" method="post">
                    @csrf

                    <button type="submit" class="btn btn-success">На модерацию</button>
                </form>

                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning">Редактировать</a>

                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            @elseif($post->isModerate())
                <form action="{{ route('admin.posts.activate', $post) }}" method="post">
                    @csrf

                    <button type="submit" class="btn btn-success">Опубликовать</button>
                </form>

                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning">Редактировать</a>

                <form action="{{ route('admin.posts.destroy', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            @elseif($post->isActive())
                <form action="{{ route('admin.posts.moderate', $post) }}" method="post">
                    @csrf

                    <button type="submit" class="btn btn-warning">Снять с публикации</button>
                </form>
            @endif
        </div>
    </div>
</div>
