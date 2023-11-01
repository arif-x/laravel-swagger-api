<?php

namespace App\Repositories\Api;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Response;
use App\Models\User;

class AuthRepository
{
    private $response;
    
    public function __construct(
        Response $response
    ){
        $this->response = $response;
    }

    public function register($request){
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validation->fails()){
            return $this->response->validationError($validation->errors());
        } else {   
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            if($user){
                $data['token'] =  $user->createToken('MyApp')->accessToken;
                $data['name'] =  $user->name;
                return $this->response->register($data);
            } else {
                return $this->response->registerError($user);
            }
        }
    }

    public function login($request){
        $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($auth){ 
            $user = Auth::user(); 
            $data['token'] =  $user->createToken('MyApp')-> accessToken; 
            $data['name'] =  $user->name;
   
            return $this->response->login($data);
        } else{ 
            return $this->response->loginError($auth);
        } 
    }

    public function logout($request){
        $token = $request->user()->token();
        if($token){
            $token->revoke();
            $data['message'] = 'Sukses Logout';
            return $this->response->logout($data);
        } else {
            $data['message'] = 'Gagal Logout';
            return $this->response->logoutError($data);
        }
    }
}
