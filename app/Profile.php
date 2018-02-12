<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract

{
    use Authenticatable, Authorizable, CanResetPassword;
    
    protected $table = 'profiles';

    protected $fillable = ['firstname', 'lastname', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    public function skills()
    {
      //TODO: Might work without the second argument
      return $this->belongsToMany('App\Skill', 'profile_skills');
    }
}