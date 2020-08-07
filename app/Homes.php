<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homes extends Model
{
    protected $table = "homes";
    protected $casts = ["data"=>"array"];
    protected $fillable = [
        'data','image'
    ];
}
