<?php

namespace App\HunterGuide\Games;

use App\HunterGuide\Categorys\Categorys;
use App\HunterGuide\Consoles\Consoles;
use App\HunterGuide\GamesCategorys\GamesCategorys;
use App\HunterGuide\GamesConsoles\GamesConsoles;
use App\HunterGuide\GamesFavorites\GamesFavorites;
use App\HunterGuide\Guides\Guides;
use App\HunterGuide\GuidesSteps\GuidesSteps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property string name
 * @property string pictureLink
 *
 * Class Games
 * @package App\HunterGuide\Games
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

    /**
     * @return Categorys[]|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categorys(){
        return $this->belongsToMany(Categorys::class, 'games_categorys', 'fkGames', 'fkCategorys')
            ->has('games');
    }

    /**
     * @return Consoles[]|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function consoles(){
        return $this->belongsToMany(Consoles::class, 'games_consoles', 'fkGames', 'fkConsoles')
            ->has('games');
    }

    /**
     * @return GamesFavorites[]|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gamesFavorites(){
        return $this->hasMany(GamesFavorites::class, 'fkGames', 'id');
    }

    /**
     * @return Guides[]|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guides(){
        return $this->hasMany(Guides::class, 'fkGames', 'id');
    }


}
