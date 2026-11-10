<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'year_id'
    ];

    public function year(){
        return $this->belongsTo(Year::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}