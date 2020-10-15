<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
      'content',
      'cat_id'
      ];
      
      function comments(){
        return $this->morphMany('App\Models\Comment','commentable');
      }
      
      
}

