<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PosItem extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'positem';

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
    // protected $fillable = ['id_pos', 'id_product', 'price_brl', 'price_usa'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function pos()
    {
        return $this->belongsTo(Pos::class, 'id_pos');
    }
}
