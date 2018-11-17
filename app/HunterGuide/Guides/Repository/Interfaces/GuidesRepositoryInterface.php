<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 17/11/18
 * Time: 03:42
 */

namespace App\HunterGuide\Guides\Repository\Interfaces;


use App\HunterGuide\Guides\Guides;
use Illuminate\Pagination\LengthAwarePaginator;
use Jsdecena\Baserepo\BaseRepositoryInterface;

interface GuidesRepositoryInterface extends BaseRepositoryInterface
{
    public function guideOfStep($idStep, $paginate) : ?Guides;

}