<?php

namespace App\Repositories;

use App\Http\Requests\Api\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    protected $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param UserLoginRequest $request
     * @return JsonResponse|void
     */
    public function login(UserLoginRequest $request) // log in to the system
    {
        $userCheck = $this->user->where('email',$request->email)->first();
        if ($userCheck)
        {
            $passwordCheck = Hash::check($request->password,$userCheck->password);
            if ($passwordCheck == true)
            {
                $responseData['status'] = 1;
                $responseData['message'] = 'Login Successful';
                $responseData['user'] = $userCheck;
                return response()->json($responseData,200, [], JSON_UNESCAPED_UNICODE);
            } else {
                $responseData['status'] = 0;
                $responseData['message'] = 'Login Failed';
                $responseData['user'] = '';
                return response()->json($responseData,200, [], JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
