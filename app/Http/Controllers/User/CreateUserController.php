<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    public function __invoke(Request $request) {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
        ]);

        User::create($request->only(['name', 'email', 'password']));

        return response('', 201);
    }
}
