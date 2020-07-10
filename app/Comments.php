<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'nickname' => 'required',
        'comment' => 'required',
        );
    
  
}
