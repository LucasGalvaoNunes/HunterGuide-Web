<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 16/11/18
 * Time: 14:02
 */

namespace App\HunterGuide\Consoles\Repository;


use App\HunterGuide\Consoles\Consoles;
use App\HunterGuide\Consoles\Repository\Interfaces\ConsolesRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Jsdecena\Baserepo\BaseRepository;

class ConsolesRepository extends BaseRepository implements ConsolesRepositoryInterface
{

    public function __construct(Consoles $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function allConsoles(int $paginate) : LengthAwarePaginator
    {
        return $this->model->has('games')->paginate($paginate);
    }

    public function findConsole($idConsole): Consoles
    {
        try{
            return $this->findOneOrFail($idConsole);
        }catch (ModelNotFoundException $exception){
            throw new \Exception($exception->getMessage(), 500, $exception);
        }
    }
}