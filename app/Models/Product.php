<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @property string name
 * @property int likes
 * @property int views
 * @property int status
 * @property int category_id
 * @property string slug
 * @property string content
 * @property string detail
 * @property string created_by
 * @property string updated_by
 * @property string deleted_by
 */
class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['name', 'slug', 'category_id', 'status', 'likes', 'views', 'content', 'detail', 'created_by', 'updated_by', 'deleted_by'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ImageProduct::class, 'product_id', 'id');
    }

    public function optionProducts()
    {
        return $this->hasMany(OptionProduct::class, 'product_id', 'id');
    }

    public function sale()
    {
        return $this->hasOne(Sale::class, 'product_id', 'id');
    }

    public function getSalePrice()
    {
        return $this->price * (100 - $this->sale) / 100;
    }

    public function getPrice()
    {
        return $this->sale ? $this->getSalePrice() : $this->price;
    }

    static function search($key, $paginate = PAGINATE)
    {
        if ($key) {
            $products = self::where('id', 'like', "%$key%")->orWhere('name', 'like', "%$key%")->paginate($paginate);
        } else {
            $products = self::latest('id')->paginate($paginate);
        }
        return $products;
    }
}
