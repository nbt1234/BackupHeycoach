<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserModel;
use App\Models\MygoalsModel;
use App\Models\MyFocusgoalsModel;
use App\Models\AllCountriesModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\frontuser;

use File;
use Mail;
use App\Mail\UserRegistration;
use App\Mail\FridayNotification;
use App\Mail\IncompletegoalNotification;

use URL;


class UserController extends Controller
{
    //
    public function Signupviewpage(){
        $all_countries = AllCountriesModel::All();
        return view( 'frontend/signup',compact('all_countries'));
    }

    public function insert_users(Request $request){

        $formdata = $request->all();
        //dd($formdata); 

        $user = new UserModel;
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->plain_password = $request->password;
        $user->country = $request->country;
        $user->terms = $request->terms;
        $user->save();
        //Last inserted ID
        if($user->id > 0){

            $credentials = $request->validate([            
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if (Auth::guard('frontuser')->attempt($credentials)) {
                
                    $request->session()->regenerate();    

                    ////Send Mail to Register User Email////      
                    Mail::to($formdata['email'])->send(new UserRegistration($formdata));                
                    return redirect()->route('overview')->with('flash-success', 'You are successfully registered.');
            }            


        } else{
            return back()->with('flash-error', 'Something went wrong.');
        }
    }

    public function check_email_existance(Request $request){


        $formdata = $request->all();
        //dd($formdata['useremail']);
        if ($request['existance_type'] == 'uemail'){ 
            // echo $request['useremail'];
            $checkuser = UserModel::where('email', '=', $request['useremail'])->count(); 
            //dd($checkuser); 
            if($checkuser == 0){
                echo 'true';    //Good To Register
            } else {
                echo 'false';    //Already Register
            }
        }

    }

    public function usersignin(Request $request){

        $formdata = $request->all();
        //dd($formdata); 
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::guard('frontuser')->attempt($credentials)) {
            $request->session()->regenerate();    
            
            $user_id = Auth::guard('frontuser')->user()->id;   //dd($user_id);

            ////Check if user fill the step1 already or noting 
            $get_user_cat = MyFocusgoalsModel::where('user_id', $user_id)->where('goal_status', 'incomplete')->first();
            $get_all_cats = MygoalsModel::where('user_id', $user_id)->where('status', 'incomplete')->first();
            //dd($get_user_cat['current_step']);
            if($get_user_cat){
                return redirect('/'.$get_user_cat['current_step']);
            } else if($get_all_cats){ 
                return redirect('/step2');
            } else {
                return redirect('/step1');
                // return redirect()->route('overview');
            }
            
        }       
        return back()->withErrors(['email' => 'Login details are not valid']);

    }

    public function user_logout() {
        
        Auth::guard('frontuser')->logout();  
        return Redirect('/signin');
    }


    public function my_profile_view(){

        $currentuser = Auth::guard('frontuser')->user()->id;   
        $get_details = UserModel::find($currentuser);
        $all_countries = AllCountriesModel::All();
        return view( 'frontend/my-profile',compact('get_details', 'all_countries'));
    }


    public function storeuserImage(Request $request)
    {

        $currentuser = Auth::guard('frontuser')->user()->id; 
        $file = $request->file('image');
        //dd($file);
        
        $request->validate([
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);  
                
        //Get uploaded file information
        if ($request->file('image')) {
            
            $originalname = $request->file('image')->getClientOriginalName(); 
            //dd($originalname);     
            $fileextension = $request->file('image')->extension();   
            //dd($fileextension);
            $filenewname = 'user_'.$currentuser.'.'.$fileextension;
            //$path = $request->file('image')->storeAs('profile_img', $originalname);

            //Create directory if not exist
            // $path = public_path('/front-assets/img/profile_img/'.'user_'.$currentuser);
            // if(!File::isDirectory($path)){
            //     File::makeDirectory($path, 0777, true, true);
            // }
            $path = public_path('/front-assets/img/profile_img/');
            $destinationPath = public_path().'/front-assets/img/profile_img';
            $path = $request->file('image')->move($path,$filenewname);
                  
        }
       
        $UserModel = UserModel::find($currentuser);   
        $UserModel->pro_img = $filenewname;        
        $UserModel->save();       

        return response()->json($path);
        //return back()->with('flash-success', 'You Have Successfully Updated your profile image.');
        
    }

    public function update_user_details(Request $request){

        $currentuser = Auth::guard('frontuser')->user()->id;  
        $formdata = $request->all();
        //dd($formdata); 
        
        $UserModel = UserModel::find($currentuser);   
        $UserModel->first_name = $formdata['firstname']; 
        $UserModel->last_name = $formdata['lastname']; 
        $UserModel->phone = $formdata['phone'];      
        $UserModel->email = $formdata['email'];
        $UserModel->country = $formdata['country'];
        $UserModel->save();
        if($UserModel->id > 0){
            return back()->with('flash-success', 'You have successfully update profile.');
        }

    }

    public function fridaynotification(){
        
        $incomplete_focused_goals = MyFocusgoalsModel::where('goal_status', 'incomplete')->get(); 
        // dd($incomplete_focused_goals);
        foreach ($incomplete_focused_goals as $key => $incomplete_focused_goal) {
            $user_id = $incomplete_focused_goal->user_id;
            $user_email = GetUserinfo($user_id, 'email');
            $user_name = GetUserinfo($user_id, 'username');
            echo $user_name.'=>'.$user_email."<br>";
            ////Send Mail to Register User Email////      
            Mail::to($user_email)->send(new FridayNotification($user_id));   
        }
       
    }

    public function incompletegoalnotification(){
        
        // $current_date = date('y-m-d');
        // $prev_date = date('Y-m-d', strtotime('-1 day', strtotime($current_date)));

        $prev_date = date('Y-m-d', strtotime('-1 day'));
        $incomplete_focused_goals = MyFocusgoalsModel::where('goal_status', 'incomplete')->WhereDate('created_at', '=', $prev_date)->get(); 


        foreach ($incomplete_focused_goals as $key => $incomplete_focused_goal) {
            $user_id = $incomplete_focused_goal->user_id;
            $focused_cat = $incomplete_focused_goal->focused_cat;
            $category = ucfirst(str_replace("_", " ", $focused_cat));

            $step = $incomplete_focused_goal->current_step;
            $url = URL::to('/'.$step.'');

            $user_email = GetUserinfo($user_id, 'email');
            $user_name = GetUserinfo($user_id, 'username');
            echo $user_name.'=>'.$user_email."<br>";
            ////Send Mail to Register User Email////
            $user_id = array(
                'categories_name' => $category,
                'user_id' => $user_id,
                'user_name' => $user_name,
                'url' => $url
            );
            Mail::to($user_email)->send(new IncompletegoalNotification($user_id));   
        }

    }

    
}
