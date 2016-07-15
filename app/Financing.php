<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financing extends Model
{
    protected $table = "financings";
    protected $fillable = ['name', 'mount', 'project_id', 'institution_id'];

    public function institution(){
        return $this->belongsTo('App\Institution');
    }
    
    public function project(){
        return $this->belongsTo('App\Project');
    }
}
