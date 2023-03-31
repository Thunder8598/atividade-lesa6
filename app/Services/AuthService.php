<?php

namespace App\Services;

use App\Exceptions\UnauthorizedException;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function validateLogin(Request $request): bool
    {
        $user = User::findOneByEmail($request->get('email'));

        if (empty($user) || !Hash::check($request->get('password'), $user->password))
            return false;

        $session = $request->session();

        $session->put('id', $user->id);
        $session->put('name', $user->name);

        return true;
    }

    /**
     * @throws UnauthorizedException
     */
    public function generateToken(Request $request): object
    {
        $user = User::findOneByEmail($request->get('email'));

        if (empty($user) || !Hash::check($request->get('password'), $user->password))
            throw new UnauthorizedException("E-mail e/ou senha inválidos");

        return (object)[
            'token' => JWT::encode(['id' => $user->id], config('jwt.key'), 'HS256'),
            'name' => $user->name
        ];
    }
}
