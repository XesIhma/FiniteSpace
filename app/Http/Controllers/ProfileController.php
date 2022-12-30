<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    function show(){
        $profiles = auth()->user()->profiles;

        return view('profile', ['profiles' => $profiles]);

    }
}
