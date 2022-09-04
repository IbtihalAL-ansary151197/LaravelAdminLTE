<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
 
class AdminAuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }
 
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //  dd($request->all(),\App\Models\Admin::where('email', $request->email)->first() );
        //  // 1 find admin if exists by email
        //  $user = \App\Models\Admin::where('email', $request->email)->first();
        //  if($user){
        //     //2 check if password coreccte
        //     if(Hash::check($request->password ,$user->password ) && $user->is_admin){
        //         // login successflly
        //         Auth::guard('admin')->login($user);

        //     }else{
        //         // password incorrect
        //     }
        //  }else{
        //     //error
        //  }
 
        if(auth()->guard('admin')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            $user = auth()->guard('admin')->user();
        
            if($user->is_admin == 1){
                return redirect()->route('adminDashboard')->with('success','You are Logged in sucessfully.');
            }
            else{
                auth()->guard('admin')->logout();
                return back()->with('error','Whoops');
            }
        }else {
            return back()->with('error','Whoops! invalid email and password.');
        }
    }
 
    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect(route('adminLogin'));
    }
}
