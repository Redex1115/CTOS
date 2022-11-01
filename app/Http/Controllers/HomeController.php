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

    public function searchAgent(Request $r)
    {
        $output = "";
        $agents = DB::table('users')->where('name','like','%'.$r->search.'%')->where('type','2')->paginate(5);

        foreach($agents as $agent){
            if($agent -> ic == null){
                $ic = "N/A";
            }
            else{
                $ic = $agent -> ic;
            }

            if($agent -> handphone_number == null){
                $hp = "N/A";
            }
            else{
                $hp = $agent -> handphone_number;
            }

            if($agent -> gender == null){
                $gender = "N/A";
            }
            else{
                $gender = $agent -> gender;
            }

            if($agent -> bank_account_number1 == null){
                $ban1 = "N/A";
            }
            else{
                $ban1 = $agent -> bank_account_number1;
            }

            if($agent -> bank_account_number2 == null){
                $ban2 = "N/A";
            }
            else{
                $ban2 = $agent -> bank_account_number2;
            }

            if($agent -> bank_account_number3 == null){
                $ban3 = "N/A";
            }
            else{
                $ban3 = $agent -> bank_account_number3;
            }

            $output .=
            '<div class="card">
                <div class="card-header">
                    '.$agent->username.'
                    <div>
                    '.'
                        <a href="/agent.delete/'.$agent->id.'" onclick="return confirm("Are you sure to delete this agent?")">'.'<i class="fa fa-trash" style="color: black; font-size: 25px;"></i></a>
                    '.'
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <table>
                                <tr>
                                    <th>Email: </th>
                                    <td>'.$agent->email.'</td>
                                </tr>
                                <tr>
                                    <th>Ic:</th>
                                    <td>'.$ic.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 1: </th>
                                    <td>'.$ban1.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 2: </th>
                                    <td>'.$ban2.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 3: </th>
                                    <td>'.$ban3.'</td>
                                </tr>
                                <tr>
                                    <th>Handphone Number: </th>
                                    <td>'.$hp.'</td>
                                </tr>
                                <tr>
                                    <th>Gender: </th>
                                    <td>'.$gender.'</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-around" >
                        '.'
                            <a href="/agent.edit/'.$agent->id.'" class="btn btn-info">'.'<i class="fa fa-pencil"></i></a>
                        '.'
                            <a href="/add-to-blacklist/'.$agent->id.'" class="btn btn-danger">'.'<i class="fa fa-user-times"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <br>';
        }
        return response($output);
    }
    public function searchMember(Request $r)
    {
        $output = "";
        $members = DB::table('users')->where('name','like','%'.$r->search.'%')->where('type','1')->paginate(5);

        foreach($members as $member){
            if($member -> ic == null){
                $ic = "N/A";
            }
            else{
                $ic = $member -> ic;
            }

            if($member -> handphone_number == null){
                $hp = "N/A";
            }
            else{
                $hp = $member -> handphone_number;
            }

            if($member -> gender == null){
                $gender = "N/A";
            }
            else{
                $gender = $member -> gender;
            }

            if($member -> bank_account_number1 == null){
                $ban1 = "N/A";
            }
            else{
                $ban1 = $member -> bank_account_number1;
            }

            if($member -> bank_account_number2 == null){
                $ban2 = "N/A";
            }
            else{
                $ban2 = $member -> bank_account_number2;
            }

            if($member -> bank_account_number3 == null){
                $ban3 = "N/A";
            }
            else{
                $ban3 = $member -> bank_account_number3;
            }

            $output .=
            '<div class="card">
                <div class="card-header">
                    '.$member->username.'
                    <div>
                    '.'
                        <a href="/agent.delete/'.$member->id.'" onclick="return confirm("Are you sure to delete this member?")">'.'<i class="fa fa-trash" style="color: black; font-size: 25px;"></i></a>
                    '.'
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <table>
                                <tr>
                                    <th>Email: </th>
                                    <td>'.$member->email.'</td>
                                </tr>
                                <tr>
                                    <th>Ic:</th>
                                    <td>'.$ic.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 1: </th>
                                    <td>'.$ban1.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 2: </th>
                                    <td>'.$ban2.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 3: </th>
                                    <td>'.$ban3.'</td>
                                </tr>
                                <tr>
                                    <th>Handphone Number: </th>
                                    <td>'.$hp.'</td>
                                </tr>
                                <tr>
                                    <th>Gender: </th>
                                    <td>'.$gender.'</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-around" >
                        '.'
                            <a href="/member.edit/'.$member->id.'" class="btn btn-info">'.'<i class="fa fa-pencil"></i></a>
                        '.'
                            <a href="/add-to-blacklist/'.$member->id.'" class="btn btn-danger">'.'<i class="fa fa-user-times"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <br>';
        }
        return response($output);
    }
}