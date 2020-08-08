<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The "booted" method of the model.
     * También puedes usar eventos y listener para no usar esto.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($user) {
            $name = $user->name;
            $user->perfil()->create([
                'slug' => Str::slug($name)
            ]);
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'url', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }

    public function iLike()
    {
        return $this->belongsToMany(Recipe::class, 'likes_recipe');
    }
}
