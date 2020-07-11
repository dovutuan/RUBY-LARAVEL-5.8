<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
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
 * @property string created_by
 * @property string updated_by
 * @property string deleted_by
 */
class Discount extends Model
{
    use SoftDeletes;
    protected $table = 'discounts';
    protected $fillable = ['name', 'created_by', 'updated_by', 'deleted_by', 'code', 'price', 'amount', 'use', 'status', 'start', 'finish'];

    public function bill()
    {
        return $this->hasMany(Bill::class, 'discount_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    static function search($key, $paginate = PAGINATE)
    {
        return self::where('created_by', Auth::user()->id)
            ->when($key, function ($qr) use ($key){
               $qr->where('code', 'like', "%$key%");
            })
            ->latest()->paginate($paginate);
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
