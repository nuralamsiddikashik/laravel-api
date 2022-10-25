<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    /**
     * @param Request $request
     */
    public function login( Request $request ) {

        // $credentials = $request->only( 'email', 'password' );
        // if ( Auth::attempt( $credentials ) ) {
        //     $user  = auth()->user();
        //     $token = $user->createToken( 'auth_token' )->plainTextToken;
        //     return response()->json( [
        //         'access_token' => $token,
        //         'token_type'   => 'Bearer',
        //         'user'         => $user,
        //     ] );
        // } else {
        //     return response()->json( ['error' => 'Unahtorized'], 401 );
        // }

        if ( !Auth::attempt( $request->only( 'email', 'password' ) ) ) {
            return response()->json( [
                'message' => 'Invalid login details',
            ], 401 );
        }
        $request->session()->regenerate();
    }

}
