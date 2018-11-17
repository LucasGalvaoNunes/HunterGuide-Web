<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 17/11/18
 * Time: 03:41
 */

namespace App\HunterGuide\Guides\Repository;


use App\HunterGuide\Guides\Guides;
use App\HunterGuide\Guides\Repository\Interfaces\GuidesRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Jsdecena\Baserepo\BaseRepository;

class GuidesRepository extends BaseRepository implements GuidesRepositoryInterface
{
    public function __construct(Guides $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function guideOfStep($idStep, $paginate): ?Guides
    {
        return $this->model->whereHas('steps', function($stepQuery) use ($idStep){
            $stepQuery->has('steps')->where('steps.id', $idStep);
        })->first();
    }
}