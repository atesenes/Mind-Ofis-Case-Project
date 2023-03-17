<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontIndexController extends Controller
{
    public function frontIndex()
    {
        return view('front.index');
    }
    //Front yapısını bunun üzerinde kurun.
}
