<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    function show(){
        $works = [];
        


        return view('work', ['works'=>$works]);
    }
}
