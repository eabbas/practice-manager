<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\role;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'family',
        'password',
        'phone',
        'approved',
        'code',
        'collage',
    ];

    public $timestamps = true;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles(){
        return $this->belongsToMany(role::class, 'user_roles');
    }
    
    public function practices(): HasManyThrough
    {
          return  $this->hasManyThrough(practice::class, lesson::class, 'master_id', 'lesson_id'); 
        
    }

    public function lessons()
    {
        return $this->belongsToMany(lesson::class,'user_lessons',"lesson_id","user_id");
    }

    public function userLessons()
    {
        return $this->belongsToMany(userLesson::class,'user_lessons',"lesson_id","user_id");
    }
}
