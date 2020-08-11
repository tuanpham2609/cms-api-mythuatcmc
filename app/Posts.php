<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'idCategory','slugCategory','name','slug','short_content','description','image','new_highlights','view'
    ];
    public function Categories(){
        return $this->belongsTo('App/Category','idCategory','id');
    }
}
