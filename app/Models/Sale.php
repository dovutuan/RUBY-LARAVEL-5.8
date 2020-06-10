<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sale
 * @package App\Models
 * @property int product_id
 * @property int sale
 * @property string start
 * @property string finish
 * @property string created_by
 * @property string updated_by
 * @property string deleted_by
 */
class Sale extends Model
{
    use SoftDeletes;
    protected $table = 'sales';
    protected $fillable = ['product_id', 'sale', 'start', 'finish', 'created_by', 'updated_by', 'deleted_by'];

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'id');
    }
}
