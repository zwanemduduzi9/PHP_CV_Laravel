<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class userController extends Controller
{
    public function index(){

        $users=User::all();

        return view('manageUsers/users',compact('users'));
    }

    public function create(){


       return view('manageUsers.createUsers');
    }

    public function store(Request $request){

       $userData=$request::all();

       $rules=array(
           'name'=>'required',
           'Surname'=>'required',
           'email'=>'required',
           'password'=>'required'

       );
       $validator=Validator::make($userData,$rules);

       if($validator->passes()){

          $storeUserData=new User();

          $storeUserData->name                   = $userData['name'];
          $storeUserData->surname                = $userData['Surname'];
          $storeUserData->Mobile_Number          = $userData['Mobile_Number'];
          $storeUserData->email                  = $userData['email'];
          $storeUserData->password               = Hash::make($userData["password"]);
          $storeUserData->save();

       }

       return redirect::to('/users');


    }

    public function edit(){


    }

    public function update()
    {


    }

    public function destroy($id){
        if(Auth::user()->id==$id)
        {
            return redirect()->back()->withErrors(array('Error'=>'Action Prevented, You cannot delete your own account'));
        }
        $specificuser=User::find($id);
        $specificuser->Delete();

        return redirect::to('/users');
    }















}
