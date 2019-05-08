<?php

namespace App;
use Eloquent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = ['name','email','password'];

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    public $timestamps = true;
}