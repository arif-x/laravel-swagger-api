<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Response;
use App\Repositories\Api\ContactRepository;

class ContactController extends Controller
{
    private $response;
    private $repository;

    public function __construct(
        Response $response,
        ContactRepository $repository
    )
    {
        $this->response = $response;
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
     * summary="Get list of contacts",
     * description="Returns list of contacts",
     * 
     * @OA\Parameter(
     *      name="search",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *           type="string"
     *      )
     *  ),
     *  @OA\Parameter(
     *      name="sort",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *          type="string"
     *      )
     *  ),
     *  @OA\Parameter(
     *      name="limit",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *        type="string"
     *      )
     *  ),
     *     @OA\Response(
     *        response=200,
     *         description="Success",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                example={
     *                    "status": "true",
     *                    "token_type": "Data berhasil ditampilkan",
     *                    "data": {}
     *                }
     *             )
     *         )
     *      ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request",
     *      @OA\MediaType(
     *      mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "false",
     *                    "message": "Bad Request | Validation Error Message",
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
     *                    "data": {"messages": {}}
     *                }
     *           )
     *      )
     *   )
     * ),
     * )
     */
    public function index(Request $request){
        try {
            return $this->repository->index($request);
        } catch (\Exception $th) {
            return $this->response->error($th->getMessage());
        }
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
     * description="Returns contact by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *         type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "true",
     *                    "token_type": "Single Data berhasil ditampilkan",
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
     *                    "message": "Bad Request | Validation Error Message",
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
     *      response=404,
     *      description="Not Found",
     *      @OA\MediaType(
     *      mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "false",
     *                    "message": "Data tidak ditemukan",
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
     *                    "data": {"messages": {}}
     *                }
     *           )
     *      )
     *    )
     *  ),
     * )
     */
    public function show($id){
        try {
            return $this->repository->show($id);
        } catch (\Exception $th) {
            return $this->response->error($th->getMessage());
        }
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
     * 
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
     *       @OA\Response(
     *          response=200,
     *           description="Success",
     *          @OA\MediaType(
     *               mediaType="application/json",
     *               @OA\Schema(
     *                    example={
     *                        "status": "true",
     *                        "token_type": "Single Data berhasil ditambah",
     *                        "data": {}
     *                    }
     *              )
     *          )
     *       ),
     *       @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\MediaType(
     *          mediaType="application/json",
     *               @OA\Schema(
     *                    example={
     *                        "status": "false",
     *                        "message": "Bad Request | Validation Error Message",
     *                        "data": null
     *                    }
     *               )
     *          )
     *       ),
     *       @OA\Response(
     *          response=401,
     *          description="Unauntheticated",
     *          @OA\MediaType(
     *          mediaType="application/json",
     *               @OA\Schema(
     *                    example={
     *                        "status": "false",
     *                        "message": "Unauntheticated",
     *                        "data": {}
     *                    }
     *               )
     *          )
     *       ),
     *       @OA\Response(
     *          response=500,
     *          description="Internal Error",
     *          @OA\MediaType(
     *          mediaType="application/json",
     *               @OA\Schema(
     *                    example={
     *                        "status": "false",
     *                        "message": "Internal Error",
     *                        "data": {"messages": {}}
     *                    }
     *               )
     *          )
     *       )
     *   ),
     * )
     */
    public function store(Request $request){
        try {
            return $this->repository->store($request);
        } catch (\Exception $th) {
            return $this->response->error($th->getMessage());
        }
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
     * description="Update contact by ID",
     * 
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
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "true",
     *                    "token_type": "Data berhasil diupdate",
     *                    "data": {}
     *                }
     *          )
     *      )
     *   ),
     *   @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\MediaType(
     *          mediaType="application/json",
     *               @OA\Schema(
     *                    example={
     *                        "status": "false",
     *                        "message": "Bad Request | Validation Error Message",
     *                        "data": null
     *                    }
     *               )
     *          )
     *    ),
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
     *      response=404,
     *      description="Not Found",
     *      @OA\MediaType(
     *      mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "false",
     *                    "message": "Data tidak ditemukan",
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
     *                    "data": {"messages": {}}
     *                }
     *           )
     *      )
     *   ),
     * )
     */
    public function update($id, Request $request){
        try {
            return $this->repository->update($id, $request);
        } catch (\Exception $th) {
            return $this->response->error($th->getMessage());
        }
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
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "true",
     *                    "token_type": "Data berhasil dihapus",
     *                    "data": {}
     *                }
     *          )
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
     *      response=404,
     *      description="Not Found",
     *      @OA\MediaType(
     *      mediaType="application/json",
     *           @OA\Schema(
     *                example={
     *                    "status": "false",
     *                    "message": "Data tidak ditemukan",
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
     *                    "data": {"messages": {}}
     *                }
     *           )
     *      )
     *   )
     * )
     */
    public function destroy($id){
        try {
            return $this->repository->destroy($id);
        } catch (\Exception $th) {
            return $this->response->error($th->getMessage());
        }
    }
}
