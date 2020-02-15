<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Supplier
 * @package App\Models
 * @property string name
 * @property string company
 * @property int phone
 * @property int fax
 * @property string email
 * @property string address
 * @property string updated_by
 * @property string deleted_by
 */
class Supplier extends Model
{
    use SoftDeletes;
    protected $table = 'suppliers';
    protected $fillable = ['name', 'company', 'phone', 'fax', 'email', 'address', 'updated_by', 'deleted_by'];

    public function wareHouse()
    {
        return $this->hasMany(WearHouse::class, 'supplier_id', 'id');
    }
}
