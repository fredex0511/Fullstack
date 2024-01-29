<?php

namespace App\Http\Controllers;

use App\Mail\Verificacion;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;


class UsersController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id ?? 2,
        ]);

        return response()->json([
            'user' => $user,
        ],201);
    
    }

    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'error' => 'Error de validación de datos',
            'errors' => $validator->errors()
        ], 422);
    }

    // Verifica si el usuario está activo antes de consultar la base de datos
    $user = User::where('email', $request->email)
                ->where('is_active', 1)
                ->first();

    if (!$user) {
        return response()->json([
            'error' => 'Credenciales inválidas o usuario inactivo'
        ], 400);
    }

    try {
        // Intenta generar el token
        $token = JWTAuth::fromUser($user);

        return response()->json(compact('token'));
    } catch (JWTException $e) {
        return response()->json([
            'error' => 'No se pudo crear el token'
        ], 500);
    }
}



    public function logout(Request $request) {
        $token = JWTAuth::parseToken();

        try{
            $token->invalidate();

            $token->blacklist();
        }catch(TokenExpiredException $e){
        }

        return response()->json(['message' => 'Successfully logged out'], 200);
    }

    public function refresh(Request $request)
    {
        $token = JWTAuth::getToken();

        try{
            $tokennuevo = JWTAuth::refresh($token);
        }catch(TokenExpiredException $e){
        }
        return response()->json(["nuevo token" => $tokennuevo], 200);
    }



    public function tokenuser(Request $request)
    {
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
        return response()->json($user, 200);
    }

    public function generateLink($user)
    {
        return URL::temporarySignedRoute(
            'link',
            now()->addMinutes(5),
            ['user' => $user]
        );
    }

    public function verificar(Request $request){
        $validator = Validator::make($request->all(), [
            'email' =>'required|email',
        ]);
        
        $user = User::where('email', $request->email)->first();

        if($user){
            $link = $this->generateLink($user->email);
            $data = ['link' => $link, 'nombre' => $user->nombre];
            Mail::to($user->email)->send(new Verificacion($data));
            return response()->json([
                'message' => 'Chequea tu email para verificar'
            ],201);
        }

        return response()->json([
            'error' => 'Usuario no encontrado 1'
        ],404);

    }

    public function verificarmail( $user){
        $user = User::where('email', $user)->first();
        if($user){
            $user->is_active = 1;
            $user->role_id =3;
            $user->email_verified_at = now();
            $user->save();

            return response()->json([
                'message' => 'Usuario verificado exitosamente'
            ],200);
        }

        return response()->json([
            'error' => 'Usuario no encontrado 2'
        ],404);
    }

}




