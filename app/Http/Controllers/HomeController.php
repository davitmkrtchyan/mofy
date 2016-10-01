<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function game($p1, $p2)
    {
        return view('pages.game', compact('p1', 'p2'));
    }

    public function serie($s1)
    {
        return view('pages.serie', compact('s1'));
    }

    public function today($t1)
    {
        return view('pages.today_matches', compact('t1'));
    }

    public function bookmaker($b1)
    {
        return view('pages.bookmaker', compact('b1'));
    }
}
