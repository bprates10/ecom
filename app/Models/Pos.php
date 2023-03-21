<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pos';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price_eur', 'price_brl', 'price_usa'];

    public function positem()
    {
        return $this->hasMany(Positem::class, 'id_pos');
    }
}
