<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel_kategori extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'artikel_kategori';

    public $timestamps = true;
    
    public function artikel_kategori()
    {
        return $this->hasMany('App\Artikel','id');
    }
}
