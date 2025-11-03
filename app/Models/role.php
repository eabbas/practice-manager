<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Http\Models\user;
class role extends Model
{
   protected $fillable=['title'];
   public function users():BelongsToMany{
      return $this->belongsToMany(User::class,'user_role');
   }
}
