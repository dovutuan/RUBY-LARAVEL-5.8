<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OptionProduct
 * @package App\Models'
 * @property int product_id
 * @property int color_id
 * @property int size_id
 */
class OptionProduct extends Model
{
    protected $table = 'option_products';
    protected $fillable = ['product_id', 'color_id', 'size_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
}
