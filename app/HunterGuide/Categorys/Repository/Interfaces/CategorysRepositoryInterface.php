<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 16/11/18
 * Time: 13:52
 */

namespace App\HunterGuide\Categorys\Repository\Interfaces;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface CategorysRepositoryInterface extends BaseRepositoryInterface
{
    public function allCategorysOfConsole(int $idConsole, $paginate): LengthAwarePaginator;

}