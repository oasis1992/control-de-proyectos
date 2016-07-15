<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    protected $table = "contributors";
    protected $fillable = ['name', 'first_name', 'last_name', 'email_one', 'email_two', 'tel_one', 'tel_two', 'type','name_complete'];

    public function projects() {
    	return $this->belongsToMany('App\Project');
    }

    public function extraInformations() {
    	return $this->hasMany('App\ExtraInformation');
    }  
}
