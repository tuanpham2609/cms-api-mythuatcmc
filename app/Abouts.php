<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abouts extends Model
{
    protected $table = "abouts";
    protected $fillable = [
        'name','content'
    ];
}
