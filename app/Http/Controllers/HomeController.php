<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $agents = DB::table('users')->select('users.*')->where('type','2')->paginate(5);
        $members = DB::table('users')->select('users.*')->where('type','1')->paginate(5);
        $blacks = User::all()->whereNotNull('reason');
        return view("home")->with(["agents" => $agents])->with(["members" => $members])->with(["blacks" => $blacks]);
    }
}