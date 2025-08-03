<?php

namespace App\Http\Controllers;

use App\Models\home;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index()
    {
        $home = home::all() ;
        return view('home.about')->with('home',$home);
    }
}
