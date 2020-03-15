<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class Category
 * @package App\Models
 * @property string name
 * @property string icon
 * @property string image
 * @property int status
 * @property int category_id
 * @property string slug
 * @property string created_by
 * @property string updated_by
 * @property string deleted_by
 */
class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['name', 'icon', 'image', 'status', 'category_id', 'slug', 'created_by', 'updated_by', 'deleted_by'];

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    static function search($key, $paginate = PAGINATE)
    {
        return self::where('created_by', Auth::user()->id)
            ->whereNull('category_id')->with('childrenCategories')
            ->when($key, function ($qr) use ($key) {
                $qr->where('name', 'like', "%$key%");
            })
            ->paginate($paginate);
    }
}
