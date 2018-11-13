<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 12/11/18
 * Time: 19:50
 */

namespace App\HunterGuide\Users\Repository\Interfaces;


use App\HunterGuide\Users\Users;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface UsersRepositoryInterface extends BaseRepositoryInterface
{
    public function login(array $param) : Users;

    public function createUser(array $param) : Users;

    public function updateUser(array $param) : bool;

}