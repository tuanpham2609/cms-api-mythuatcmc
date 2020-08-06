<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $casts = ['commentChild'=>'array'];
    protected $fillable = [
        'idPost','name','email','content','commentChild'
    ];
}
