<?php

namespace App\Http\Controllers;

use App\Slider;
use App\User;
use App\Rating;
use App\Vote;
use App\Advertisement;
use App\Advertisementcontent;
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

        $votes = new Vote;
        $votes->value = $bookmaker->rating;
        $votes->bookmaker_id = $bookmaker->id;
        $votes->user_id = Auth::id();
        $votes->save();

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

        $vote = DB::table('votes')->where('user_id', Auth::id())->where('bookmaker_id', $id)->first();

        if(!empty($vote)){
            $votes = Vote::find($vote->id);
            $votes->value = $bookmaker->rating;
            $votes->bookmaker_id = $bookmaker->id;
            $votes->user_id = Auth::id();
            $votes->save();
        }else{
            $votes = new Vote;
            $votes->value = $bookmaker->rating;
            $votes->bookmaker_id = $bookmaker->id;
            $votes->user_id = Auth::id();
            $votes->save();
        }

        return redirect('/admin/bookmakers');
    }

    public function bookmakersDelete($id){
        $bm =  Rating::find($id);
        Rating::findOrFail($id)->delete();
        DB::table('votes')->where('bookmaker_id', '=', $id)->delete();
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

    /*===========Advertisement=============*/
    public function advertisement(){

        $advertisements = DB::table('advertisements')->groupBy('imageName')->orderBy('created_at', 'desc')->get();

        return view('admin.pages.advertisement', [
            'advertisements' => $advertisements
        ]);
    }

    public function advertisementAdd(Request $request){

        $advertisement = new Advertisement;

        if(Input::file('advertisementImg')){
            $file = array('image' => Input::file('advertisementImg'));
            // setting up rules
            $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
            // doing the validation, passing post data, rules and the messages
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {
                // send back to the page with the input data and errors
                return Redirect::to('/admin/advertisement')->withInput()->withErrors($validator);
            }
            else {
                // checking file is valid.
                $destinationPath = 'assets/images/bm/admin-advertisement/'; // upload path
                $extension = Input::file('advertisementImg')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('advertisementImg')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $advertisement->imageName = $fileName;


            }
        }

        $advertisement->affLink = $request->affLink;

        $advertisement->save();

        return redirect('/admin/advertisement');
    }

    public function advertisementDelete($id){
        $adv =  Advertisement::find($id);
        Advertisement::findOrFail($id)->delete();

        File::delete('assets/images/bm/admin-advertisement/'.$adv->imageName);
        return redirect('/admin/advertisement');
    }


    /*Advertisement bottom content*/
     /*===========Advertisement=============*/
    public function advertisementContent(){

        $contentAdvertisements = DB::table('advertisementcontents')->groupBy('imageName')->orderBy('created_at', 'desc')->get();

        return view('admin.pages.contentAdvertisement', [
            'contentAdvertisements' => $contentAdvertisements
        ]);
    }

    public function advertisementContentAdd(Request $request){

        $contentAdvertisement = new Advertisementcontent;

        if(Input::file('advertisementContentImg')){
            $file = array('image' => Input::file('advertisementContentImg'));
            // setting up rules
            $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
            // doing the validation, passing post data, rules and the messages
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {
                // send back to the page with the input data and errors
                return Redirect::to('/admin/advertisementcontent')->withInput()->withErrors($validator);
            }
            else {
                // checking file is valid.
                $destinationPath = 'assets/images/bm/admin-advertisement-content/'; // upload path
                $extension = Input::file('advertisementContentImg')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('advertisementContentImg')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $contentAdvertisement->imageName = $fileName;


            }
        }

        $contentAdvertisement->affLink = $request->affLink;

        $contentAdvertisement->save();

        return redirect('/admin/advertisementcontent');
    }

    public function advertisementContentDelete($id){
        $adv =  Advertisementcontent::find($id);
        Advertisementcontent::findOrFail($id)->delete();

        File::delete('assets/images/bm/admin-advertisement-content/'.$adv->imageName);
        return redirect('/admin/advertisementcontent');
    }

}