<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 16/11/18
 * Time: 14:02
 */

namespace App\HunterGuide\Games\Repository\Interfaces;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface GamesRepositoryInterface extends BaseRepositoryInterface
{
    public function allGamesOfConsole($idConsole, $idCategorys, $paginate) : LengthAwarePaginator;
}