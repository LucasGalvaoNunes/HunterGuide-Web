<?php

namespace App\HunterGuide\GamesConsoles;

use App\HunterGuide\Consoles\Consoles;
use App\HunterGuide\Games\Games;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property integer fkGames
 * @property integer fkConsoles
 *
 * Class GamesConsoles
 * @package App\HunterGuide\GamesConsoles
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

    /**
     * @return Games|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function games(){
        return $this->belongsTo(Games::class, 'fkGames');
    }

    /**
     * @return Consoles|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function consoles(){
        return $this->belongsTo(Consoles::class, 'fkConsoles');
    }
}
