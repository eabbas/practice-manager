<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class response_status extends Model
{
   public function practices(){
        return $this->belongsTo(practice::class);
    }

}
