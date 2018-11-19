<?php

namespace App\HunterGuide\Categorys;

use App\HunterGuide\Games\Games;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property string name
 *
 * Class Categorys
 * @package App\HunterGuide\Categorys
 */
class Categorys extends Model
{
    use SoftDeletes;

    protected $table = 'categorys';

    protected $fillable = [
        'id',
        'name'
    ];

    /**
     * @return Games[]|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function games(){
        return $this->belongsToMany(Games::class, 'games_categorys', 'fkCategorys', 'fkGames')
            ->has('guides');
    }
}
