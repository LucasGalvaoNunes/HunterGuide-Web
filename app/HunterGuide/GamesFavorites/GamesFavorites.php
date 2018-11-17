<?php

namespace App\HunterGuide\GamesFavorites;

use App\HunterGuide\Games\Games;
use App\HunterGuide\Users\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int fkUsers
 * @property int fkGames
 *
 * Class GamesFavorites
 * @package App\HunterGuide\GamesFavorites
 */
class GamesFavorites extends Model
{
    use SoftDeletes;

    protected $table = 'games_favorites';

    protected $fillable = [
        'id',
        'fkUsers',
        'fkGames'
    ];


    /**
     * @return Users|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(Users::class, 'fkUsers');
    }

    /**
     * @return Games|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function games()
    {
        return $this->belongsTo(Games::class, 'fkGames');
    }
}
