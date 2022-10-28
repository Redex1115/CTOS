@extends('auth.layout')
@section('content')

<link href="{{ asset('css/home.css') }}" rel="stylesheet">

<title>CTOS</title>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- Nav -->
            <div class="bs-example">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="nav-item">
                        <a href="#sectionA" class="nav-link active" data-toggle="tab"><i class="fa fa-user-secret" style="color: black;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#sectionB" class="nav-link" data-toggle="tab"><i class="fa fa-group" style="color: black;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="#sectionC" class="nav-link" data-toggle="tab"><i class="fa fa-ban" style="color: black;"></i></a>
                    </li>
                </ul>
            </div>
            <!-- Nav Content -->
            <div class="tab-content">
                <div id="sectionA" class="tab-pane fade show active">
                    <br>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            @foreach($agents as $agent)
                                <div class="card">
                                    <div class="card-header">
                                        {{$agent->username}}
                                        <div>
                                            <a href="{{ route('agent.delete',['id'=>$agent->id]) }}" onclick="return confirm('Are you sure to delete this agent?')"><i class="fa fa-trash" style="color: black; font-size: 25px;"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <table>
                                                    <tr>
                                                        <th>Email: </th>
                                                        @if($agent->email == null)
                                                            <td> N/A </td>
                                                        @elseif($agent->email !== null)
                                                            <td>{{ $agent->email }}</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th>Ic:</th>
                                                        @if($agent->ic == null)
                                                            <td> N/A </td>
                                                        @elseif($agent->ic !== null)
                                                            <td>{{ $agent->ic }}</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th>Bank Account Number 1: </th>
                                                        @if($agent->bank_account_number1 == null)
                                                            <td> N/A </td>
                                                        @elseif($agent->bank_account_number1 !== null)
                                                            <td>{{ $agent->bank_account_number1 }}</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th>Bank Account Number 2: </th>
                                                        @if($agent->bank_account_number2 == null)
                                                            <td> N/A </td>
                                                        @elseif($agent->bank_account_number2 !== null)
                                                            <td>{{ $agent->bank_account_number2 }}</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th>Bank Account Number 3: </th>
                                                        @if($agent->bank_account_number3 == null)
                                                            <td> N/A </td>
                                                        @elseif($agent->bank_account_number3 !== null)
                                                            <td>{{ $agent->bank_account_number3 }}</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th>Handphone Number: </th>
                                                        @if($agent->handphone_number == null)
                                                            <td> N/A </td>
                                                        @elseif($agent->handphone_number !== null)
                                                            <td>{{ $agent->handphone_number }}</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th>Gender: </th>
                                                        @if($agent->gender == null)
                                                            <td> N/A </td>
                                                        @elseif($agent->gender !== null)
                                                            <td>{{ $agent->gender }}</td>
                                                        @endif
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-12 d-flex justify-content-around" >
                                                <a href="{{ route('agent.edit',['id'=>$agent->id]) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                                <a href="" class="btn btn-danger"><i class="fa fa-user-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        </div>
                        <div class="page">
                            {{$agents->links("pagination::bootstrap-4")}} 
                        </div> 
                        <div class="col-1"></div>
                    </div>
                </div>
                <div id="sectionB" class="tab-pane show">
                    <br>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            @foreach($members as $member)
                            <div class="card">
                                <div class="card-header">
                                    {{$member->username}}
                                    <div>
                                        <a href="{{ route('agent.delete',['id'=>$member->id]) }}" onclick="return confirm('Are you sure to delete this agent?')"><i class="fa fa-trash" style="color: black; font-size: 25px;"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <table>
                                                <tr>
                                                    <th>Email: </th>
                                                    @if($member->email == null)
                                                        <td> N/A </td>
                                                    @elseif($member->email !== null)
                                                        <td>{{ $member->email }}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>Ic:</th>
                                                    @if($member->ic == null)
                                                        <td> N/A </td>
                                                    @elseif($member->ic !== null)
                                                        <td>{{ $member->ic }}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>Bank Account Number 1: </th>
                                                    @if($member->bank_account_number1 == null)
                                                        <td> N/A </td>
                                                    @elseif($member->bank_account_number1 !== null)
                                                        <td>{{ $member->bank_account_number1 }}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>Bank Account Number 2: </th>
                                                    @if($member->bank_account_number2 == null)
                                                        <td> N/A </td>
                                                    @elseif($member->bank_account_number2 !== null)
                                                        <td>{{ $member->bank_account_number2 }}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>Bank Account Number 3: </th>
                                                    @if($member->bank_account_number3 == null)
                                                        <td> N/A </td>
                                                    @elseif($member->bank_account_number3 !== null)
                                                        <td>{{ $member->bank_account_number3 }}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>Handphone Number: </th>
                                                    @if($member->handphone_number == null)
                                                        <td> N/A </td>
                                                    @elseif($member->handphone_number !== null)
                                                        <td>{{ $member->handphone_number }}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>Gender: </th>
                                                    @if($member->gender == null)
                                                        <td> N/A </td>
                                                    @elseif($member->gender !== null)
                                                        <td>{{ $member->gender }}</td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12 d-flex justify-content-around">
                                            <a href="{{ route('member.edit',['id'=>$member->id]) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                            <a href="" class="btn btn-danger"><i class="fa fa-user-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            @endforeach
                        </div>
                        <div class="page" style="padding-left: 410px">
                            {{$members->links("pagination::bootstrap-4")}} 
                        </div> 
                        <div class="col-1"></div>
                    </div>
                </div>
                <div id="sectionC" class="tab-pane">
                    <br>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            @foreach($blacklists as $blacklist)
                                <div class="card">
                                    <div class="card-header">
                                        {{$blacklist->name}}
                                        <a href="{{ route('agent.delete',['id'=>$member->id]) }}" onclick="return confirm('Are you sure to delete this agent?')"><i class="fa fa-unlock" style="color: black; font-size: 25px;"></i></a>
                                    </div>
                                    <div class="card-body">
                                        <h3>Reason: </h3>
                                        <p>{{$blacklist->reason}}</p>
                                    </div>
                                    <div class="card-body">
                                        <h3>Remark: </h3>
                                        <p>{{$blacklist->remark}}</p>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

@section('script')

<script>
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
    });
</script>

@endsection

@endsection