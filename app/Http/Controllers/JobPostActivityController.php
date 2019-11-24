<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\jobPostActivity;
use App\jobseeker;
use App\jobpost;
use Auth;

class JobPostActivityController extends Controller
{
    //

    public function jobpostforUser_Company($id)
    {
        # code...


        $jobPostActivity=new jobPostActivity;

        
        
        
        $userseekid=Auth::id();

        $userprofile = jobseeker::findorfail($userseekid);

        if( $userprofile->resume){
            $jobPostActivity->user_id=$userseekid;
            $jobPostActivity->post_id=$id;
            $jobPostActivity->save();
            
            $notification = array(
                'message' => 'Apply Submit SuccessFully',
                'alert-type' => 'success'
            );

            return Redirect()->back()->with($notification);

        }
        else{

            $notification = array(
                'message' => 'Plese upload your resume',
                'alert-type' => 'success'
            );

            
    

          return Redirect()->route('userprofile')->with($notification);
        }

      

      


    }


    public function allapplicant()
    {
        $alljobpostapplicant =  jobPostActivity::all();
      
     return view('companylayouts.allapplicantview',compact('alljobpostapplicant'));

    
    }
    
}
