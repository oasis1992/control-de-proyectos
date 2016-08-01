<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CapBook extends Model
{
    protected $table = "cap_books";
    protected $fillable = ['title',
        'authors', 'chapter_title',
        'coordinators', 'age',
        'isbn', 'editorial', 'edition', 'ca', 'project_id'];

    public function project(){
        return $this->belongsTo('App\Project');
    }
}
