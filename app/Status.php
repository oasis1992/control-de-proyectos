<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "status";
    protected $fillable = ['name'];

    public function projects(){
    	return $this->hasMany('App\Project');
    }
}
