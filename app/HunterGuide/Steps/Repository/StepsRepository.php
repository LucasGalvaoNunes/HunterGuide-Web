<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 17/11/18
 * Time: 02:18
 */

namespace App\HunterGuide\Steps\Repository;


use App\HunterGuide\Steps\Repository\Interfaces\StepsRepositoryInterfaces;
use App\HunterGuide\Steps\Steps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Jsdecena\Baserepo\BaseRepository;

class StepsRepository extends BaseRepository implements  StepsRepositoryInterfaces
{
    public function __construct(Steps $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function findStepsOfGame($idGame, $idStep = null, $paginate): LengthAwarePaginator
    {
        return $this->model->wherehas('guides', function($guidesQuery) use ($idGame){
            $guidesQuery->where('fkGames', $idGame);
        })->where('fkSteps', $idStep)->paginate($paginate);
    }
}