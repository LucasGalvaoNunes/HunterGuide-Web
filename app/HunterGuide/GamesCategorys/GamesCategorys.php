<?php

namespace App\HunterGuide\GamesCategorys;

use App\HunterGuide\Categorys\Categorys;
use App\HunterGuide\Games\Games;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property integer fkGames
 * @property integer fkCategorys
 *
 * Class GamesCategorys
 * @package App\HunterGuide\GamesCategorys
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

    /**
     * @return Games|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function games(){
        return $this->belongsTo(Games::class, 'fkGames');
    }

    /**
     * @return Categorys|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorys(){
        return $this->belongsTo(Categorys::class, 'fkCategorys');
    }
}
