<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\HunterGuide\Games\Games;
use App\HunterGuide\Games\Repository\GamesRepository;
use App\HunterGuide\Helpers\Enum\EnumResponse;
use App\HunterGuide\Helpers\Facades\Util;
use Illuminate\Http\Request;

class GamesController extends Controller
{

    public function gamesOfConsole(Request $request){
        try{

            $repoGames = new GamesRepository(new Games);
            $games = $repoGames->allGamesOfConsole($request->idConsole, $request->idCategorys, 10);
            if($games->count() == 0){
                return Util::apiResponse(false,"Games of this console not found!",
                    null, null, EnumResponse::RESPONSE_NOT_FOUND);
            }

            return Util::apiResponse(true,"All games of this console recovered!",
                $games, null, EnumResponse::RESPONSE_OK);

        }catch (\Exception $exception){
            return Util::apiResponse(false,"Games of this console not found!",
                null, null, EnumResponse::RESPONSE_NOT_FOUND);
        }
    }
}
