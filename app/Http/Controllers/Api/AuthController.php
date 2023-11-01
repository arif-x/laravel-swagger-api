<?php

namespace App\Http\Controllers\Api;
   
use App\Http\Controllers\Controller;
use App\Helpers\Response;
use Illuminate\Http\Request;
use App\Repositories\Api\AuthRepository;
   
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Integration Swagger in Laravel Documentation",
 *      description="Implementation of Swagger in Laravel",
 *      @OA\Contact(
 *          email="sudo.ariffudin@gmail.com"
 *      )
 * )
 *
 *
*/
class AuthController extends Controller
{
    
    private $response;
    private $repository;

    public function __construct(
        Response $response,
        AuthRepository $repository
    )
    {
        $this->response = $response;
        $this->repository = $repository;    
    }

    /**
     * @OA\Post(
     ** path="/api/register",
     *   tags={"Auth"},
     *   summary="Register",
     *   operationId="register",
     *
     *  @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *      @OA\Parameter(
     *      name="c_password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "true",
     *                    "token_type": "Registrasi Sukses",
     *                    "data": {}
     *                }
     *          )
     *      )
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *      @OA\MediaType(
     *      mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "false",
     *                    "message": "The :attr must be a valid :attr",
     *                    "data": null
     *                }
     *           )
     *      )
     *   ),
     *   @OA\Response(
     *      response=500,
     *      description="Internal Error",
     *      @OA\MediaType(
     *      mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "false",
     *                    "message": "Internal Error",
     *                    "data": null
     *                }
     *           )
     *      )
     *   )
     *)
     **/
    public function register(Request $request){
        try {
            return $this->repository->register($request);
        } catch (\Exception $th) {
            return $this->response->error($th->getMessage());
        }
    }
   
    /**
     * @OA\Post(
     ** path="/api/login",
     *   tags={"Auth"},
     *   summary="Login",
     *   operationId="login",
     *
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "true",
     *                    "token_type": "Login Sukses",
     *                    "data": {}
     *                }
     *          )
     *      )
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *      @OA\MediaType(
     *      mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "false",
     *                    "message": "Login Gagal",
     *                    "data": null
     *                }
     *           )
     *      )
     *   ),
     *   @OA\Response(
     *      response=500,
     *      description="Internal Error",
     *      @OA\MediaType(
     *      mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "false",
     *                    "message": "Internal Error",
     *                    "data": null
     *                }
     *           )
     *      )
     *   )
     *)
     **/
    public function login(Request $request){
        try {
            return $this->repository->login($request);
        } catch (\Exception $th) {
            return $this->response->error($th->getMessage());
        }
    }

    /**
     * @OA\Post(
     *      path="/api/logout",
     *      operationId="Logout",
     *      tags={"Auth"},
     * security={
     * {
     *     "bearer": {}},
     * },
     * summary="Logout",
     * description="logout Bro!",
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "true",
     *                    "token_type": "Login Sukses",
     *                    "data": {}
     *                }
     *          )
     *      )
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *      @OA\MediaType(
     *      mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "false",
     *                    "message": "Login Gagal",
     *                    "data": null
     *                }
     *           )
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauntheticated",
     *      @OA\MediaType(
     *      mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "false",
     *                    "message": "Unauntheticated",
     *                    "data": {}
     *                }
     *           )
     *      )
     *   ),
     *   @OA\Response(
     *      response=500,
     *      description="Internal Error",
     *      @OA\MediaType(
     *      mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "false",
     *                    "message": "Internal Error",
     *                    "data": null
     *                }
     *           )
     *      )
     *   )
     * )
     */
    public function logout(Request $request){
        try {
            return $this->repository->logout($request);
        } catch (\Exception $th) {
            return $this->response->error($th->getMessage());
        }
    }
}