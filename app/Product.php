<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','price','category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->hasMany('App\ProductTag');
    }
    public function tag(){
        return $this->belongsToMany('App\Tag');
    }
}
