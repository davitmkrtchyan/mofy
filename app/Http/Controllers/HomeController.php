<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Rating;
use App\Vote;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

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
        $model = null;
        $model = $this->apiClientService->getLiveEvents();
        $model['groups'] = $this->apiClientService->getAllGroups();

        $sliders = DB::table('sliders')->orderBy('created_at', 'desc')->get();
        return view('welcome')->with('model', $model)->with('sliders', $sliders);
    }

    public function bookmakers()
    {

        $bookmakers = DB::table('votes')
            ->leftJoin('ratings', 'votes.bookmaker_id', '=', 'ratings.id')
            ->select('*', DB::raw('SUM(votes.value)/COUNT(votes.value) as total_sum'))
            ->groupBy('bookmaker_id')
            ->paginate(4);
        $bookmakersCount = count($bookmakers);
        $count = 0;
        return view('pages.ratings')->with('bookmakers', $bookmakers)->with('bookmakersCount', $bookmakersCount)->with('count', $count);
    }

    public function bookmakersSort(Request $request)
    {
        if($request['name'] == 'true'){
            $bookmakers = DB::table('votes')
                ->leftJoin('ratings', 'votes.bookmaker_id', '=', 'ratings.id')
                ->select('*', DB::raw('SUM(votes.value)/COUNT(votes.value) as total_sum'))
                ->groupBy('bookmaker_id')
                ->orderBy('ratings.bookmaker', 'asc')
                ->paginate(4);
            $bookmakersCount = count($bookmakers);
            $count = 0;
            return view('pages.ratings')->with('bookmakers', $bookmakers)->with('bookmakersCount', $bookmakersCount)->with('count', $count);
        }else{
            $bookmakers = DB::table('votes')
                ->leftJoin('ratings', 'votes.bookmaker_id', '=', 'ratings.id')
                ->select('*', DB::raw('SUM(votes.value)/COUNT(votes.value) as total_sum'))
                ->groupBy('bookmaker_id')
                ->orderBy('total_sum', 'desc')
                ->paginate(4);
            $bookmakersCount = count($bookmakers);
            $count = 0;
            return view('pages.ratings')->with('bookmakers', $bookmakers)->with('bookmakersCount', $bookmakersCount)->with('count', $count);
        }

    }

    public function bookmakersVote(Request $request)
    {
        $user_id = Auth::id();

            $vote = DB::table('votes')->where('user_id', $user_id)->where('bookmaker_id', $request['bookmaker_id'])->first();

        if(!empty($vote)){
            $val = Vote::find($vote->id);
            $val->value = $request['value'];
            $val->bookmaker_id = $request['bookmaker_id'];
            $val->user_id = $user_id;
            $val->save();
        }else{
            $vote = new Vote;
            $vote->value = $request['value'];
            $vote->bookmaker_id = $request['bookmaker_id'];
            $vote->user_id = $user_id;
            $vote->save();
        }

        return json_encode('');
    }

    public function bookmakersDetails($id)
    {
        $bm =  Rating::find($id);

        if(!$bm){
            return redirect('bookmakers');
        }
        return view('pages.bookmakerDetails', [
            'bookmaker' => $bm
        ]);
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

    public function loadByEventID($id)
    {
        $model = null;
        $model =$this->apiClientService->getEventByID($id);
        $model['groups'] = $this->apiClientService->getAllGroups();
        return $model ? view('pages.game', $model) : view('errors.503');
    }

//    public function loadGamesByGroupAndCountry()
//    {
//        return view('testGame', $this->apiClientService->loadGamesByGroupAndCountry(request('sport'), request('country'), request('group')));
//    }
    public function loadGamesByGroupAndCountry($sport, $country, $group)
     {
         return view('testGame', $this->apiClientService->loadGamesByGroupAndCountry($sport, $country, $group));
     }

    public function loadCountForGroups()
    {
//        $this->apiClientService->loadGamesByGroupListAndCountry(request('sportName'), request('countryName'), explode("+", request('groupsList')));
//        return "ok";
    }
}
