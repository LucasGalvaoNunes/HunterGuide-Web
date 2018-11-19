<?php

namespace App\Http\Controllers\API\v1;

use App\HunterGuide\Consoles\Consoles;
use App\HunterGuide\Consoles\Repository\ConsolesRepository;
use App\HunterGuide\Helpers\Enum\EnumResponse;
use App\HunterGuide\Helpers\Facades\Util;
use App\Http\Controllers\Controller;

class ConsolesController extends Controller
{
    public function all(){
        $repoConsole = new ConsolesRepository(new Consoles);
        $all = $repoConsole->allConsoles(20);
        if($all->count() <= 0){
            return Util::apiResponse(false,"Consoles not found!",
                null, null, EnumResponse::RESPONSE_NOT_FOUND);
        }

        return Util::apiResponse(true,"All consoles recovered!",
            $all, null, EnumResponse::RESPONSE_OK);
    }


}
