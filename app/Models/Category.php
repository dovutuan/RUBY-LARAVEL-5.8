<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @property string name
 * @property string icon
 * @property string image
 * @property int status
 * @property int category_id
 * @property string slug
 * @property string updated_by
 * @property string deleted_by
 */
class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['name', 'icon', 'image', 'status', 'category_id', 'slug', 'updated_by', 'deleted_by'];

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

    static function search($key, $paginate = 30)
    {
        if ($key) {
            $categories = self::where('id', 'like', "%$key%")->orWhere('name', 'like', "%$key%");
            $categories = $categories->whereNull('category_id')->with('childrenCategories')->paginate($paginate);
        } else {
            $categories = self::whereNull('category_id')->with('childrenCategories')->paginate($paginate);
        }
        if ($categories->count() > 0) {
            return $categories;
        } else {
            throw new \Exception(__('messages.no-data', ['value' => $key]));
        }
    }
}
