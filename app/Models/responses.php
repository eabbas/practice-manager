<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class responses extends Model
{
    protected $fillable = [
        'practice_id',
        'user_id',
        'text',
        'student_id',
    ];

    public function practices(){
        return $this->belongsTo(practice::class , "practice_id" , "responses_id");
    }

    public function users(){
        return $this->belongsTo(user::class , 'user_id');
    }
}
