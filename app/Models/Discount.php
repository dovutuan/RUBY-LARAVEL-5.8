<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Self_;

/**
 * Class Discount
 * @package App\Models
 * @property string name
 * @property string code
 * @property int price
 * @property int amount
 * @property int use
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
    protected $fillable = ['name', 'updated_by', 'deleted_by', 'code', 'price', 'amount', 'use', 'status', 'start', 'finish'];

    static function search($key, $paginate = PAGINATE)
    {
        if ($key) {
            $discounts = self::where('id', 'like', "%$key%")->orWhere('code', 'like', "%$key%")->paginate($paginate);
        } else {
            $discounts = self::paginate($paginate);
        }
        if ($discounts->count() > ZERO) {
            return $discounts;
        } else {
            throw new \Exception(__('messages.no-data', ['value' => $key]));
        }
    }

    public static function formatTime($time, $format = null)
    {
        $item = Carbon::parse($time)->format($format);
        return Carbon::createFromFormat($format, $item);
    }

    public static function calculatingTime($start, $finish)
    {
        $now = self::formatTime(Carbon::now(), 'd-m-Y');
        $start = self::formatTime($start, 'd-m-Y');
        $finish = self::formatTime($finish, 'd-m-Y');
        if ($finish < $now) {
            $timeRemaining = ZERO;
        } else {
            $timeRemaining = $finish->diffInDays($now);
        }
        return $timeRemaining;
    }

    protected $setStatus = [
        ONE => [
            'name' => 'In stock',
            'class' => 'badge-success',
        ],
        ZERO => [
            'name' => 'Out stock',
            'class' => 'badge-danger',
        ]
    ];

    public function getStatus()
    {
        return array_get($this->setStatus, $this->status, '[N\A]');
    }

    public static function quantityRemaining($amount, $use)
    {
        return $amount - $use;
    }
}
