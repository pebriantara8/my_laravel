<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    public $timestamps = true;
    
    public function user()
    {
        return $this->hasMany('App\Artikel');
    }
}
