<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'post' => 'App\Post',
    'user' => 'App\User',
]);

class Image extends Model
{
    public function imageable()
    {
        return $this->morphTo();
    }
}
