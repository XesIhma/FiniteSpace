<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required | min: 4 | max:18',
            'email'=> 'email:rfc',
            'password' => 'required | min:8 | max:30'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'premium' => 20
        ]);
        $profile = Profile::create([
            'name' => 'Alice',
            'image' => '/avatars/girl.jpg',
            'user_id' => $user->id
          
        ]);

        return back()->with('success', 'Udało Ci się stworzyć konto. Teraz możesz się zalogować');
    }

    public function login(Request $request){
        if(Auth::attempt($request->only('name', 'password'))){
            return redirect('home');
        }

        return back()->with('error', "Błędny login lub hasło");
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
