<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\HunterGuide\Guides\Guides;
use App\HunterGuide\Guides\Repository\GuidesRepository;
use App\HunterGuide\Helpers\Enum\EnumResponse;
use App\HunterGuide\Helpers\Facades\Util;
use App\HunterGuide\Users\Users;
use Illuminate\Http\Request;

/**
 * @property Users user
 *
 * Class GuidesController
 * @package App\Http\Controllers\API\v1
 */
class GuidesController extends Controller
{
    protected $user;

    public function __construct(){
        if(auth()->guard('api')->check()){
            $this->user = auth()->guard('api')->user();
        }
    }

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

    public function allFavoritesGuide(){
        $guides = $this->user->guidesFavorites()->paginate(25);
        if($guides->count() == 0){
            return Util::apiResponse(false,"Favorites guides not encuntered!",
                null, null, EnumResponse::RESPONSE_NOT_FOUND);
        }

        return Util::apiResponse(true,"Guide recovered!",
            $guides, null, EnumResponse::RESPONSE_OK);
    }

    public function favoriteGuide($idGuide){
        $repoGuide = new GuidesRepository(new Guides);
        $guide = $repoGuide->find($idGuide);
        if(!$guide){
            return Util::apiResponse(false,"Guide not encuntered!",
                null, null, EnumResponse::RESPONSE_NOT_FOUND);
        }

        $user = $guide->whereHas('usersFavorites', function($query) use ($guide){
            $query->where('guides_favorites.fkUsers', $this->user->id)
                ->where('guides_favorites.fkGuides', $guide->id);
        })->get();

        if($user->count() == 0){
            $this->user->guidesFavorites()->save($guide);
        }


        return Util::apiResponse(true,"Guide Saved in favorites!",
            $guide, null, EnumResponse::RESPONSE_OK);
    }
}
