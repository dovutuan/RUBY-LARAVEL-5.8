<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class Supplier
 * @package App\Models
 * @property string name
 * @property string company
 * @property int phone
 * @property int fax
 * @property string email
 * @property string address
 * @property string created_by
 * @property string updated_by
 * @property string deleted_by
 */
class Supplier extends Model
{
    use SoftDeletes;
    protected $table = 'suppliers';
    protected $fillable = ['name', 'company', 'phone', 'fax', 'email', 'address', 'created_by', 'updated_by', 'deleted_by'];

    public function optionProducts()
    {
        return $this->hasMany(OptionProduct::class, 'supplier_id', 'id');
    }

    static function search($key, $paginate = PAGINATE)
    {
        return self::when($key, function ($qr) use ($key) {
            $qr->where('id', 'like', "%$key%")->orWhere('name', 'like', "%$key%");
        })
            ->where('created_by', Auth::user()->id)
            ->paginate($paginate);
    }
}
