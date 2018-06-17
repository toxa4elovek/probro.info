<?php
/**
 *
 */

namespace App\Services\Cabinet;


use App\Entity\Post\Post;
use App\Helpers\FileHelper;
use App\Helpers\PostHelper;
use App\Http\Requests\Cabinet\PostRequest;
use App\Http\Requests\Cabinet\PostUpdateRequest;
use App\Services\Admin\Post\SeoService;
use Illuminate\Http\UploadedFile;

class PostService
{

    public function save(PostRequest $request)
    {
        $post = Post::add([
            'owner_id' => $request['user_id'] ? $request['user_id'] : \Auth::id(),
            'title' => $request['title'],
            'category_id' => $request['category_id'],
            'description' => $request['description'],
            'img' => FileHelper::upload($request['img']),
            'status' => PostHelper::STATUS_DRAFT,
            'slug' => str_slug($request['title'])
        ]);

        $post->seo()->create();

        return $post;
    }

    public function update(PostUpdateRequest $request, Post $post): bool
    {
        if ($post->isActive()) {
            throw new \DomainException('Нельзя редактировать опубликованный пост');
        }

        if ($post->isEmptySeo()) {
            $post->seo()->create();
        }

        return $post->update([
            'title' => $request['title'],
            'category_id' => $request['category_id'],
            'description' => $request['description'],
            'status' => PostHelper::STATUS_DRAFT,
            'img' => $request['img'] instanceof UploadedFile
                ? FileHelper::upload($request['img'])
                : $post->img,
            'slug' => str_slug($request['title'])
        ]);
    }

    /**
     * @param $postId
     */
    public function moderate($postId)
    {
        $post = $this->getPost($postId);

        if ($post->isModerate()) {
            throw new \DomainException('Пост уже находится на модерации');
        }

        if (!$post->onModerate()) {
            throw new \DomainException('Произошла ошибка');
        }
    }

    public function activate(Post $post)
    {
        if ($post->isActive()) {
            throw new \DomainException('Пост уже опубликован');
        }

        if ($post->isDraft()) {
            throw new \DomainException('Для публикации отправьте пост на модерацию');
        }

        if ($post->isEmptySeo()) {
            throw new \DomainException('Для публикации необходимо заполнить СЕО');
        }

        $post->activate();
    }

    public function delete(Post $post)
    {
        if ($post->isActive()) {
            throw new \DomainException('Нельзя удалить опубликованный пост для начала снимите с публикации');
        }

        $post->delete();
    }

    public function moveToDraft(Post $post)
    {
        if (!$post->isActive()) {
            throw new \DomainException('Нельзя снять с публикации не опубликованный пост');
        }

        $post->moveToDraft();
    }

    /**
     * @param $postId
     * @return Post
     */
    private function getPost($postId)
    {
        return Post::findOrFail($postId);
    }
}