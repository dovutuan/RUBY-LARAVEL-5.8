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
 * @property string updated_by
 * @property string deleted_by
 */
class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['name', 'slug', 'category_id', 'status', 'likes', 'views', 'content', 'detail', 'updated_by', 'deleted_by'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ImageProduct::class, 'product_id', 'id');
    }

    public function wareHouse()
    {
        return $this->hasOne(WearHouse::class, 'product_id', 'id');
    }

    static function search($key, $paginate = PAGINATE)
    {
        if ($key) {
            $products = self::where('id', 'like', "%$key%")->orWhere('code', 'like', "%$key%")->paginate($paginate);
        } else {
            $products = self::paginate($paginate);
        }
        if ($products->count() > ZERO) {
            return $products;
        } else {
            throw new \Exception(__('messages.no-data', ['value' => $key]));
        }
    }
}