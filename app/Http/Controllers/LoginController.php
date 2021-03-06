<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        // TODO: Implement __invoke() method.
            $user = User::whereEmail($request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)){
                return response('Credential not match', Response::HTTP_UNAUTHORIZED);
            }

            $token = $user->createToken('api');

            return response([
               'token' => $token->plainTextToken
            ]);
    }
}
