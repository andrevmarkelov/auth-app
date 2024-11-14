<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class UserController extends Controller
{
    /**
     * Profile data output
     *
     * @param Request $request
     * @return Response
     */
    public function profile(Request $request): Response
    {
        try {
            return response(['status' => 'success', 'response' => ['user' => $request->user()]]);
        } catch (Exception $e) {
            return response(['status' => 'error', 'response' => [$e->getMessage()]], HttpResponse::HTTP_BAD_REQUEST);
        }
    }
}
