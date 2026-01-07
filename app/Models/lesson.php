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

    public function users(){//returns requests users
      return $this->belongsToMany(User::class,"user_lessons",'lesson_id',"user_id")->withPivot(['status']);
   }

   public function master(){
        return $this->hasOne(User::class, 'id', 'master_id' );
   }

    // public function responses(){
    //     return $this->hasManyThrough(responses::class,practice::class);
    // }

    public function responses()
    {
        return $this->hasManyThrough(
            responses::class,
            practice::class,
            'lesson_id', // Foreign key on the environments table...
            'practice_id', // Foreign key on the deployments table...
            'id', // Local key on the applications table...
            'id' // Local key on the environments table...
        );
    }
}
