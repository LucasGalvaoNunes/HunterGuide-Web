<?php

namespace App\Http\Controllers\API\v1;

use App\HunterGuide\Categorys\Categorys;
use App\HunterGuide\Categorys\Repository\CategorysRepository;
use App\HunterGuide\Helpers\Enum\EnumResponse;
use App\HunterGuide\Helpers\Facades\Util;
use App\Http\Controllers\Controller;

class CategorysController extends Controller
{

    public function allCategorysOfConsole($idConsole)
    {

        $repoCategorys = new CategorysRepository(new Categorys);
        $all = $repoCategorys->allCategorysOfConsole($idConsole, 25);
        if ($all->count() <= 0) {
            return Util::apiResponse(false, "Categorys not found for this console!",
                null, null, EnumResponse::RESPONSE_NOT_FOUND);
        }

        return Util::apiResponse(true, "All categorys recovered for this console!",
            $all, null, EnumResponse::RESPONSE_OK);
    }
}
