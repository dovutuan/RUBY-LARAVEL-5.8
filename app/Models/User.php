<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
 * @property string updated_by
 * @property string deleted_by
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['name', 'birth', 'phone', 'address', 'image', 'gender', 'status', 'email', 'password', 'email_verified_at', 'updated_by', 'deleted_by'];

    use SoftDeletes;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
        if ($key) {
            $users = self::where('id', 'like', "%$key%")->orWhere('name', 'like', "%$key%")->paginate($paginate);
        } else {
            $users = self::paginate($paginate);
        }
        if ($users->count() > ZERO) {
            return $users;
        } else {
            throw new \Exception(__('messages.no-data', ['value' => $key]));
        }
    }
}
