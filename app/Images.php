<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = "image_controllers";
    protected $fillable = [
        'img'
    ];
}
