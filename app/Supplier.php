<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function userHistory(){
        return $this->hasOneThrough('App\History','App\User');
    }
}
