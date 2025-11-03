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

    public function lessons(){
        return  $this->belongsTo(lesson::class , "lesson_id");
    }
    
    public function medias(){
        return $this->hasMany(media::class)->chaperone();
    }
}
