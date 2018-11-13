<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property integer fkGames
 * @property integer fkConsoles
 *
 * Class GamesConsoles
 * @package App\Models
 */
class GamesConsoles extends Model
{
    use SoftDeletes;

    protected $table = 'games_consoles';

    protected $fillable = [
        'id',
        'fkGames',
        'fkConsoles'
    ];
}
