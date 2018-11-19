<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 16/11/18
 * Time: 14:02
 */

namespace App\HunterGuide\Games\Repository;


use App\HunterGuide\Games\Games;
use App\HunterGuide\Games\Repository\Interfaces\GamesRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Jsdecena\Baserepo\BaseRepository;

class GamesRepository extends BaseRepository implements GamesRepositoryInterface
{
    public function __construct(Games $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function allGamesOfConsole($idConsole, $idCategorys, $paginate): LengthAwarePaginator
    {
        return $this->model->whereHas('consoles', function ($query) use ($idConsole) {
            $query->where('consoles.id', $idConsole);
        })->whereHas('categorys', function ($query) use ($idCategorys) {
            if ($idCategorys != null)
                $query->where('categorys.id', $idCategorys);
        })->paginate($paginate);


    }

}