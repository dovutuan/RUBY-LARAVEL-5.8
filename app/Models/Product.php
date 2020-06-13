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
        return $this->hasOne(ImageProduct::class, 'product_id', 'id');
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

    static function searchHome($name, $category_id, $supplier_id, $specie_id, $format_min_price, $format_max_price, $short)
    {
        return self::when($name, function ($qr) use ($name) {
            $qr->where('name', 'like', "%$name%");
        })
            ->when($category_id, function ($qr) use ($category_id) {
                $qr->where('category_id', $category_id);
            })
            ->when($supplier_id, function ($qr) use ($supplier_id) {
                $qr->WhereHas('optionProduct', function ($qr) use ($supplier_id) {
                    $qr->where('supplier_id', $supplier_id);
                });
            })
            ->when($specie_id, function ($qr) use ($specie_id) {
                $qr->WhereHas('optionProduct', function ($qr) use ($specie_id) {
                    $qr->where('species_id', $specie_id);
                });
            })
            ->when($format_min_price, function ($qr) use ($format_min_price) {
                $qr->WhereHas('optionProduct', function ($qr) use ($format_min_price) {
                    $qr->where('price', '>=', $format_min_price);
                });
            })
            ->when($format_max_price, function ($qr) use ($format_max_price) {
                $qr->WhereHas('optionProduct', function ($qr) use ($format_max_price) {
                    $qr->where('price', '<=', $format_max_price);
                });
            })
            ->when($format_min_price & $format_max_price, function ($qr) use ($format_min_price, $format_max_price) {
                $qr->WhereHas('optionProduct', function ($qr) use ($format_min_price, $format_max_price) {
                    $qr->where('price', '>=', $format_min_price)->where('price', '<=', $format_max_price);
                });
            })
            ->latest($short)
            ->paginate(TWELVE);
    }
}
