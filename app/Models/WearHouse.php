<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class WearHouse
 * @package App\Models
 * @property int product_id
 * @property int supplier_id
 * @property int price
 * @property int amount
 * @property int pay
 * @property string updated_by
 * @property string deleted_by
 */
class WearHouse extends Model
{
    use SoftDeletes;
    protected $table = 'wearhouses';
    protected $fillable = ['product_id', 'supplier_id', 'price', 'amount', 'pay', 'updated_by', 'deleted_by'];

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }
}
