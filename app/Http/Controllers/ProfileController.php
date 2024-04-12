<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function getUserProfileData() {
        $user = Auth::user();
        return response()->json(['user' => $user]);
    }

    public function setNewPassword(Request $request) {
        $user = Auth::user();
        $request -> validate([
            'password' => 'required',
            'password_confirmation' => ['required','same:password']
        ],[
            'password.required'=>"A jelszó megadása kötelező!",
            'password_confirmation.required'=>"A jelszó megerősítése kötelező!",
            'password_confirmation.same'=>"A két jelszó nem egyezik!",
        ]);
        $user->save();
        return response()->json(['message' => 'Jelszó megváltoztatva']);
    }

    public function deleteAccount() {
        $user = Auth::user();
        $user ->delete();
        return response()->json(['message' => 'Sikeres törlés']);
    }
}
