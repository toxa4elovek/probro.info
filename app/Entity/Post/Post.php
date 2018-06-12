<?php

namespace App\Entity\Post;

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
}
