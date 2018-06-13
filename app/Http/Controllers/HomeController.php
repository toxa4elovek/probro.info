<?php

namespace App\Http\Controllers;

use App\Entity\Post\Category;
use App\Entity\Post\Post;
use App\Helpers\PostHelper;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', null)->get();
        $posts = Post::where('status', PostHelper::STATUS_ACTIVE)->paginate(20);

        return view('home', compact('categories', 'posts'));
    }

    public function category(Category $category)
    {
        $categories = $category->children;
        $category_ids = array_merge([$category->id], $categories->pluck('id')->toArray());
        $posts = Post::whereIn('category_id', $category_ids)->getModels();

        return view('home', compact('categories', 'posts', 'category'));
    }
}
