<?php

namespace App\Models;

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
 * @package App\Models
 */
class GuidesSteps extends Model
{
    use SoftDeletes;

    protected $table = 'guides_steps';

    protected $fillable = [
        'id',
        'fkGuidesSteps',
        'fkGames',
        'fkGuides',
        'name',
        'pictureLink'
    ];
}
