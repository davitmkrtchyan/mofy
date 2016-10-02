<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $apiClientService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->apiClientService = app()->make('apiClientService');
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome', $this->apiClientService->getLiveEvents());
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
