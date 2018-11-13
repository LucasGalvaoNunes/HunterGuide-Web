<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property string name
 * @property string pictureLink
 *
 * Class Games
 * @package App\Models
 */
class Games extends Model
{
    use SoftDeletes;

    protected $table = 'games';

    protected $fillable = [
        'id',
        'name',
        'pictureLink'
    ];
}
