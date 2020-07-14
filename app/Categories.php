<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "categories";
    protected $fillable = [
        'name','slug','show'
    ];
    public function post(){
        return $this->hasMany('App/Post','idCatgory','id');
    }
}
