<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property string name
 *
 * Class Categorys
 * @package App\Models
 */
class Categorys extends Model
{
    use SoftDeletes;

    protected $table = 'categorys';

    protected $fillable = [
        'id',
        'name'
    ];
}
