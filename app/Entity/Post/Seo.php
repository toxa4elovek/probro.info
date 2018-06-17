<?php

namespace App\Entity\Post;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    public $timestamps = false;

    protected $table = 'post_seo';

    protected $guarded = 'post_id';
}
