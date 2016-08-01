<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "books";
    protected $fillable = ['title', 'authors', 'age', 'isbn', 'editorial', 'edition', 'ca', 'project_id'];

    public function project(){
        return $this->belongsTo('App\Project');
    }
}
