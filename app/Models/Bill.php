<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class Bill
 * @package App\Models
 * @property int user_id
 * @property int seller_id
 * @property int price
 * @property int discount_id
 * @property string discount_name
 * @property string discount_code
 * @property int discount_price
 * @property int tax_rate
 * @property int status
 * @property int address
 * @property string note
 * @property int created_by
 * @property int updated_by
 * @property int deleted_by
 */
class Bill extends Model
{
    use SoftDeletes;

    protected $table = 'bills';
    protected $fillable = ['user_id', 'seller_id', 'price', 'discount_id', 'discount_name', 'discount_price', 'discount_code', 'tax_rate', 'status', 'address', 'note', 'created_by', 'updated_by', 'deleted_by'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function discounts()
    {
        return $this->belongsTo(Discount::class, 'discount_id', 'id');
    }

    public function billDetail()
    {
        return $this->hasMany(BillDetail::class, 'bill_id', 'id');
    }

    protected $changeStatus = [
        ZERO => [
            'name' => 'Chưa tiếp nhận đơn hàng',
            'class' => 'btn-primary',
        ],
        ONE => [
            'name' => 'Đã tiếp nhận/ đang kiểm tra đơn hàng',
            'class' => 'btn-success',
        ],
        TWO => [
            'name' => 'Đã điều phối giao hàng/Đang giao hàng',
            'class' => 'btn-success',
        ],
        THREE => [
            'name' => 'Giao hàng thành công',
            'class' => 'btn-success',
        ],
        FOUR => [
            'name' => 'Không giao được hàng',
            'class' => 'btn-warning',
        ],
        FIVE => [
            'name' => 'Đang trả hàng (COD cầm hàng đi trả)',
            'class' => 'btn-danger',
        ],
        SIX => [
            'name' => 'Đã hủy đơn hàng',
            'class' => 'btn-danger',
        ],
    ];

    public function getStatus()
    {
        return array_get($this->changeStatus, $this->status, '[N\A]');
    }

    static function search($key, $paginate = PAGINATE)
    {
        return self::where('seller_id', Auth::user()->id)
            ->when($key, function ($qr) use ($key) {
                $qr->where('name', 'like', "%$key%");
            })
            ->latest()->paginate($paginate);
    }
}
