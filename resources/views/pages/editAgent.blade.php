@extends('auth.layout')
@section('content')

<div class="container">
    <h2>Update Agent</h2><br>
    <div class="row">
        <div class="col-12">
            @foreach($users as $user)
            <form method="POST" action="{{ route('user.update',['id'=>$user->id]) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Full Name" id="name" name="name"  value="{{$user->name}}"  required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control"placeholder="Email" id="email" name="email"  value="{{$user->email}}" required autofocus>
                </div>
                    
                <div class="form-group">
                    <label for="gender">Gender:</label><br>
                    <input type="radio" id="male" name="gender" style="vertical-align: middle; margin-bottom:2px;"  value="Male" required >
                    <label for="Male" style="font-size:14px;">Male</label>&nbsp
                    <input type="radio" id="female" name="gender" style="vertical-align: middle;margin-bottom:2px;margin-left:5px;"  value="Female"required>
                    <label for="female" style="font-size:14px;">Female</label>
                </div>

                <div class="form-group">
                    <label for="ic">IC Number:</label>
                    <input type="text" class="form-control" placeholder="IC eg. 991114-07-7777" id="ic" name="ic" pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}"  value="{{$user->ic}}" required autofocus>
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control" id="bank_account_number" name="bank_account_number"  value="{{$user->bank_account_number}}" required autofocus>
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control"  id="bank_company" name="bank_company"   value="{{$user->bank_company}}" required autofocus>
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control" id="status" name="status" required autofocus>
                    <!-- <p style="margin:1px;font-size:9px;">*No Score, Poor, Low, Fair, Good, Very Good, &nbspExcellent</p>-->
                </div>
                    
                <div class="form-group">
                    <label for="contactNumber">Contact Number:</label>
                    <input type="tel" class="form-control" placeholder="Contact Number" id="handphone_number" name="handphone_number" pattern="[0-9]{3}-[0-9]{7}|[0-9]{3}-[0-9]{8}"  value="{{$user->handphone_number}}" required autofocus>
                    <p style="margin:1px;font-size:12px;">*Format: 123-4567890</p>
                </div> 

                <div class="form-group">
                    <label for="type" style="margin-bottom:5px;">Type:</label><br>
                    <input type="number" id="type" class="form-control" name="type"  value="2" min="2" max="2">
                    <p style="margin:1px;font-size:12px;">*2 = Agent</p>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="{{$user->password}}" required autofocus>
                </div>

                <div class="form-group" style="text-align:right;"><br>
                    <button  type="submit" class="btn btn-primary">Submit</button>
                    <button type="Submit" class="btn btn-primary" onclick="history.back()">Cancel</button>
                </div>
                <br>
                <br>
            </form>
            @endforeach
        </div>
    </div>
</div>


@endsection