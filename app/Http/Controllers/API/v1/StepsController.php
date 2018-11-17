<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\HunterGuide\Helpers\Enum\EnumResponse;
use App\HunterGuide\Helpers\Facades\Util;
use App\HunterGuide\Steps\Repository\StepsRepository;
use App\HunterGuide\Steps\Steps;
use Illuminate\Http\Request;

class StepsController extends Controller
{
    public function stepsOfGame($idGames, $idStep = null){
        $repoSteps = new StepsRepository(new Steps);
        $all = $repoSteps->findStepsOfGame($idGames, $idStep, 25);
        if($all->count() <= 0){
            return Util::apiResponse(false,"Steps not found!",
                null, null, EnumResponse::RESPONSE_NOT_FOUND);
        }

        return Util::apiResponse(true,"Steps recovered!",
            $all, null, EnumResponse::RESPONSE_OK);
    }

}
