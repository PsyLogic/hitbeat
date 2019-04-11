<?php

namespace App\Http\Controllers;

use App\Album;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        return view('index', ['albums' => Album::all()]);
    }
}
