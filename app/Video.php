<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'post' => 'App\Post',
    'video' => 'App\Video',
]);
class Video extends Model
{
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
