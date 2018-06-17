<?php
/**
 *
 */

namespace App\Services\Admin\Post;


use App\Entity\Post\Post;
use App\Http\Requests\Admin\Post\SeoRequest;

class SeoService
{

    public function create(Post $post)
    {
        $post->seo()->create();
    }

    public function update(SeoRequest $request, Post $post)
    {
        $post->seo()->update([
            'title' => $request['seo_title'],
            'description' => $request['seo_description'],
            'keywords' => $request['seo_keywords']
        ]);
    }
}