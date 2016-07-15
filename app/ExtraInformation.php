<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraInformation extends Model
{
    protected $table = "extra_informations";
    protected $fillable = ['post', 'level', 'index', 'sni'];

    public function contributor(){
    	return $this->belongsTo('App\Contributor');
    }
}
