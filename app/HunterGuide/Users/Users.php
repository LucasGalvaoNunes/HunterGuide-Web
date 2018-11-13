<?php

namespace App\HunterGuide\Users;

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
 * @package App\Models
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

}
