<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'post' => 'App\Post',
    'video' => 'App\Video',
]);
class Post extends Model
{
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
