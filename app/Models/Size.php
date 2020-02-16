<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Size
 * @package App\Models
 * @property string name
 * @property string updated_by
 * @property string deleted_by
 */
class Size extends Model
{
    use SoftDeletes;
    protected $table = 'sizes';
    protected $fillable = ['name', 'updated_by', 'deleted_by'];

    public function optionProduct()
    {
        return $this->hasMany(OptionProduct::class, 'size_id', 'id');
    }

    static function search($key, $paginate = PAGINATE)
    {
        if ($key) {
            $sizes = self::where('id', 'like', "%$key%")->orWhere('name', 'like', "%$key%")->paginate($paginate);
        } else {
            $sizes = self::paginate($paginate);
        }
        if ($sizes->count() > ZERO) {
            return $sizes;
        } else {
            throw new \Exception(__('messages.no-data', ['value' => $key]));
        }
    }
}
