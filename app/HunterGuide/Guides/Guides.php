<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property integer fkUsers
 * @property string title
 * @property string text
 *
 * Class Guides
 * @package App\Models
 */
class Guides extends Model
{
    use SoftDeletes;

    protected $table = 'guides';

    protected $fillable = [
        'id',
        'fkUsers',
        'title',
        'text'
    ];
}
