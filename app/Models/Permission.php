<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * @package App\Models
 * @property string name
 * @property string guard_name
 */
class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['name', 'guard_name'];

    static function search($key, $paginate = PAGINATE)
    {
        if ($key) {
            $roles = self::where('id', 'like', "%$key%")->orWhere('name', 'like', "%$key%")->paginate($paginate);
        } else {
            $roles = self::paginate($paginate);
        }
        if ($roles->count() > ZERO) {
            return $roles;
        } else {
            throw new \Exception(__('messages.no-data', ['value' => $key]));
        }
    }
}
