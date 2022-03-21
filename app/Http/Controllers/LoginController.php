<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password')))
        {
            return response()->json(Auth::guard('web')->user(), 200);
        }
        throw ValidationException::withMessages([
            'email' => ['Неверный логин или пароль'] //формирование ошибки которая придет респонсом в консоль и кач
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }
}
