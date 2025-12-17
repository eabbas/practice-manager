<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class lesson extends Model
{
    protected $fillable = [
        'title' ,
        'description',
        'lesson_group',
        'master_id',
    ];

    public function practices(){
        return $this->hasMany(practice::class);
    }

     public function users(){
      return $this->belongsToMany(User::class,"user_lessons",'lesson_id',"user_id");
   }
}
