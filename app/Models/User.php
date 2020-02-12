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
 * @property int gender
 * @property int status
 * @property string email
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    protected $fillable = ['name', 'birth', 'phone', 'address', 'gender', 'status', 'email', 'password', 'email_verified_at'];

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

    static function search($key)
    {
        if ($key) {
            $users = self::find($key) ? self::where('id', $key)->paginate(1) : self::where('name', $key)->paginate(1);
        } else {
            $users = User::paginate(1);
        }
        if ($users->count() > 0) {
            return $users;
        }
        else {
            throw new \Exception(__('messages.no-data', ['value' => $key]));
        }
    }
}
