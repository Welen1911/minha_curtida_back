<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = Auth::user()->createToken(Auth::user()->id, ['server:update']);

            return response([
                'token' => $token->plainTextToken,
            ], 200);
        }
    }
}
