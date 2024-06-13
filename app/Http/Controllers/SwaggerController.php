<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SwaggerController extends Controller
{
        /**
     * @OA\Post(
     * path="/register",
     * tags={"User"},
     * summary="Register a new user",
     * @OA\Parameter(
     * name="name",
     * in="query",
     * description="User's name",
     * required=true,
     * @OA\Schema(type="string")
     * ),
     * @OA\Parameter(
     * name="email",
     * in="query",
     * description="User's email",
     * required=true,
     * @OA\Schema(type="string")
     * ),
     * @OA\Parameter(
     * name="password",
     * in="query",
     * description="User's password",
     * required=true,
     * @OA\Schema(type="string")
     * ),
     * @OA\Response(response="201", description="User registered successfully"),
     * @OA\Response(response="422", description="Validation errors")
     * )
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    /**
     * @OA\Post(
     * path="/login",
     * tags={"User"},
     * summary="Authenticate user and generate JWT token",
     * @OA\Parameter(
     * name="email",
     * in="query",
     * description="User's email",
     * required=true,
     * @OA\Schema(type="string")
     * ),
     * @OA\Parameter(
     * name="password",
     * in="query",
     * description="User's password",
     * required=true,
     * @OA\Schema(type="string")
     * ),
     * @OA\Response(response="200", description="Login successful"),
     * @OA\Response(response="401", description="Invalid credentials")
     * )
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message'=>'Email ou mot de pass e incorrecte!']);
        }
        $token = $user->createToken($request->email)->plainTextToken;
        $user -> token = $token;
        return $user;
    }
}
