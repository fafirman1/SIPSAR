<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function login(Request $request){
        $loginData=$request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user = \App\Models\User::where('email', $request->email)->first();

        $token=$user->createToken('auth_token')->plainTextToken;

        return response([
            'user'=>$user,
            'token'=>$token,
        ], 200);
    }
}
