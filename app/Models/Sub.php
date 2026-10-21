<?php

namespace App\Models;
use App\Models\Year ;

use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    protected $fillable = ['name' , 'year_id'];

    public function year(){
        return $this->belongsTo(Year::class);
    }

    public function teacher(){
        return $this->hasOne(teacher::class);
    }
}