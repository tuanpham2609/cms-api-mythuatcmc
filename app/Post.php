<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'idCategory','name','slug','short_content','description','image','new_highlights'
    ];
    public function Categories(){
        return $this->belongsTo('App/Category','idCategory','id');
    }
}
