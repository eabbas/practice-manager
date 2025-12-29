<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class responseMedia extends Model
{
   protected $fillable=["response_id","media_path"];

   public function responses(){
        return $this->belongsTo(responses::class ,'response_id');
   }
}
