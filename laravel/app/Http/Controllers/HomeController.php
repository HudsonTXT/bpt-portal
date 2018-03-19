<?php

namespace App\Http\Controllers;

use App\Setting;
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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = Setting::where('key', 'home_page')->first();

        return Admin\PagesController::show($home->value);
    }
}
