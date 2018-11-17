<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 16/11/18
 * Time: 14:31
 */

namespace App\HunterGuide\GamesCategorys\Repository;


use App\HunterGuide\GamesCategorys\GamesCategorys;
use App\HunterGuide\GamesCategorys\Repository\Interfaces\GamesCategorysRepositoryInterfaces;
use Jsdecena\Baserepo\BaseRepository;

class GamesCategorysRepository extends BaseRepository implements GamesCategorysRepositoryInterfaces
{
    public function __construct(GamesCategorys $model)
    {
        parent::__construct($model);
    }

}