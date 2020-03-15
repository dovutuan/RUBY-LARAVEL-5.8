<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class Product
 * @package App\Species
 * @property string name
 * @property string created_by
 * @property string updated_by
 * @property string deleted_by
 */
class Species extends Model
{
    use SoftDeletes;
    protected $table = 'species';
    protected $fillable = ['name', 'created_by', 'updated_by', 'deleted_by'];

    public function optionProducts()
    {
        return $this->hasMany(OptionProduct::class, 'species_id', 'id');
    }

    static function search($key, $paginate = PAGINATE)
    {
        return self::when($key, function ($qr) use ($key) {
            $qr->where('name', 'like', "%$key%");
        })
            ->paginate($paginate);
    }
}
