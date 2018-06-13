<?php

namespace App\Entity\Post;

use App\Entity\Tag;
use App\Entity\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Entity\Post\Post
 *
 * @property int $id
 * @property int $owner_id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property string|null $published_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Post extends Model
{
    protected $fillable = ['owner_id', 'category_id', 'title', 'description', 'status', 'published_at'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function tags()
    {
        return $this->hasManyThrough(Tag::class, 'post_tags', 'post_id', 'tag_id', 'id', 'id');
    }
}
