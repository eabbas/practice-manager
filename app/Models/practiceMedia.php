<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class practiceMedia extends Model
{
     protected $fillable = [
       'practice_id',
       'media_path'
    ];

    public function practices(){
        return $this->belongsTo(practice::class ,"practice_id");
    }
}
