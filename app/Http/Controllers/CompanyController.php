<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Company;
use Hash;
use Auth;

class CompanyController extends Controller
{
    //

    public function companyRegisterindex()
    {
        # code...

        return view('companylayouts.companyregisterview');
    }

    public function companyLogInindex()
    {
        # code...
        
        return view('companylayouts.companyloginview');
        
    }


    public function companyDashbord()
    {
        # code...
        
        if(Auth::guard('company')->check() ){
            return view('companylayouts.companydashbordview');
        }
        else{
            return Redirect()->route('companyloginview');
        }
          
      
    }

    public function companyInfoStore(Request $request)
    {
        # code...

        $validatedData = $request->validate([
            'first_name' => 'required|max:250',
            'last_name' => 'required|max:250',
            'company_name' => 'required|max:250',
            'email' => 'required|max:80',
            'password' => 'required|max:50',
           
            ]);
    
            if($validatedData){
                $company=new Company;
                $company->first_name=$request->first_name;
                $company->last_name=$request->last_name;
                $company->company_name=$request->company_name;
                $company->email=$request->email;
                $company->password=Hash::make($request->password);
               
    
                $company->save();
                
                if($company){
                    $notification = array(
                        'message' => 'Company info inserted successfully!',
                        'alert-type' => 'success'
                    );
    
                    return Redirect()->route('companyloginview')->with($notification);
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

    public function companylogin(Request $request)
    {
        # code...

        $validatedData = $request->validate([
            'email' => 'required|max:80',
            'password' => 'required|max:50',
           
            ]);
    
            if($validatedData){
                $company=new Company;
              
                $company->email=$request->email;
             
               
    
                $company = Company::where('email', '=', $request->email)->first();
               
              

                if ($company)
                {
                    if(!Hash::check($request->password, $company->password))
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
                    
                        Auth::guard('company')->login($company);
                     
        
                        return Redirect()->route('dashbord')->with($notification);
                       
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

    public function logout()
    {
        # code...
        Auth::guard('company')->logout();
        return Redirect()->route('companyloginview');
    }


   
}
