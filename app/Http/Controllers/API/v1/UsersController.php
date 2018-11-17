<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\HunterGuide\Helpers\Enum\EnumResponse;
use App\HunterGuide\Helpers\Facades\Util;
use App\HunterGuide\Users\Repository\UsersRepository;
use App\HunterGuide\Users\Requests\UsersCreate;
use App\HunterGuide\Users\Requests\UsersLogin;
use App\HunterGuide\Users\Requests\UsersUpdate;
use App\HunterGuide\Users\Users;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    protected $user;

    public function __construct(){
        if(auth()->guard('api')->check()){
            $this->user = auth()->guard('api')->user();
        }
    }

    public function profile(){
        return Util::apiResponse(true, "User recovery!",
            $this->user, null, EnumResponse::RESPONSE_OK);

    }

    public function login(UsersLogin $request){
        $repoUsers = new UsersRepository(new Users);

        $userLogged = $repoUsers->login($request->only(['userName', 'password']));

        if(is_null($userLogged)){
            return Util::apiResponse(false,
                "wrong userName or password", null, null, EnumResponse::RESPONSE_NOT_FOUND);
        }

        return Util::apiResponse(true,
            "user logged!", $userLogged, null, EnumResponse::RESPONSE_OK);
    }

    public function create(UsersCreate $request){
        $repoUsers = new UsersRepository(new Users);
        try{
            $createdUser = DB::transaction(function() use ($repoUsers, $request){
                return $repoUsers->createUser($request->all());
            });
            return Util::apiResponse(true,
                "User created!", $createdUser, null, EnumResponse::RESPONSE_CREATED);
        }catch (\Exception $e){
            return Util::apiResponse(false,
                "Oops, an error occurred in our server!", null, null, EnumResponse::RESPONSE_INTERNAL_ERROR);
        }
    }

    public function update(UsersUpdate $request){
        $repoUsers = new UsersRepository($this->user);
        try{
            $updatedUser = DB::transaction(function() use ($repoUsers, $request){
                return $repoUsers->updateUser($request->all());
            });
            return Util::apiResponse($updatedUser,
                $updatedUser ? "User updated!" : "Ops, user not updated", $updatedUser, null, EnumResponse::RESPONSE_OK);
        }catch (\Exception $e){
            return Util::apiResponse(false,
                "Oops, an error occurred in our server!", null, null, EnumResponse::RESPONSE_INTERNAL_ERROR);
        }
    }
}
