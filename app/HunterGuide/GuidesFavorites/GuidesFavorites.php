<?php

namespace App\HunterGuide\GuidesFavorites;

use App\HunterGuide\Guides\Guides;
use App\HunterGuide\Users\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int id
 * @property int fkUsers
 * @property int fkGuides
 *
 * Class GuidesFavorites
 * @package App\HunterGuide\GuidesFavorites
 */
class GuidesFavorites extends Model
{
    use SoftDeletes;

    protected $table = 'guides_favorites';

    protected $fillable = [
        'id',
        'fkUsers',
        'fkGuides'
    ];


    /**
     * @return Users|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(Users::class, 'fkUsers');
    }

    /**
     * @return Guides|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guides()
    {
        return $this->belongsTo(Guides::class, 'fkGuides');
    }
}
