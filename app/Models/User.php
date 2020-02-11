<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    protected $fillable = ['name', 'birth', 'phone', 'address', 'gender', 'status', 'email', 'password'];

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
            $users = self::find($key) ? self::where('id', $key)->get() : self::where('name', $key)->get();
        } else {
            $users = self::all();
        }
        if ($users->count() > 0) {
            return $users;
        } else {
            throw new \Exception(__('messages.no-data', ['value' => $key]));
        }
    }
}
