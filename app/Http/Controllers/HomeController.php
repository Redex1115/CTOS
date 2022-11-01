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
                                    <td> N/A </td>
                                    <td>'.$agent->email.'</td>
                                </tr>
                                <tr>
                                    <th>Ic:</th>
                                    <td> N/A </td>
                                    <td>'.$agent->ic.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 1: </th>
                                    <td> N/A </td>
                                    <td>'.$agent->bank_account_number1.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 2: </th>
                                    <td> N/A </td>
                                    <td>'.$agent->bank_account_number2.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 3: </th>
                                    <td> N/A </td>
                                    <td>'.$agent->bank_account_number3.'</td>
                                </tr>
                                <tr>
                                    <th>Handphone Number: </th>
                                    <td> N/A </td>
                                    <td>'.$agent->handphone_number.'</td>
                                </tr>
                                <tr>
                                    <th>Gender: </th>
                                    <td> N/A </td>
                                    <td>'.$agent->gender.'</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-around" >
                        '.'
                            <a href="/agent.edit/'.$agent->id.'" class="btn btn-info">'.'<i class="fa fa-pencil"></i></a>
                        '.'
                            <a href="" class="btn btn-danger">'.'<i class="fa fa-user-times"></i></a>
                        '.'
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
                                    <td> N/A </td>
                                    <td>'.$member->email.'</td>
                                </tr>
                                <tr>
                                    <th>Ic:</th>
                                    <td> N/A </td>
                                    <td>'.$member->ic.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 1: </th>
                                    <td> N/A </td>
                                    <td>'.$member->bank_account_number1.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 2: </th>
                                    <td> N/A </td>
                                    <td>'.$member->bank_account_number2.'</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Number 3: </th>
                                    <td> N/A </td>
                                    <td>'.$member->bank_account_number3.'</td>
                                </tr>
                                <tr>
                                    <th>Handphone Number: </th>
                                    <td> N/A </td>
                                    <td>'.$member->handphone_number.'</td>
                                </tr>
                                <tr>
                                    <th>Gender: </th>
                                    <td> N/A </td>
                                    <td>'.$member->gender.'</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12 d-flex justify-content-around" >
                        '.'
                            <a href="/member.edit/'.$member->id.'" class="btn btn-info">'.'<i class="fa fa-pencil"></i></a>
                        '.'
                            <a href="" class="btn btn-danger">'.'<i class="fa fa-user-times"></i></a>
                        '.'
                        </div>
                    </div>
                </div>
            </div>
            <br>';
        }
        return response($output);
    }
}