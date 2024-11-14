<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UserController extends Controller
{
    /**
     * Profile data output
     *
     * @param ProfileRequest $request
     * @return Response
     */
    public function profile(ProfileRequest $request): Response
    {
        try {
            $user = User::where('email', $request->email)->first();

            if (!Hash::check($request->password, $user->password)) {
                return response(['status' => 'error', 'response' => 'Invalid login or password'], HttpResponse::HTTP_UNAUTHORIZED);
            }

            return response(['status' => 'success', 'response' => ['user' => $user]]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'response' => [$e->getMessage()]], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}
