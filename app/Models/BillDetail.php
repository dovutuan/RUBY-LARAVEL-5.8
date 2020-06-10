<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BillDetail
 * @package App\Models
 * @property int bill_id
 * @property int product_id
 * @property int species_id
 * @property int amount
 * @property int qty
 * @property int price
 * @property int created_by
 * @property int updated_by
 * @property int deleted_by
 */
class BillDetail extends Model
{
    use SoftDeletes;
    protected $table = 'bill_details';
    protected $fillable = ['bill_id', 'product_id', 'species_id', 'amount', 'qty', 'price', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function bills()
    {
        return $this->belongsTo(Bill::class, 'bill_id', 'id');
    }

    public function species()
    {
        return $this->belongsTo(Species::class, 'species_id', 'id');
    }
}
