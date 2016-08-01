<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemoryExtend extends Model
{
    protected $table = "memory_extend";
    protected $fillable = ['title',
        'authors', 'name_congress',
        'type', 'place_congress', 'date_congress', 'institution',
        'isbn', 'ca', 'project_id'];


    public function project(){
        return $this->belongsTo('App\Project');
    }
}
