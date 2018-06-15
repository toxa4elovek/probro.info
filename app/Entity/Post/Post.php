<?php

namespace App\Entity\Post;

use App\Entity\Tag;
use App\Entity\User;
use App\Helpers\PostHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entity\Post\Post
 *
 * @property int $id
 * @property int $owner_id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property string $slug
 * @property string $img
 * @property string|null $published_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['owner_id', 'category_id', 'title', 'description', 'status', 'slug', 'published_at', 'img'];


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

    public static function add($data)
    {
        return self::create([
            'owner_id' => $data['owner_id'],
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'img' => $data['img'],
            'status' => $data['status'],
            'slug' => $data['slug']
        ]);
    }

    /**
     * @return bool
     */
    public function isDraft(): bool
    {
        return $this->status === PostHelper::STATUS_DRAFT;
    }

    /**
     * @return bool
     */
    public function isModerate(): bool
    {
        return $this->status === PostHelper::STATUS_MODERATE;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->status === PostHelper::STATUS_ACTIVE;
    }

    public function onModerate(): bool
    {
        return $this->update([
            'status' => PostHelper::STATUS_MODERATE,
            'published_at' => null
        ]);
    }
}
