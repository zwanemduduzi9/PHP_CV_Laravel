@extends('layouts.app')
@section('content')
    <div class="row justify-content-center" >
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header"><h3><strong>Users</strong></h3></div>
                <div class="card-body">
                    <br>
{{--                    <div style="min-width: 100px; overflow-x:auto;">--}}
                        <table class="table">
                            <div>
                                <tr>
                                    <th>#</th>
                                    <th>Names</th>
                                    <th>Surname</th>
                                    <th>Mobile Number</th>
                                    <th>Email Address</th>
{{--                                    <th>Role</th>--}}
{{--                                    <th>Status</th>--}}
                                    <th>Action</th>
                                </tr>
                            </div>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->surname}}</td>
                                    <td>{{$user->Mobile_Number}}</td>
                                    <td>{{$user->email}}</td>
                                    <td data-toggle="#" data-target="#" onclick="">
                                        <div class="btn-group">
                                            @if(Auth::user()->id!=$user->id)
                                            <a id="confirmYes" class="btn btn-danger " href="{!! URL::action('userController@destroy',$user->id) !!}"  title="delete user"><i style="color: white" class="fa fa-ban"></i></a>
                                            &nbsp;
                                            <a class="btn btn-primary" href="" title="edit user"><i class="fa fa-edit"></i></a>
                                            @else
                                            <a class="btn btn-primary" href="" title="edit user"><i class="fa fa-edit"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
{{--                    </div>--}}
                </div>
                <div class="card-footer" >
                        <a class=""  href="/createUsers">
                            <button class="btn btn-info"><i class="fa fa-plus"></i> Create User</button>
                        </a>
                </div>
            </div>
        </div>
    </div>














@endsection
