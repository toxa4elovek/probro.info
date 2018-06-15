<?php
/**
 *
 */

namespace App\Services\Cabinet;


use App\Entity\Post\Post;
use App\Helpers\PostHelper;
use App\Http\Requests\Cabinet\PostRequest;
use Illuminate\Http\UploadedFile;

class PostService
{

    public function save(PostRequest $request)
    {
        $post = Post::add([
            'owner_id' => \Auth::id(),
            'title' => $request['title'],
            'category_id' => $request['category_id'],
            'description' => $request['description'],
            'img' => $this->saveFile($request['img']),
            'status' => PostHelper::STATUS_DRAFT,
            'slug' => str_slug($request['title'])
        ]);

        return $post;
    }

    private function saveFile(UploadedFile $file): string
    {
        $fileName = $file->hashName();
        $directory = substr($fileName, 0, 3) . '/'
                    .substr($fileName, 0, 2);

        return 'storage/' . $file->store('posts/' . $directory, 'public');
    }

    /**
     * @param $postId
     */
    public function moderate($postId)
    {
        $post = Post::findorFail($postId);

        /**@var Post $post*/
        if ($post->isModerate()) {
            throw new \DomainException('Пост уже находится на модерации');
        }
        if ($post->isActive()) {
            throw new \DomainException('Пост опубликован и не может быть отправлен на модерацию');
        }

        if (!$post->onModerate()) {
            throw new \DomainException('Произошла ошибка');
        }
    }

    public function delete(Post $post)
    {
        if ($post->isActive()) {
            throw new \DomainException('Нельзя удалить опубликованный пост для начала снимите с публикации');
        }

        $post->delete();
    }
}