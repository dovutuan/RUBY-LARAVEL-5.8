<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ImageProduct
 * @package App\Models
 * @property string image
 * @property int product_id
 */
class ImageProduct extends Model
{
    protected $table = 'image_products';
    protected $fillable = ['product_id', 'image'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
