<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bill
 * @package App\Models
 * @property int user_id
 * @property int price
 * @property int status
 * @property int address
 * @property string note
 * @property int created_by
 * @property int updated_by
 * @property int deleted_by
 */
class Bill extends Model
{
    use SoftDeletes;
    protected $table = 'bills';
    protected $fillable = ['user_id', 'price', 'status', 'address', 'note', 'created_by', 'updated_by', 'deleted_by'];
}
