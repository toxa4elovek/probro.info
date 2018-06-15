<?php
/**
 *
 */

namespace App\Http\Router;


use App\Entity\Post\Category;
use Illuminate\Contracts\Routing\UrlRoutable;

/**
 * Class CategoryPath
 * @package App\Http\Router
 */
class CategoryPath implements UrlRoutable
{
    public $category;

    public function withCategory(Category $category)
    {
        $clone = clone $this;
        $clone->category = $category;

        return $clone;
    }

    public function getRouteKey()
    {
        return \Cache::tags(Category::class)->rememberForever('category_path' . $this->category->id, function () {
            return $this->category->getRouteSlug();
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function resolveRouteBinding($value)
    {
        $chunks = explode('/', $value);

        return $this->withCategory(Category::where('slug', array_pop($chunks))->first());
    }
}