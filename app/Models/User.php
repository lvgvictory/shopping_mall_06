<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'image',
        'role',
        'phone',
        'address',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function socials()
    {
        return $this->hasMany(Social::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
