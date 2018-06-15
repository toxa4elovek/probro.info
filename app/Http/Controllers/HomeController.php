<?php

namespace App\Http\Controllers;

use App\Entity\Post\Category;
use App\Entity\Post\Post;
use App\Helpers\PostHelper;
use App\Http\Router\CategoryPath;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryCount = Category::where('parent_id', null)->count();
        $categories    = \Cache::tags(Category::class)
            ->rememberForever('main_categories' . $categoryCount, function () {
                return Category::where('parent_id', null)->get();
            });
        $posts         = \Cache::tags(Post::class)
            ->rememberForever('post_main', function () {
                return Post::where('status', PostHelper::STATUS_ACTIVE)->with('owner')->paginate(20);
            });

        return view('home', compact('categories', 'posts'));
    }

    public function category(CategoryPath $categoryPath)
    {
        $categories   = $categoryPath->category->children;
        $category_ids = array_merge(
            [$categoryPath->category->id],
            $categoryPath->category->descendants()->pluck('id')->toArray()
        );
        $posts        = Post::whereIn('category_id', $category_ids)->with('owner')->paginate(20);
        $categoryName = $categoryPath->category->name;
        $category     = $categoryPath->category;

        return view('home', compact('categories', 'posts', 'category', 'categoryName'));
    }
}
