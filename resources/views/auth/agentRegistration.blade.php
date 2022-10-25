
@extends('auth.layout')
@section('content')
<style>
    h3{
        color: black;
        text-align: center;
        margin-top: 10px;
    }
    label{
        color: black;
    }
</style>
<main class="register-form">
<div class="cotainer">
    <div class="card">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <h3>Create Agent</h3>
                <form action="{{ route('register.post') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="handphone_number" name="handphone_number" value="">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Full Name" id="name" name="name"  required autofocus>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control"placeholder="Email" id="email" name="email" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group" >
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password"  required autofocus>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="type" style="margin-bottom:5px;">Type:</label><br>
                        <input type="number" id="type" class="form-control" name="type"  value="2" min="2" max="2">
                        <p style="margin:1px;font-size:9px;">*2 = Agent</p>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label><br>
                        <input type="radio" id="gender" name="gender" name="gender" value="Male" style="vertical-align: middle; margin-bottom:2px;">
                        <label for="Male" style="font-size:14px;">Male</label>&nbsp
                        <input type="radio" id="gender" name="gender"name="gender" value="Female" style="vertical-align: middle;margin-bottom:2px;margin-left:5px;">
                        <label for="femela" style="font-size:14px;">Female</label>
                    </div>

                    <div style="text-align:right;"><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button class="btn btn-primary" onclick="history.back()">Cancel</button>
                    </div>
                    <br>
                    <br>
                </form>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</div>
</main>
@endsection 