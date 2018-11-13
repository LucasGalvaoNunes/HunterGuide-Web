<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property string name
 *
 * Class Consoles
 * @package App\Models
 */
class Consoles extends Model
{
    use SoftDeletes;

    protected $table = 'consoles';

    protected $fillable = [
        'id',
        'name'
    ];
}
