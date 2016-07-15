<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProject extends Model
{
    protected $table = "type_project";
    protected $fillable = ['name'];

    public function project(){
    	return $this->hasMany('App\Project');
    }
}
