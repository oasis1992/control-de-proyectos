<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvisedTheses extends Model
{
    protected $table = "advised_theses";
    protected $fillable = ['title',
        'name', 'grade',
        'date_titulation', 'asesor', 'ca', 'project_id'];


    public function project(){
        return $this->belongsTo('App\Project');
    }
}
