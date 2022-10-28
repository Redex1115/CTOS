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
        $blacklists = DB::table('blacklists')->leftJoin('users','blacklists.created_by','=','users.id')
        ->select('blacklists.*','users.name as uName')->paginate(5);

        // $unblacklists = Blacklist::where('deleted_by','=', Input::get('deleted_by'))->count === 1;
        // $blacklists = Blacklist::where('deleted_by','=', Input::get('deleted_by'))->count === 0;
        
        return view("home")->with(["agents" => $agents])->with(["members" => $members])->with(["blacklists" => $blacklists]);
    }
}