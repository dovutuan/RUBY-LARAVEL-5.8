<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Discount
 * @package App\Models
 * @property string name
 * @property string code
 * @property int price
 * @property int amount
 * @property int status
 * @property string start
 * @property string finish
 * @property string updated_by
 * @property string deleted_by
 */
class Discount extends Model
{
    use SoftDeletes;
    protected $table = 'discounts';

    protected $fillable = ['name', 'updated_by', 'deleted_by', 'code', 'price', 'amount', 'status', 'start', 'finish',];

    static function search($key, $paginate = 30)
    {
        if ($key) {
            $discounts = self::where('id', 'like', "%$key%")->orWhere('name', 'like', "%$key%")->paginate($paginate);
        } else {
            $discounts = self::paginate($paginate);
        }
        if ($discounts->count() > 0) {
            return $discounts;
        } else {
            throw new \Exception(__('messages.no-data', ['value' => $key]));
        }
    }
}
