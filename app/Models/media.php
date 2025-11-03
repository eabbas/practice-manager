<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    protected $fillable = [
       'practice_id',
       'type',
       'path'
    ];

    // public function practices(){
    //     return $this->belongsTo(practice::class);
    // }
}
