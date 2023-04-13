<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Register a newly created user in storage.
     */
    public function register(Request $request)
    {
        $fields=$request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    /**
     * login a user in storage.
     */
    public function login(Request $request)
    {
        $fields=$request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //Check user
        $user = User::where('email', $fields['email'])->first();

        //Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response()->json(['message' => 'Bad Credentials'], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    public function logout(Request $request)
    {
       auth()->user()->tokens()->where('id', $request->user()->currentAccessToken()->id)->delete();
        
        return response()->json(['message' => 'Token revoked'], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
