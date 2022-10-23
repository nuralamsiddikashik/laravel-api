<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    /**
     * @param Request $request
     */
    public function login( Request $request ) {

        $credentials = $request->only( 'email', 'password' );
        if ( Auth::attempt( $credentials ) ) {
            $user  = auth()->user();
            $token = $user->createToken( 'auth_token' )->plainTextToken;
            return response()->json( [
                'access_token' => $token,
                'token_type'   => 'Bearer',
                'user'         => $user,
            ] );
        } else {
            return response()->json( ['error' => 'Unahtorized'], 401 );
        }
    }

}
