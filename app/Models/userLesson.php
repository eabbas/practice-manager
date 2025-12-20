<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userLesson extends Model
{
   protected $fillable=['user_id','lesson_id','status'];

}
