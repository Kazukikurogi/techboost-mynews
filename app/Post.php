<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Comments(){
        return $this->hasMany('Comments','post_id');
    }
    
}
