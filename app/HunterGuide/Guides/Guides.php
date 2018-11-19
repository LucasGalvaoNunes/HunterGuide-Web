<?php

namespace App\HunterGuide\Guides;

use App\HunterGuide\Games\Games;
use App\HunterGuide\GuidesFavorites\GuidesFavorites;
use App\HunterGuide\GuidesSteps\GuidesSteps;
use App\HunterGuide\Steps\Steps;
use App\HunterGuide\Users\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property integer fkUsers
 * @property integer visualizations
 * @property string title
 * @property string text
 *
 * Class Guides
 * @package App\HunterGuide\Guides
 */
class Guides extends Model
{
    use SoftDeletes;

    protected $table = 'guides';

    protected $fillable = [
        'id',
        'fkUsers',
        'fkGames',
        'visualizations',
        'title',
        'text'
    ];


    /**
     * @return Games|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function games(){
        return $this->belongsTo(Games::class, 'fkGames');
    }

    /**
     * @return Users|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(){
        return $this->belongsTo(Users::class, 'fkUsers');
    }

    /**
     * @return Steps[]|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function steps(){
        return $this->belongsToMany(Steps::class, 'guides_steps', 'fkGuides', 'fkSteps')
            ->has('guides');
    }
}
