<?php

namespace App\HunterGuide\Steps;

use App\HunterGuide\Guides\Guides;
use App\HunterGuide\GuidesSteps\GuidesSteps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Steps extends Model
{
    use SoftDeletes;

    protected $table = 'steps';

    protected $fillable = [
        'id',
        'fkSteps',
        'name',
        'pictureLink'
    ];

    /**
     * @return Steps|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function steps(){
        return $this->belongsTo(Steps::class, 'fkSteps');
    }

    /**
     * @return Guides[]|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function guides(){
        return $this->belongsToMany(Guides::class, 'guides_steps', 'fkSteps', 'fkGuides');
    }

}
