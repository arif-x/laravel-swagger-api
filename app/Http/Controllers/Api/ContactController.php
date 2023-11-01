<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Api\ContactRepository;

class ContactController extends Controller
{
    private $repository;

    public function __construct(
        ContactRepository $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * @OA\Get(
     *      path="/api/contact",
     *      operationId="ContactIndex",
     *      tags={"Contact"},
     * security={
     *  {"bearer": {}},
     *   },
     *      summary="Get list of contacts",
     *      description="Returns list of contacts",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function index(Request $request){
        return $this->repository->index($request);
    }

    /**
     * @OA\Get(
     *      path="/api/contact/{id}",
     *      operationId="ContactShow",
     *      tags={"Contact"},
     * security={
     *    {"bearer": {}},
     * },
     * summary="Get contact by ID",
     *   description="Returns contact by ID",
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *   )
     * ),
     * @OA\Parameter(
     *   name="id",
     *   in="path",
     *   required=true,
     *   @OA\Schema(
     *       type="integer"
     *   )
     * ),
     * @OA\Response(
     *   response=401,
     *   description="Unauthenticated",
     * ),
     * @OA\Response(
     *   response=403,
     *   description="Forbidden"
     * ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function show($id){
        return $this->repository->show($id);
    }

    /**
     * @OA\Post(
     *      path="/api/contact",
     *      operationId="ContactStore",
     *      tags={"Contact"},
     * security={
     *  {"bearer": {}},
     *   },
     *      summary="Insert contact",
     *      description="Create contact",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="type",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="contact",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *        type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     * )
     */
    public function store(Request $request){
        return $this->repository->store($request);
    }

    /**
     * @OA\Put(
     *      path="/api/contact/{id}",
     *      operationId="ContactUpdate",
     *      tags={"Contact"},
     * security={
     *  {"bearer": {}},
     *   },
     * summary="Update by ID",
     *   description="Update contact by ID",
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\MediaType(
     *         mediaType="application/json",
     *   )
     * ),
     * @OA\Parameter(
     *   name="id",
     *   in="path",
     *   required=true,
     *   @OA\Schema(
     *       type="integer"
     *   )
     * ),
     *   @OA\Parameter(
     *      name="type",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="contact",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *        type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     * )
     */
    public function update($id, Request $request){
        return $this->repository->update($id, $request);
    }

    /**
     * @OA\Delete(
     *      path="/api/contact/{id}",
     *      operationId="ContactDelete",
     *      tags={"Contact"},
     * security={
     *  {"bearer": {}},
     *   },
     *  summary="Delete contact by ID",
     *  description="Delete contact by ID",
     *  @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *         type="integer"
     *     )
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\MediaType(
     *          mediaType="application/json",
     *      )
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *  ),
     *  @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *  ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function destroy($id){
        return $this->repository->destroy($id);
    }
}
