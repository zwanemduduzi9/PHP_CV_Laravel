@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12">
                {{--                <div class="card">--}}
                <div class="card-header"><h3>Edit Users</h3></div>

                <div class="card-body">
                    <form method="POST" action="{!! URL::action('userController@update',$userData->id) !!}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label for="name" class="control-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $userData->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="control-label">{{ __('Surname') }}</label>
                                <input id="Surname" type="text" class="form-control @error('Surname') is-invalid @enderror" name="Surname" value="{{$userData->surname}}" required autocomplete="name" autofocus>

                                @error('Surname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$userData->email}}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="control-label">{{ __('Mobile Number') }}</label>
                                <input id="name" type="number" class="form-control @error('Mobile_Number') is-invalid @enderror" name="Mobile_Number" value="{{$userData->Mobile_Number}}" required autocomplete="name" autofocus>

                                @error('Mobile_Number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="control-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <a class=" btn-block btn-group" style="margin-top: 20px;" >
                                        <button class="btn btn-success" style="width: 100%; color:white" type="submit" ><i class="fa fa-plus"></i> Create User</button>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class=" btn-block btn-group" style="margin-top: 20px;"href="/users/">
                                        <div class="btn btn-danger" style="width: 100%;color:white" type="" ><i class="fa fa-times"></i> Cancel</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">

                </div>
                {{--                </div>--}}
            </div>
        </div>
    </div>




















@endsection
