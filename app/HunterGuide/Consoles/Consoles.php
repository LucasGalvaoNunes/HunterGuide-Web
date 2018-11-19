<?php

namespace App\HunterGuide\Consoles;

use App\HunterGuide\Games\Games;
use App\HunterGuide\GamesConsoles\GamesConsoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property string name
 *
 * Class Consoles
 * @package App\HunterGuide\Consoles
 */
class Consoles extends Model
{
    use SoftDeletes;

    protected $table = 'consoles';

    protected $fillable = [
        'id',
        'name',
        'pictureLink'
    ];

    /**
     * @return Games[]|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function games(){
        return $this->belongsToMany(Games::class, 'games_consoles', 'fkConsoles', 'fkGames')
            ->has('guides');
    }
}
