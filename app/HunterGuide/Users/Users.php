<?php

namespace App\HunterGuide\Users;

use App\HunterGuide\GamesFavorites\GamesFavorites;
use App\HunterGuide\Guides\Guides;
use App\HunterGuide\GuidesFavorites\GuidesFavorites;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * @property integer id
 * @property string name
 * @property string lastName
 * @property string aboutMe
 * @property string userName
 * @property string password
 * @property string api_token
 *
 * Class Users
 * @package App\HunterGuide\Users
 */
class Users extends Authenticatable
{
    use Notifiable, SoftDeletes, HasApiTokens;

    protected $guard = 'users';

    protected $fillable = [
        'id',
        'name',
        'lastName',
        'aboutMe',
        'userName',
        'password',
        'api_token'
    ];

    /**
     * @return GamesFavorites[]|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gamesFavorites(){
        return $this->hasMany(GamesFavorites::class, 'fkUsers', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function guidesFavorites(){
        return $this->belongsToMany(Guides::class, 'guides_favorites','fkUsers', 'fkGuides');
    }

    /**
     * @return Guides[]|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function guides(){
        return $this->hasMany(Guides::class, 'fkUsers', 'id');
    }
}
