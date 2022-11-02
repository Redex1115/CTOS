@extends('auth.layout')
@section('content')

<style>
    .card{
        margin: 10px 10px 10px 10px;
    }
</style>

<div class="card">
    <div class="card-header">
        <h3>Update Profile</h3>
    </div>
    <div class="card-body">
        @foreach($users as $user)
            <form action="{{ route('profile.update',['id'=>$user->id])  }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" class="form-control" placeholder="Enter Your Full Name" id="name" name="name"  value="{{$user->name}}"  required autofocus>
                </div>

                <div class="form-group" style="margin-top:20px;">
                    <label for="username">User Name :</label>
                    <input type="text" class="form-control" placeholder="Enter Your User Name" id="username" name="username"  value="{{$user->username}}"  required autofocus>
                </div>

                <div class="form-group"  style="margin-top:20px;">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email"  id="email" name="email"  value="{{$user->email}}" required autofocus>
                </div>

                <div class="form-group" style="margin-top:20px;">
                    <label for="contactNumber">Phone Number :</label>
                    <input type="tel" class="form-control" placeholder="Enter Your Contact Number" id="handphone_number" name="handphone_number" pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}"  value="{{$user->handphone_number}}" required autofocus>
                    <p style="margin:1px;font-size:9px;">*Format: 123-4567890</p>
                </div> 

                <div class="form-group" style="margin-top:20px;">
                    <label for="ic">IC Number :</label>
                    <input type="text" class="form-control" placeholder="IC eg. 991114-07-7777" id="ic" name="ic" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}"  value="{{$user->ic}}" required autofocus>
                </div> 

                <div class="form-group" style="margin-top:20px;">
                    <label for="bank_account_number1">Bank Account No.1 :</label>
                    <input type="text" class="form-control" placeholder="Enter Your Bank Account Number" id="bank_account_number1" name="bank_account_number1"  value="{{$user->bank_account_number1}}"  required autofocus>
                </div>
            
                <div class="form-group" style="margin-top:20px;">
                    <label for="bank_account_number2">Bank Account No.2 :</label>
                    <input type="text" class="form-control" placeholder="Enter Your Bank Account Number"
                    id="bank_account_number2" name="bank_account_number2"  value="{{$user->bank_account_number2}}">

                </div>

                <div class="form-group" style="margin-top:20px;">
                    <label for="bank_account_number3">Bank Account No.3 :</label>
                    <input type="text" class="form-control" placeholder="Enter Your Bank Account Number" id="bank_account_number3" name="bank_account_number3"  value="{{$user->bank_account_number3}}">
                </div>

                <div class="form-group"   style="margin-top:20px;">
                    <label for="gender">Gender :</label><br>
                    <input type="radio" id="male" name="gender" style="vertical-align: middle; margin-bottom:2px;"  value="Male" required >
                    <label for="Male" style="font-size:14px;">Male</label>&nbsp;
                    <input type="radio" id="female" name="gender" style="vertical-align: middle;margin-bottom:2px;margin-left:5px;"  value="Female"required>
                    <label for="female" style="font-size:14px;">Female</label>
                </div>

                <div class="form-group float-right">
                    <button  type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        @endforeach
    </div>
</div>

@endsection