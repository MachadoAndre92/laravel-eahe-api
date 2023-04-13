<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return $request;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $user = User::create($request->all());

        if (!$user) {
            return response()->json(['message' => 'Leitura not created'], 422);
        }
    
        return response()->json($user, 200);
    }
}
