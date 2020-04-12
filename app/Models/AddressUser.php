<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AddressUser
 * @package App\Models
 * @property int user_id
 * @property string address
 */
class AddressUser extends Model
{
    use SoftDeletes;
    protected $table = 'address_users';
    protected $fillable = ['user_id', 'address'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
