<?php

namespace App;
use Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'artikel';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    // protected $dateFormat = 'U';

    // customes collum name created_at
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    // protected $attributes = [
    //     'delayed' => false,
    // ];

    use SoftDeletes;
    protected $softDelete = true;

    public function user()
    {
        return $this->belongsTo('App\User2');
    }

    public function artikel_kategori()
    {
        return $this->belongsTo('App\Artikel_kategori','artikel_kategori_id','id');
    }

}
