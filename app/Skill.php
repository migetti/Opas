<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    public function profiles()
    {
      //TODO: Might work without the second argument
      return $this->belongsToMany('App\Profile', 'profile_skills');
    }
}