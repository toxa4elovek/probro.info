<?php

use App\Http\Router\CategoryPath;
use App\Entity\Post\Category;

if (! function_exists('category_path')) {

    function category_path(Category $category)
    {
        return app()->make(CategoryPath::class)
            ->withCategory($category);
    }
}