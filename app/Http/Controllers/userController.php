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

        $users=User::where('status_id','=',1)->paginate(10);

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
          $storeUserData['status_id']            = 1;
          $storeUserData['role_id']              = 2;
          $storeUserData->save();

       }

       return redirect::to('/users');


    }

    public function edit($id){

     $userData=User::find($id);

     return view('manageUsers.editUser')->with('userData',$userData);
    }

    public function update(Request $request,$id)
    {
        $getUserInfo=$request::all();

//        $this->validate($getUserInfo,[
//            'name'       => 'required',
//            'Surname'    => 'required',
//            'email'      => 'required|email|unique:users,email'.$id,
//            'password'   => 'same:confirm-password'
//        ]);

        if(!empty($getUserInfo['password']))
        {
            $getUserInfo['password']=hash::make($getUserInfo['password']);
        }
            else{
                $getUserInfo=array_except($getUserInfo,array('password'));

            }

        $userData=User::find($id);

        $userData->name                   = $getUserInfo['name'];
        $userData->surname                = $getUserInfo['Surname'];
        $userData->Mobile_Number          = $getUserInfo['Mobile_Number'];
        $userData->email                  = $getUserInfo['email'];
        $userData->update($getUserInfo);



        return redirect::to('/users');
    }

    public function destroy($id){
        if(Auth::user()->id==$id)
        {
            return redirect()->back()->withErrors(array('Error'=>'Action Prevented, You cannot delete your own account'));
        }
        $specificuser=User::find($id);
        $specificuser['status_id']=2;
        $specificuser->update();

        return redirect::to('/users');
    }

   













}
