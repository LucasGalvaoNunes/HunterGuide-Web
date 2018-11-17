<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 16/11/18
 * Time: 13:52
 */

namespace App\HunterGuide\Categorys\Repository;


use App\HunterGuide\Categorys\Categorys;
use App\HunterGuide\Categorys\Repository\Interfaces\CategorysRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Jsdecena\Baserepo\BaseRepository;

class CategorysRepository extends BaseRepository implements CategorysRepositoryInterface
{
    public function __construct(Categorys $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function allCategorysOfConsole(int $idConsole, $paginate): LengthAwarePaginator
    {
        return $this->model->whereHas('games', function($gamesQuery) use ($idConsole){
                $gamesQuery->whereHas('consoles', function($consolesQuery) use ($idConsole){
                    $consolesQuery->where('consoles.id', $idConsole);
                });
            })->paginate($paginate);
    }

}