<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Traits\CreateUser;
use Exception;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class AuthController extends Controller
{
    use createUser;

    /**
     * User registration
     *
     * @param RegisterUserRequest $request
     * @return Response
     */
    public function register(RegisterUserRequest $request): Response
    {
        try {
            $user = $this->createUser($request->validated());
            $token = $user->createToken('API Token')->plainTextToken;

            return response(['status' => 'success', 'response' => ['access' => ['token_type' => 'Bearer', 'token' => $token]]]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'response' => [$e->getMessage()]], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}
