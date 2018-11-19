<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 16/11/18
 * Time: 14:02
 */

namespace App\HunterGuide\Consoles\Repository\Interfaces;


use App\HunterGuide\Consoles\Consoles;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface ConsolesRepositoryInterface extends BaseRepositoryInterface
{
    public function allConsoles(int $paginate): LengthAwarePaginator;

    public function findConsole($idConsole): Consoles;
}