<?php

namespace App\Model;

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

    protected $table = 'users';

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

    public function news()
    {
        return $this->hasMany(New::class);
    }
}
