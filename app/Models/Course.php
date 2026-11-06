<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name' ,
        'price',
        'img' ,
        'desc' ,
        'teacher_id' ,
        'sub_id'
    ];

    public function teacher(){
       return $this->belongsTo(teacher::class);
    }

    public function sub(){
       return $this->belongsTo(Sub::class);
    }

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

}
