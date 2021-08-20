<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserLoginRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /** @OA\Post(
     *     path="/api/login",
     *     tags={"Login"},
     *     summary="Login Action",
     *     description="Login Action",
     *     @OA\Parameter(
     *          name="email",
     *          description="User e-mail address",
     *          required=true,
     *          @OA\Schema(
     *         type="string",
     *       ),
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="password",
     *          description="User password",
     *          required=true,
     *         @OA\Schema(
     *         type="string",
     *       ),
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Login Is Successful",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="token",
     *                  type="string"
     *             )
     *          )
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *     )
     * )
     */

    /**
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request)
    {
        $loginUser = $this->userService->login($request);

        return response()->json($loginUser, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
