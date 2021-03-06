<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Rating;
use App\User;
use App\Vote;
use App\Advertisement;
use App\Advertisementcontent;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    protected $apiClientService;
    protected $searchService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->apiClientService = app()->make('apiClientService');
        $this->searchService = app()->make('searchService');
//        $this->middleware('auth');
        $groups = $this->apiClientService->getAllGroups();
        view()->share([ 'advertisement' => Advertisement::all() ]);
        view()->share([ 'advertisementContent' => Advertisementcontent::all() ]);
        view()->share([ 'groups' => $groups ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = null;
        $model = $this->apiClientService->getLiveEvents($request);
        return view('welcome')->with('model', $model);
    }

    public function indexMain(Request $request)
    {
        $model = null;
        $model = $this->apiClientService->getLiveEvents($request);
        $sliders = DB::table('sliders')->orderBy('created_at', 'desc')->get();
        return view('welcomeMain')->with('model', $model)->with('sliders', $sliders);
    }

    public function changePassView()
    {
        $user = User::find(Auth::id());

        return view('auth.passwords.update')->with('email', $user['email']);
    }

    public function changePass(Request $request)
    {
        $user = User::find(Auth::id());

        if ($user['email'] === $request['email'] && $request['password'] === $request['password_confirmation']) {
            $data = $request->input();
            $data['name'] = $user['name'];
            $user['password'] = bcrypt($request['password']);
            $request['name'] = $user['name'];
            $user->save();

            Mail::send('emails.greeting', $data, function ($message) use ($data) {
                $message->from('infomofy@gmail.com', 'More Odds For You');

                $message->to($data['email'], $data['name'])->subject('Password changed');
            });
        }

        return redirect('/');

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
        return view('pages.ratings')
            ->with('bookmakers', $bookmakers)
            ->with('bookmakersCount', $bookmakersCount)
            ->with('count', $count);
    }

    public function bookmakersSort(Request $request)
    {
        if ($request['name'] == 'true') {
            $bookmakers = DB::table('votes')
                ->leftJoin('ratings', 'votes.bookmaker_id', '=', 'ratings.id')
                ->select('*', DB::raw('SUM(votes.value)/COUNT(votes.value) as total_sum'))
                ->groupBy('bookmaker_id')
                ->orderBy('ratings.bookmaker', 'asc')
                ->paginate(4);
            $bookmakersCount = count($bookmakers);
            $count = 0;
            return view('pages.ratings')->with('bookmakers', $bookmakers)->with('bookmakersCount', $bookmakersCount)->with('count', $count);
        } else {
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

        if (!empty($vote)) {
            $val = Vote::find($vote->id);
            $val->value = $request['value'];
            $val->bookmaker_id = $request['bookmaker_id'];
            $val->user_id = $user_id;
            $val->save();
        } else {
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
        $bm = Rating::find($id);

        if (!$bm) {
            return redirect('bookmakers');
        }
        return view('pages.bookmakerDetails', [
            'bookmaker' => $bm
        ]);
    }


    public function contactFormSend(Request $request)
    {
        $user = DB::table('users')->where('email', $request->email)->value('id');

        $data = $request->input();
        if ($user) {
            $data['info'] = '';
        } else {
            $data['info'] = 'not';
        }

        Mail::send('emails.contactus', ['data' => $data], function ($message) use ($data) {
            $message->from('infomofy@gmail.com', 'More Odds For You');

            $message->to('info@moreoddsforyou.com', $data['name'])->subject('Contact form');
        });

        return redirect('/');

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
        $model = $this->apiClientService->getEventByID($id);
        if ($model) {
            $model['groups'] = $this->apiClientService->getAllGroups();
            return $model ? view('pages.game', $model) : view('errors.503');
        } else {
            return view('errors.503');
        }
    }

    public function loadByEventIDFromSureBet($id)
    {
        $model = null;
        $model = $this->apiClientService->getEventByID($id,true);
        if ($model) {
            $model['groups'] = $this->apiClientService->getAllGroups();
            return $model ? view('pages.game', $model) : view('errors.503');
        } else {
            return view('errors.503');
        }
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

    public function matches(Request $request)
    {
        $model = null;
        $model = $this->apiClientService->getMatches($request);
        return view('welcome')->with('model', $model)->with('showLiveEventsURL',true);
    }

    public function liveEvents(Request $request)
    {
        $model = null;
        $model = $this->apiClientService->getLiveEvents($request,false);
        return view('welcome')->with('model', $model);
    }

    public function search(Request $request)
    {
        return view('_searchResults', ['eventsGroups' => $this->searchService->search($request)['eventsGroups']]);
    }

    public function surebets(Request $request)
    {
        try{
        $model = null;
        $model = $this->apiClientService->getSurebets($request);
        return view('surebets')->with('model', $model)->with('surebets', true);
        }catch (\Exception $e){
            return view('errors.503');
        }
    }

    public function calculator()
    {
        return view('home.calculator');
    }

    public function contactus()
    {
        return view('pages.contactus');
    }

    public function loadGroupEvents($id){
       return view('pages.groupGames', $this->apiClientService->loadGroupEvents($id));
    }
}
