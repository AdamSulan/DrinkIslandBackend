<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register( Request $request ) {
        //return $request;
        $request->validate([
            'name' => ['required'],
            'username' => ['required', 'max:50', 'unique:users'],
            'email' => ['required'],
            'password' => ['required'],
            'password_confirmation' => ['required','same:password']
        ],
        [
            'name.required'=>"A név megadása kötelező!",
            'username.required'=>"A felhasználónévnév megadása kötelező!",
            'username.max'=>"A felhasználónévnév legfeljebb 50 karakter hosszú lehet!",
            'username.unique'=>"A felhasználónévnév már létezik!",
            'email.required'=>"Az email cím megadása kötelező!",
            'password.required'=>"A jelszó megadása kötelező!",
            'password_confirmation.required'=>"A jelszó megerősítése kötelező!",
            'password_confirmation.same'=>"A két jelszó nem egyezik!",
        ]);
        $input = $request->all();
        $input[ "name" ] = $request->get("name");
        $input[ "username" ] = $request->get("username");
        $input[ "email" ] = $request->get("email");
        $input[ "password" ] = $request->get("password");
        $user = User::create( $input );
        $success[ "name" ] = $user->name;

        return response()->json([ "message" => "Sikeres regisztráció",
                                  "success" => $success ]);
    }

    public function login( Request $request ) {

        $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ],
        [
            'username.required'=>"A felhasználónév megadása kötelező!",
            'password.required'=>"A jelszó megadása kötelező!",
        ]);

        if(( Auth::attempt([ "username" => $request->username,
                             "password" => $request->password ]))) {

            $authUser = Auth::user();
            $success[ "username" ] = $authUser->username;
            $success[ "token" ] = $authUser->createToken( $authUser->username."token" )->plainTextToken;
            
        }

        return response()->json([ "message" => "Sikeres azonosítás",
                                 "success" => $success ]);
    }

    public function logout( Request $request ) {

        auth( "sanctum" )->user()->currentAccessToken()->delete();

        return response()->json([ "message" => "Sikeres kijelentkezés" ]);
    }
}
