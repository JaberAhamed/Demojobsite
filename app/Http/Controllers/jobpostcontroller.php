<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\jobpost;
use Auth;

class jobpostcontroller extends Controller
{
    public function jobpostindex()
    {
        # code...

        return view('companylayouts.jobpostview');
    }


    public function jobpostInfoStore(Request $request)
    {
        # code...

        $validatedData = $request->validate([
            'job_title' => 'required|max:250',
            'job_description' => 'required|max:450',
            'salery' => 'required|max:40',
            'location' => 'required|max:80',
            'country' => 'required|max:50',
           
            ]);
    
            if($validatedData){
                $jobpost=new jobpost;

                $jobpost->company_id=Auth::guard('company')->id();
                $jobpost->job_title=$request->job_title;
                $jobpost->job_description=$request->job_description;
                $jobpost->salery=$request->salery;
                $jobpost->location=$request->location;
                $jobpost->country=$request->country;
               
    
                $jobpost->save();
                
                if($jobpost){
                    $notification = array(
                        'message' => ' JobPost info inserted successfully!',
                        'alert-type' => 'success'
                    );
    
                  //  return Redirect()->route('companyloginview')->with($notification);

                  return response()->json('inserted');
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


}
