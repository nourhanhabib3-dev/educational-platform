<?php

namespace App\Models;
use App\Models\Sub ;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = ['year'];

    public function sub(){
        return $this->hasmany(Sub::class);
    }
}