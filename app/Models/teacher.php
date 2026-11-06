<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class teacher extends Authenticatable
{
    protected $fillable = [
        'name',
        'password',
        'email',
        'bio',
        'img',
        'sub_id',
        'phone'
    ];

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

    public function sub(){
        return $this->belongsTo(Sub::class);
    }

    public function course(){
       return $this->hasMany(Course::class);
    }


}