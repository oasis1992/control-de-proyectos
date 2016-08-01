<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleDifution extends Model
{
    protected $table = "article_difution";
    protected $fillable = ['title',
        'authors', 'name',
        'volume', 'number', 'age', 'start_page', 'end_page',
        'issn', 'editorial', 'ca', 'project_id'];


    public function project(){
        return $this->belongsTo('App\Project');
    }
}
