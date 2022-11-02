@extends('auth.layout')
@section('content')

<style>
    .card{
        margin: 10px 10px 20px 10px;
        font-size: 18px;
    }

    h3{
        background-color: #916ad3;
        color: #491e95;
        text-align: center;
    }

    table{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    th{
        padding: 10px 10px;
    }

    td{
       text-align: right;
       padding: 10px 10px;
    }

    .function{
        display: flex;
        justify-content: space-around;
        margin: 10px 0 10px 0;
    }

</style>

<div class="row">
    <div class="col-12">  
        <div class="card">
        @csrf
            <h3>Profile</h3>
            @foreach($users as $user)
                <div class="row">
                    <div class="col-12">
                        <table>
                            <tr>
                                <th>Name : </th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>User Name: </th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>{{ $user->email }}</td>
                            </tr>       
                            <tr>
                                <th>Phone Number: </th>
                                <td>{{ $user->handphone_number }}</td>
                            </tr>                       
                            <tr>
                                <th>IC Number : </th>
                                <td>{{ $user->ic }}</td>
                            </tr>                       
                            <tr>
                                <th>Bank Account No.1 : </th>
                                <td>{{ $user->bank_account_number1 }}</td>
                            </tr>                         
                            <tr>
                                <th>Bank Account No.2 : </th>
                                <td>{{ $user->bank_account_number2 }}</td>
                            </tr>
                            <tr>
                                <th>Bank Account No.3 : </th>
                                <td>{{ $user->bank_account_number3 }}</td>
                            </tr>
                            <tr>
                                <th>Gender : </th>
                                <td>{{ $user->gender}}</td>
                            </tr>
                        </table>
                        <div class="function">
                            <a href="{{ route('profile.edit')}}" class="btn btn-warning">Edit Profile</a>
                            <a href="{{ route('password.change')}}" class="btn btn-danger">Change Password</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>   
    </div>
</div>

@endsection