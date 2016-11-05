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

    public function bookmakers()
    {
        $bookmakers = DB::table('ratings')->groupBy('bookmaker')->get();

        $bookmakersCount = count($bookmakers);

        return view('admin.pages.bookmakers', [
            'bookmakers' => $bookmakers,
            'bookmakersCount' => $bookmakersCount
        ]);
    }

    public function bookmakersAdd(Request $request)
    {
        $bookmaker = new Rating;
        $bookmaker->bookmaker = $request->bookmakerName;
        $bookmaker->rating = $request->bookmakerRating;
        $bookmaker->save();

        return redirect('/admin/bookmakers');
    }


    public function bookmakersSave(Request $request)
    {

        DB::table('ratings')
            ->where('bookmaker', $request['bookmaker'])
            ->update(['rating' => $request['rating'] ]);

        //$rate->bookmaker = $request['bookmaker'];
        //$rate->rating = $request['rating'];
        //$rate->save();

        return $this->bookmakers();
    }

}