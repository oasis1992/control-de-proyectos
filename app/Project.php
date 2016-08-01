<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = "projects";
    protected $fillable = ['key', 'title', 'start_date', 'end_date', 'type_project_id', 'status_id'];

    public function type_project()
    {
    	return $this->belongsTo('App\TypeProject');
    }

    public function status()
    {
    	return $this->belongsTo('App\Status');
    }

    public function extensions()
    {
    	return $this->hasMany('App\Extension');
    }

    public function contributors()
    {
    	return $this->belongsToMany('App\Contributor');
    }

    public function financings(){
        return $this->hasMany('App\Financing');
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title','LIKE', "%$title%");
    }

    public function books(){
        return $this->hasMany('App\Book');
    }

    public function cap_books(){
        return $this->hasMany('App\CapBook');
    }

    public function articles_difution(){
        return $this->hasMany('App\ArticleDifution');
    }

    public function articles_investigtion(){
        return $this->hasMany('App\ArticleInvestigation');
    }

    public function advises_theses(){
        return $this->hasMany('App\AdvisedTheses');
    }
}
