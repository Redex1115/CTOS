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
            <form method="POST" action="{{ route('passwordUpdate') }}">
                @csrf
                <input type="hidden" value="{{Auth()->user()->id}}" name="userID" id="userID" class="form-control">
                <div class="form-group">
                    <label>Please Enter The New Password :</label>
                    <input type="password" name="password">
                </div>

                <div class="form-group">
                    <label>Confirm Your New Password :</label>
                    <input type="password" name="confirmPassword">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" onClick="return confirm('Are you sure to change your password?')">Submit</button>
            </form>
        @endforeach
    </div>
</div>

@endsection