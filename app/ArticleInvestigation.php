<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleInvestigation extends Model
{
    protected $table = "article_investigation";
    protected $fillable = ['title',
        'authors', 'name',
        'volume', 'number', 'age', 'start_page', 'end_page',
        'issn', 'editorial', 'ca', 'project_id'];


    public function project(){
        return $this->belongsTo('App\Project');
    }
}
