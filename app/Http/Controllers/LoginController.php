<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
       $user =  User::where('email',$credentials['email'])->where('password',$credentials['password'])->first();
       if(!!$user){
           auth()->login($user);
           session()->flash("login",true);
           return redirect()->route('admin.index')->with("success","Login Successfully");
       }
       else
           return redirect()->route('login')->with('error','Your Credentials is Invalid');
    }

    public  function Login(){
        return view("front.login");
    }

    public function register(){
        return view("front.register");
    }

    public function create(Request $request){
        $data = $request->all();
        $user = new User([
            'email' =>$data["email"],
            'mobile' =>$data["mobile"],
            'password' =>$data["password"],
            'name' =>$data["name"],
            ]
        );
        $user->save();
        return redirect()->route("app")->with("success","User Created successfully you can login With your credentials");
    }

    public function logout(){
        auth()->logout();
        return redirect()->route("app")->with("success","Successfully logout");
    }
}
