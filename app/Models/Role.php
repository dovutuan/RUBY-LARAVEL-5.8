<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models
 * @property string name
 * @property string guard_name
 */
class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name', 'guard_name'];

    static function search($key, $paginate = PAGINATE)
    {
        if ($key) {
            $roles = self::where('id', 'like', "%$key%")->orWhere('name', 'like', "%$key%")->paginate($paginate);
        } else {
            $roles = self::paginate($paginate);
        }
        if ($roles->count() > 0) {
            return $roles;
        } else {
            throw new \Exception(__('messages.no-data', ['value' => $key]));
        }
    }
}
