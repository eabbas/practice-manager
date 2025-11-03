<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    protected $fillable = [
        'title' ,
        'description',
        'lesson_group',
        'master_id'
    ];

    public function practices(){
        return $this->hasMany(practice::class)->chaperone();
    }
}
