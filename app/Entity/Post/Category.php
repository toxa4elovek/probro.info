<?php

namespace App\Entity\Post;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * App\Entity\Post\Category
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property Category[] $children
 * @property Category $parent
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Category extends Model
{
    use NodeTrait;

    protected $table = 'post_categories';

    protected $fillable = ['name', 'slug', 'parent_id'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    /**
     * @return string
     */
    public function getRouteSlug(): string
    {
        return implode('/', array_merge($this->ancestors()->defaultOrder()->pluck('slug')->toArray(), [$this->slug]));
    }

    public function getPostsCount()
    {
        return Post::whereIn('category_id', array_merge($this->descendants()->pluck('id')->toArray(), [$this->id]))
            ->count();
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
