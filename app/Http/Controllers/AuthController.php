<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function authenticate(Request $request)
    {
        if (!$this->authService->validateLogin($request))
            return redirect('login');

        return redirect('/');
    }

    public function authenticateAPI(Request $request): \Illuminate\Http\JsonResponse
    {
        $response = $this->authService->generateToken($request);

        return response()->json([
            'token' => $response->token,
            'type' => 'Bearer',
            'name' => $response->name
        ]);
    }
}
