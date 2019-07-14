<?php

namespace App;
use Eloquent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

// Please add this line
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    // use Notifiable, HasApiTokens;

    // protected $fillable = ['name','email','password'];

    //  /**
    //  * The table associated with the model.
    //  *
    //  * @var string
    //  */
    protected $table = 'user';

    // public $timestamps = true;

    
    
    // BODY OF THIS CLASS
  
    // Please ADD this two methods at the end of the class
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}