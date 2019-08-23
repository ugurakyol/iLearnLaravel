<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //protected $guarded =[]; this is not secure because you
    /// or
    protected $fillable = [
        'title', 'description'
    ];

    public function tasks(){

        return $this->hasMany(Task::class);

    }
}
