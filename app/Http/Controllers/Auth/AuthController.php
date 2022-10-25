<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Cookie;

// here is the code for settling login,register,logout function
class AuthController extends Controller
{

    public function index(){

        return view('auth.login');

    }

    public function agentRegistration(){

        return view('auth.agentRegistration');

    }

    public function userRegistration(){

        return view('auth.userRegistration');

    }

    public function postLogin(Request $request){

        $request->validate([
            'password' => 'required',
            'email' => 'required',
        ]);

        if($request->has('rememberme')){
            Cookie::queue('email',$request->email,1440);
            Cookie::queue('password',$request->password,1440);
        }

        $credentials = $request->only('password', 'email');

        if(Auth::attempt($credentials)){
            Session::flash('success',"You have login successfully!");
            return redirect()->intended('home')->withSuccess('You have successfully logged in!');
        }

        return redirect('login')->with('success','Your password or email is incorrect. Please re-enter again.');

    }

    public function postRegistration(Request $request){
        
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'type' => 'required',
            'handphone_number' => 'nullable',
            'gender' => 'nullable',
        ]);
    
        $data = $request->all();
        $check = $this->create($data);

        return redirect('home')->withSuccess('You have successfully logged in!');
    }

    public function dashboard(){

        if(Auth::check()){
            return view('dashboard');
        }

        return redirect('login')->withSuccess('You do not have access to this page!');
    }
    
    public function create(array $data){
        
        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'handphone_number' => $data['handphone_number'],
            'gender' => $data['gender'],
            'type' => $data['type'],
        ]);
    }

    public function viewAgent()
    {
        $userAs = DB::table('users')->select('users.*')->where('type','2')->get();
        return view("pages.viewAgent")->with(["userAs" => $userAs]);
    }

    public function viewMember()
    {
        $users = User::all()->where('type','1');
        return view("pages.viewMember")->with(["users" => $users]);
    }
    public function showAgent()
    {
        $agents = DB::table('users')->select('users.*')->where('type','2')->get();
        $members = DB::table('users')->select('users.*')->where('type','1')->get();
        return view("dashboard")->with(["agents" => $agents])->with(["members" => $members]);
    }

    public function deleteAgent($id)
    {
        $agents = User::find($id);
        $agents->delete();

        Session::flash('success',"Agent was deleted from record successfully!");
        return redirect()->back();
    }

    public function deleteMember($id)
    {
        $members = User::find($id);
        $members->delete();

        Session::flash('success',"Member was deleted from record successfully!");
        return redirect()->back();
    }

    public function showMember()
    {
        $users = User::all()->where('type','1');
        return view("pages.showMember")->with(["users" => $users]);
    }
    public function editMember($id)
    {
        $users = User::all()->where('id',$id);

        return view('pages.editMember')->with(["users" => $users]);
    }

    public function editAgent($id)
    {
        $users = User::all()->where('id',$id);

        return view('pages.editAgent')->with(["users" => $users]);
    }

    public function update(Request $r)
    {
        $users = User::find($r->id);
        $r->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required',
            'handphone_number' => 'nullable',
            'gender' => 'nullable',
            'ic' => 'nullable',
            'bank_account_number1' => 'nullable',
            'bank_account_number2' => 'nullable',
            'bank_account_number3' => 'nullable',
        ]);

        $users->name = $r->name;
        $users->password = $r->password;
        $users->email = $r->email;
        $users->handphone_number = $r->handphone_number;
        $users->gender = $r->gender;
        $users->ic = $r->ic;
        $users->bank_account_number1 = $r->bank_account_number1;
        $users->bank_account_number2 = $r->bank_account_number2;
        $users->bank_account_number3 = $r->bank_account_number3;
        $users->save();

        Session::flash('success',"User was updated successfully!");
        return redirect();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
    public function profile(){
        $users = User::all()->where('id','=',Auth::id());
        return view('pages.profile')->with(["users" => $users]);
    }
}