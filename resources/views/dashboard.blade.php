@extends('layout')
@include('sidenav')
@section('content')
<style>
    .listNav{
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <br>
                <h4 class="page-title">Dashboard</h4>
                <br>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="listNav title">
                <h3>Agent List</h3>
                <div class="listNav-right">
                    <a href="/agent-registration"><i class="fa fa-solid fa-plus"></i></a>
                </div>
            </div>
            <div class="table">
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agents as $agent)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$agent->name}}</td>
                            <td><button></button></td>
                            <td><a href="{{ route('agent.edit',['id'=>$agent->id]) }}" class="btn btn-warning btn-xs">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="listNav title">
                <h3>Member List</h3>
                <div class="listNav-right">
                    <a href="/user-registration"><i class="fa fa-solid fa-plus"></i></a>
                </div>
            </div>
            <div class="table">
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$member->name}}</td>
                            <td><button></button></td>
                            <td><a href="{{ route('member.edit',['id'=>$member->id]) }}" class="btn btn-warning btn-xs">Edit</a>&nbsp;<a href=" {{ route('add.to.blacklist',['id'=>$member->id]) }}" class="btn btn-dark btn-xs">Add to Blacklist</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection