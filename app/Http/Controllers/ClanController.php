<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clan;

class ClanController extends Controller
{
    function show(){
        $clan = Clan::where('id',  auth()->user()->clan_id)->first();
        if ($clan) return view('clan', ['clan' => $clan]);
        else {
            $clans = Clan::all();
            return view('noclan', ['clans' => $clans]);
        }

    }
}
