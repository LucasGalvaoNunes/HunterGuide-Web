<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property integer fkGames
 * @property integer fkCategorys
 *
 * Class GamesCategorys
 * @package App\Models
 */
class GamesCategorys extends Model
{
    use SoftDeletes;

    protected $table = 'games_categorys';

    protected $fillable = [
        'id',
        'fkGames',
        'fkCategorys'
    ];
}
