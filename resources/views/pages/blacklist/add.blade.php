@extends('auth.layout')
@section('content')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    .card{
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .card-header{
        padding: 5px 0 5px 0; 
        margin: 0;
        background: #916ad3;
        color: #491e95;
        
    }

    .input input, span button{
        border-radius: 0 !important;
    }

    th, td{
        border: 1px solid black !important;
    }

    tr input[type=text]{
        border: 0;
        outline: none;
    }
</style>

<div class="container">
    <div class="card" style="margin-top: 10px;">
        <div class="card-header">
            <h4 class="text-center">Add User To Blacklist</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('blacklist.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">User Name</label>
                    <div class="input d-flex">
                        <input type="text" value="{{$user -> name}}" name="name" id="name" placeholder="{{$user->name}}" class="form-control" readonly>
                        <span>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#infoModal">Info</button>
                        </span>
                    </div>
                </div>
                <!-- Info -->
                <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="infoModalLabel">{{$user -> name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <table style="width:100%;">
                                            <tr>
                                                <th>Email: </th>
                                                <td>{{$user -> email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Ic: </th>
                                                @if($user -> ic == null)
                                                    <td>N/A</td>
                                                @elseif($user -> ic !== null)
                                                    <td>{{$user -> ic}}</td>
                                                    <input type="hidden" value="{{$user -> ic}}" name="ic" id="ic" class="form-control">
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Handphone No: </th>
                                                @if($user -> handphone_number == null)
                                                    <td><input type="text" placeholder="N/A" name="handphone_number" id="handphone_number" class="form-control"></td>
                                                @elseif($user -> handphone_number !== null)
                                                    <td>{{$user -> handphone_number}}</td>
                                                    <input type="hidden" value="{{$user -> handphone_number}}" name="handphone_number" id="handphone_number" class="form-control">
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Gender: </th>
                                                @if($user -> gender == null)
                                                    <td><input type="text" placeholder="N/A" name="gender" id="gender" class="form-control"></td>
                                                @elseif($user -> gender !== null)
                                                    <td>{{$user -> gender}}</td>
                                                    <input type="hidden" value="{{$user -> gender}}" name="gender" id="gender" class="form-control">
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <table>
                                            <tr>
                                                <th>Bank Account No: </th>
                                                @if($user -> bank_account_number1 == null)
                                                    <td><input type="text" placeholder="N/A" name="bank_account_number1" id="bank_account_number1" class="form-control"></td>
                                                @elseif($user -> bank_account_number1 !== null)
                                                    <td>{{$user -> bank_account_number1}}</td>
                                                    <input type="hidden" value="{{$user -> bank_account_number1}}" name="bank_account_number1" id="bank_account_number1" class="form-control">
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Bank Account No: </th>
                                                @if($user -> bank_account_number2 == null)
                                                    <td><input type="text" placeholder="N/A" name="bank_account_number2" id="bank_account_number2" class="form-control"></td>
                                                @elseif($user -> bank_account_number2 !== null)
                                                    <td>{{$user -> bank_account_number2}}</td>
                                                    <input type="hidden" value="{{$user -> bank_account_number2}}" name="bank_account_number2" id="bank_account_number2" class="form-control">
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Bank Account No: </th>
                                                @if($user -> bank_account_number3 == null)
                                                    <td><input type="text" placeholder="N/A" name="bank_account_number3" id="bank_account_number3" class="form-control"></td>
                                                @elseif($user -> bank_account_number3 !== null)
                                                    <td>{{$user -> bank_account_number3}}</td>
                                                    <input type="hidden" value="{{$user -> bank_account_number3}}" name="bank_account_number3" id="bank_account_number3" class="form-control">
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reason">Reason</label>
                    <textarea name="reason" id="reason" cols="30" rows="10" class="form-control"></textarea>
                    @if ($errors->has('reason'))
                        <span class="text-danger">{{ $errors->first('reason') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="remark">Remark</label>
                    <input type="text" name="remark" id="remark" class="form-control">
                </div>
                <div class="form-group">
                    <input type="hidden" name="social_media_account" id="social_medial_account" class="form-control">
                    <input type="hidden" value="{{$user -> email}}" name="email" id="email" class="form-control">
                    <input type="hidden" value="{{Auth::user()->id}}" name="created_by" id="created_by" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary float-right" onclick="return confirm('Are you sure to add this user to blacklist?')">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    function popup(){
        var info = 
    }
</script>

@endsection