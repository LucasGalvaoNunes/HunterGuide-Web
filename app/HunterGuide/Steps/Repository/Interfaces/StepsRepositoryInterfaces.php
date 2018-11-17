<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 17/11/18
 * Time: 02:18
 */

namespace App\HunterGuide\Steps\Repository\Interfaces;


use Illuminate\Pagination\LengthAwarePaginator;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface StepsRepositoryInterfaces extends BaseRepositoryInterface
{
    public function findStepsOfGame($idGame, $idStep = null, $paginate) : LengthAwarePaginator;

}