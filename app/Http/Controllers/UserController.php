<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    //

    public function userRegisterIndex()
    {
      
        return view('userlayouts.user_register_view');
    }

    public function userlogout()
    {
        Auth::logout();
        return Redirect()->route('userloginview');
    }

    public function userloginindex()
    {
        # code...
        return view('userlayouts.userloginindex');

    }
    public function userprofile()
    {
        return view('userlayouts.userprofile');
    }

    public function userInfoStore(Request $request)
    {
        # code...

        $validatedData = $request->validate([
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200',
            'email' => 'required|max:80',
            'password' => 'required|max:50',
           
            ]);
    
            if($validatedData){
                $user=new User;
                $user->first_name=$request->first_name;
                $user->last_name=$request->last_name;
                $user->email=$request->email;
                $user->password=Hash::make($request->password);
               
    
                $user->save();
                
                if($user){
                    $notification = array(
                        'message' => 'user info inserted successfully!',
                        'alert-type' => 'success'
                    );
    
                    return Redirect()->route('userloginview')->with($notification);
           }
            else{
                    $notification = array(
                            'message' => 'Something is worng',
                            'alert-type' => 'error'
                        );
    
                        return Redirect()->back()->with($notification);
    
            }
            }
            else{
                return response()->json('not validate');

            }
    }


    public function userLogin(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|max:80',
            'password' => 'required|max:50',
           
            ]);
    
            if($validatedData){
                $user=new User;
              
                $user->email=$request->email;
             
               
    
                $user = User::where('email', '=', $request->email)->first();
               
              

                if ($user)
                {
                    if(!Hash::check($request->password, $user->password))
                    {
                        $notification = array(
                            'message' => 'Password not match is worng',
                            'alert-type' => 'error'
                        );

    
                        return Redirect()->back()->with($notification);
                    }
                    else{
                        $notification = array(
                            'message' => 'LogIn successfully!',
                            'alert-type' => 'success'
                        );
                    
                       Auth::login($user);
                     
        
                        return Redirect()->route('userprofile')->with($notification);
                       
                    }
                  
                }   
                else 
                {
                    $notification = array(
                        'message' => 'Something is worng',
                        'alert-type' => 'error'
                    );

                    return Redirect()->back()->with($notification);
                }
                
               
            }
            else{
                $notification = array(
                    'message' => 'Something is worng',
                    'alert-type' => 'error'
                );

                return Redirect()->back()->with($notification);

            }
       
    }

  
}
