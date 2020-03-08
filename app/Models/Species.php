<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        if ($key) {
            $species = self::where('id', 'like', "%$key%")->orWhere('name', 'like', "%$key%")->paginate($paginate);
        } else {
            $species = self::latest('id')->paginate($paginate);
        }
        return $species;
    }
}
