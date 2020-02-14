<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Color
 * @package App\Models
 * @property string name
 * @property string code
 * @property string updated_by
 * @property string deleted_by
 */
class Color extends Model
{
    use SoftDeletes;
    protected $table = 'colors';

    protected $fillable = ['name', 'code', 'updated_by', 'deleted_by'];

    static function search($key, $paginate = 30)
    {
        if ($key) {
            $colors = self::where('id', 'like', "%$key%")->orWhere('name', 'like', "%$key%")->paginate($paginate);
        } else {
            $colors = self::paginate($paginate);
        }
        if ($colors->count() > 0) {
            return $colors;
        } else {
            throw new \Exception(__('messages.no-data', ['value' => $key]));
        }
    }
}
