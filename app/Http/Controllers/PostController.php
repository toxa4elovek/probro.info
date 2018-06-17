<?php

namespace App\Http\Controllers;

use App\Entity\Post\Post;
use App\Entity\Post\Category;

class PostController extends Controller
{
    public function show($slug)
    {
        $categoryCount = Category::where('parent_id', null)->count();
        $categories    = \Cache::tags(Category::class)
            ->rememberForever('main_categories' . $categoryCount, function () {
                return Category::where('parent_id', null)->get();
            });

        $post = Post::where(['slug' => $slug])->with('owner')->first();

        return view('post.view', compact('categories', 'post'));
    }
}
