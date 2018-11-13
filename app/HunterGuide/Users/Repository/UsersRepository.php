<?php
/**
 * Created by PhpStorm.
 * User: lucasgnunes
 * Date: 12/11/18
 * Time: 19:50
 */

namespace App\HunterGuide\Users\Repository;


use App\HunterGuide\Users\Repository\Interfaces\UsersRepositoryInterface;
use App\HunterGuide\Users\Users;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jsdecena\Baserepo\BaseRepository;

class UsersRepository extends BaseRepository implements UsersRepositoryInterface
{

    public function __construct(Users $model)
    {
        parent::__construct($model);
        $this->model = $model;

    }

    /**
     * Make the login of user and add a token to use in our next consume!
     *
     * @param array $param
     * @return Users
     */
    public function login(array $param): Users
    {
        if(Auth::attempt(['userName' => $param['userName'], 'password' => $param['password']])){

            $this->model = Auth::user();
            $this->model->api_token = $this->model->createToken($this->model->userName)->accessToken;
            return $this->model;
        }
        return null;
    }

    /**
     * Create a new user
     *
     * @param array $param
     * @return Users
     * @throws \Exception
     */
    public function createUser(array $param): Users
    {
        try{
            $data = collect($param)->except('password')->all();
            $this->model->fill($data);
            $this->model->password = Hash::make($param['password']);
            $this->model->save();

            return $this->model;
        }catch (QueryException $e){
            throw new \Exception($e->getMessage(), 500, $e);
        }
    }

    /**
     * Update a user logged.
     *
     * @param array $param
     * @return bool
     * @throws \Exception
     */
    public function updateUser(array $param): bool
    {
        try{
            $data = collect($param)->except('password')->all();
            $this->model->fill($data);
            if(isset($param['password']))
                $this->model->password = Hash::make($param['password']);
            return $this->model->update();
        }catch (QueryException $e){
            throw new \Exception($e->getMessage(), 500, $e);
        }
    }

}