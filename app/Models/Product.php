<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class Product
 * @package App\Models
 * @property string name
 * @property int likes
 * @property int views
 * @property int status
 * @property int category_id
 * @property string image
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
    protected $fillable = ['name', 'slug', 'category_id', 'image', 'status', 'likes', 'views', 'content', 'detail', 'created_by', 'updated_by', 'deleted_by'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function Users()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function img()
    {
        return $this->hasMany(ImageProduct::class, 'product_id', 'id');
    }

    public function optionProduct()
    {
        return $this->hasMany(OptionProduct::class, 'product_id', 'id');
    }

    public function sale()
    {
        return $this->hasOne(Sale::class, 'product_id', 'id');
    }

    public function rate()
    {
        return $this->hasMany(Rate::class, 'product_id', 'id');
    }

    public function getSalePrice()
    {
        foreach ($this->optionProduct as $item) {
            return $item->price * (ONE_HUNDRED - $this->sale->sale) / ONE_HUNDRED;
        }
    }

    public function getPrice()
    {
        return $this->sale->sale ? $this->getSalePrice() : $this->optionProduct->price;
    }

    static function search($key, $paginate = PAGINATE)
    {
        return self::where('created_by', Auth::user()->id)
            ->when($key, function ($qr) use ($key) {
                $qr->where('name', 'like', "%$key%");
            })
            ->latest()->paginate($paginate);
    }
}
