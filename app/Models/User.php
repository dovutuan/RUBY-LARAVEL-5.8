<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App\Models
 * @property string name
 * @property string birth
 * @property int phone
 * @property string address
 * @property string image
 * @property int gender
 * @property int status
 * @property string email
 * @property string password
 * @property string email_verified_at
 * @property string created_by
 * @property string updated_by
 * @property string deleted_by
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['name', 'birth', 'phone', 'address', 'image', 'gender', 'status', 'email', 'password', 'email_verified_at', 'created_by', 'updated_by', 'deleted_by'];

    use SoftDeletes;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addressUser()
    {
        return $this->hasMany(AddressUser::class, 'user_id', 'id');
    }

    protected $changeStatus = [
        1 => [
            'name' => 'Active',
            'class' => 'btn-primary',
            'check' => 'checked',
        ],
        0 => [
            'name' => 'Inactive',
            'class' => 'btn-danger',
            'check' => '',
        ]
    ];

    public function getStatus()
    {
        return array_get($this->changeStatus, $this->status, '[N\A]');
    }

    static function search($key, $paginate = PAGINATE)
    {
        return self::when($key, function ($qr) use ($key) {
            $qr->where('id', 'like', "%$key%")->orWhere('name', 'like', "%$key%");
        })
            ->paginate($paginate);
    }
}
