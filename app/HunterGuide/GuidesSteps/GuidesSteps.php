<?php

namespace App\HunterGuide\GuidesSteps;

use App\HunterGuide\Games\Games;
use App\HunterGuide\Guides\Guides;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer id
 * @property integer fkGuidesSteps
 * @property integer fkGames
 * @property integer fkGuides
 * @property string name
 * @property string pictureLink
 *
 * Class GuidesSteps
 * @package App\HunterGuide\GuidesSteps
 */
class GuidesSteps extends Model
{
    use SoftDeletes;

    protected $table = 'guides_steps';

    protected $fillable = [
        'id',
        'fkSteps',
        'fkGuides',
    ];

}
