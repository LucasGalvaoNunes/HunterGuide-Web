<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\HunterGuide\Guides\Guides;
use App\HunterGuide\Guides\Repository\GuidesRepository;
use App\HunterGuide\Helpers\Enum\EnumResponse;
use App\HunterGuide\Helpers\Facades\Util;
use Illuminate\Http\Request;

class GuidesController extends Controller
{
    public function guideOfStep($idSteps){
        $repoGuides = new GuidesRepository(new Guides);
        $guide = $repoGuides->guideOfStep($idSteps, 25);
        if(is_null($guide)){
            return Util::apiResponse(false,"Guide not encuntered!",
                null, null, EnumResponse::RESPONSE_NOT_FOUND);
        }

        return Util::apiResponse(true,"All games of this console recovered!",
            $guide, null, EnumResponse::RESPONSE_OK);
    }
}
