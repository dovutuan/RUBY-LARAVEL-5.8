<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OptionProduct
 * @package App\Models'
 * @property int product_id
 * @property int species_id
 * @property int supplier_id
 * @property int price
 * @property int amount
 * @property int pay
 * @property string created_by
 * @property string updated_by
 * @property string deleted_by
 */
class OptionProduct extends Model
{
    protected $table = 'option_products';
    protected $fillable = ['product_id', 'species_id ', 'supplier_id', 'price', 'amount', 'pay', 'created_by', 'updated_by', 'deleted_by'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function species()
    {
        return $this->belongsTo(Species::class, 'species_id', 'id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
}
