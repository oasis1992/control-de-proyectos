<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $table = "extensions";
    protected $fillable = ['startDate', 'endDate', 'project_id'];

    public function project(){
    	return $this->belongsTo('App\Project');
    }
}
