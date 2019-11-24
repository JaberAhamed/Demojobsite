<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\jobseeker;

use Auth;

class JobseekerController extends Controller
{
    //

    public function updateuserprofile(Request $request)
    {
        # code...


        	# code...
    	$validatedData = $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1000',
            'resume' => 'mimes:doc,pdf,docx',
            'skills' => 'required|max:250',
            
            ]);
             $jobseeker=new jobseeker;
             $jobseeker->user_id=Auth::id();
            $jobseeker->skills=$request->skills;
    
            $image = $request->file('image');
            $resume = $request->file('resume');
    
            if($image){
                $uni_image_name=uniqid();
                $extention= $image->getClientOriginalExtension();
                $image_fullname = $uni_image_name.'.'.$extention;
                $path = "public/front/img/"; 
                $image_url=$path.$image_fullname;
                $imagemove=$image->move($path,$image_fullname);
                $jobseeker->image=$image_url;

                 if($resume){
                    $uni_file_name=uniqid();
                    $fileextention= $resume->getClientOriginalExtension();
                    $file_fullname = $uni_file_name.'.'.$fileextention;
                    $filepath = "public/files/uploads/"; 
                    $file_url=$filepath.$file_fullname;
                    $filemove=$resume->move($path,$file_fullname);
                    $jobseeker->resume=$file_url;

                    $jobseeker->save();
                    $notification = array(
                        'message' => 'profile uploaded successfully!',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                 }
                 else{

                    $jobseeker->save();
                    $notification = array(
                        'message' => 'profile uploaded successfully!',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);

                 }
                
                 
    
                  
            }
            else{
                   $jobseeker->save();
    
                    $notification = array(
                        'message' => 'Category inserted successfully!',
                        'alert-type' => 'success'
                    );
    
                    
            }
    
            return Redirect()->back()->with($notification);
    
           
    }
}
