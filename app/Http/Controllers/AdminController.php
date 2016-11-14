<?php

namespace App\Http\Controllers;

use App\Slider;
use App\User;
use App\Rating;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $bookmakers = DB::table('ratings')->groupBy('bookmaker')->orderBy('created_at', 'desc')->get();

        $bookmakersCount = count($bookmakers);

        return view('admin.pages.bookmakers', [
            'bookmakers' => $bookmakers,
            'bookmakersCount' => $bookmakersCount
        ]);
    }

    public function bookmakersAdd(Request $request)
    {

        if(!$this->ratingCheck($request->bookmakerRating)){
            return redirect('/admin/bookmakers');
        }

        $bookmaker = new Rating;

        $file = array('image' => Input::file('bookmakerLogo'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            $destinationPath = 'assets/images/bm/admin-bookmakers/'; // upload path
            $extension = Input::file('bookmakerLogo')->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            Input::file('bookmakerLogo')->move($destinationPath, $fileName); // uploading file to given path
            // sending back with message
            $bookmaker->logo = $fileName;

        }


        $bookmaker->bookmaker = $request->bookmakerName;
        $bookmaker->rating = $request->bookmakerRating;

        $bookmaker->review = $request->bookmakerReview;
        $bookmaker->bonuses = $request->bookmakerBonuses;
        $bookmaker->advantages = $request->bookmakerAdvantages;
        $bookmaker->languages = $request->bookmakerLanguages;
        $bookmaker->depositmethods = $request->bookmakerDeposit;
        $bookmaker->withdrawalmethods = $request->bookmakerWithdrawal;
        $bookmaker->livebetting = $request->bookmakerLivebetting;
        $bookmaker->livestreaming = $request->bookmakerLivestreaming;
        $bookmaker->casino = $request->bookmakerCasino;
        $bookmaker->poker = $request->bookmakerPoker;
        $bookmaker->livechat = $request->bookmakerLivechat;
        $bookmaker->liveemail = $request->bookmakerLiveemail;
        $bookmaker->telephone = $request->bookmakerTelephone;
        $bookmaker->currencieslimits = $request->bookmakerCurrencieslimits;
        $bookmaker->affiliatelink = $request->affiliatelink;

        $bookmaker->save();

        return redirect('/admin/bookmakers');
    }

    public function bookmakersEdit($id, Request $request)
    {
        if(!$this->ratingCheck($request->bookmakerRating)){
            return redirect('/admin/bookmakers');
        }

//        DB::table('ratings')
//            ->where('id', $id)
//            ->update(['rating' => $request['bookmakerRating']]);

        $bookmaker = Rating::find($id);

        if(Input::file('bookmakerLogo')){
            $file = array('image' => Input::file('bookmakerLogo'));
            // setting up rules
            $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
            // doing the validation, passing post data, rules and the messages
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {
                // send back to the page with the input data and errors
                return Redirect::to('upload')->withInput()->withErrors($validator);
            }
            else {
                // checking file is valid.
                $destinationPath = 'assets/images/bm/admin-bookmakers/'; // upload path
                $extension = Input::file('bookmakerLogo')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('bookmakerLogo')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $bookmaker->logo = $fileName;

            }

        }


        $bookmaker->bookmaker = $request->bookmakerName;
        $bookmaker->rating = $request->bookmakerRating;

        $bookmaker->review = $request->bookmakerReview;
        $bookmaker->bonuses = $request->bookmakerBonuses;
        $bookmaker->advantages = $request->bookmakerAdvantages;
        $bookmaker->languages = $request->bookmakerLanguages;
        $bookmaker->depositmethods = $request->bookmakerDeposit;
        $bookmaker->withdrawalmethods = $request->bookmakerWithdrawal;
        $bookmaker->livebetting = $request->bookmakerLivebetting;
        $bookmaker->livestreaming = $request->bookmakerLivestreaming;
        $bookmaker->casino = $request->bookmakerCasino;
        $bookmaker->poker = $request->bookmakerPoker;
        $bookmaker->livechat = $request->bookmakerLivechat;
        $bookmaker->liveemail = $request->bookmakerLiveemail;
        $bookmaker->telephone = $request->bookmakerTelephone;
        $bookmaker->currencieslimits = $request->bookmakerCurrencieslimits;
        $bookmaker->affiliatelink = $request->affiliatelink;

        $bookmaker->save();


        return redirect('/admin/bookmakers');
    }

    public function bookmakersDelete($id){
        $bm =  Rating::find($id);
        Rating::findOrFail($id)->delete();

        File::delete('assets/images/bm/admin-bookmakers/'.$bm->logo);
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

    public function ratingCheck($rate)
    {
        if($rate < 0 || $rate > 5){
            return false;
        }
        return true;
    }

    public function slider(){

        $sliders = DB::table('sliders')->groupBy('imageName')->orderBy('created_at', 'desc')->get();

        $sliderCount = count($sliders);

        return view('admin.pages.slider', [
            'sliders' => $sliders,
            'sliderCount' => $sliderCount
        ]);
    }

    public function sliderAdd(Request $request){

        $slider = new Slider;

        if(Input::file('sliderImg')){
            $file = array('image' => Input::file('sliderImg'));
            // setting up rules
            $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
            // doing the validation, passing post data, rules and the messages
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {
                // send back to the page with the input data and errors
                return Redirect::to('/admin/slider')->withInput()->withErrors($validator);
            }
            else {
                // checking file is valid.
                $destinationPath = 'assets/images/bm/admin-slider/'; // upload path
                $extension = Input::file('sliderImg')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('sliderImg')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $slider->imageName = $fileName;


            }
        }

        $slider->gameLink = $request->gameLink;

        $slider->save();

        return redirect('/admin/slider');
    }

    public function sliderDelete($id){
        $sl =  Slider::find($id);
        Slider::findOrFail($id)->delete();

        File::delete('assets/images/bm/admin-slider/'.$sl->imageName);
        return redirect('/admin/slider');
    }

}