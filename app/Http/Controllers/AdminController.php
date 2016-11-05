<?php

namespace App\Http\Controllers;

use App\User;
use App\Rating;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    private $user_id;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, Redirector $redirect)
    {
        $this->middleware('auth');
        $this->user_id = Auth::id();
        $tasks = User::find($this->user_id);
        if($tasks->role !== "admin"){
            $redirect->to('/')->send();
        }
    }


    public function index()
    {
        return view('admin.dashboard');
    }

    public function stars()
    {
        return view('admin.stars');
    }

    public function starsSave(Request $request)
    {

            DB::table('ratings')
                ->where('bookmaker', $request['bookmaker'])
                ->update(['rating' => $request['rating'] ]);



        return $this->stars();
    }

}