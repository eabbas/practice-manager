<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class practice extends Model
{
    protected $fillable = [
        'title',
        'description',
        'link',
        'lesson_id'
    ];

    public function lesson(){
        return  $this->belongsTo(lesson::class , "lesson_id");
    }
    
    public function medias(){
        return $this->hasMany(media::class)->chaperone();
    }

    public function responses(){
        return $this->hasOne(responses::class , "practice_id" , "responses_id");
    }

        public function users()
    {
          return  $this->hasManyThrough(User::class, lesson::class, 'lesson_id', 'master_id'); 
        
    }

     public function master()
    {
        return $this->hasOneThrough(
            User::class,
            lesson::class,
            'id', // Foreign key on the cars table...
            'id', // Foreign key on the owners table...
            'lesson_id', // Local key on the mechanics table...
            'master_id' // Local key on the cars table...
        );
    }
}
