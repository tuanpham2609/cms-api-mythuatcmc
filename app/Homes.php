<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homes extends Model
{
    protected $table = "homes";
    protected $fillable = [
        'data'
    ];
}
