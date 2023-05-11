<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagesModel;
use App\Models\ContactUsModel;
use App\Models\VideoLibrary;
use App\Models\PrivacyPolicyModel;



class FrontPagesController extends Controller
{
    public function about_us()
    {
        $section1 = PagesModel::where('section_type','section-1')->first();
        $section2 = PagesModel::where('section_type','section-2')->first();
        $section3 = PagesModel::where('section_type','section-3')->first();
        $section4 = PagesModel::where('section_type','section-4')->first();
         return view('frontend/about_us', compact('section2', 'section1', 'section3', 'section4'));
    }
    public function contact_us()
    {
         return view('frontend/contact-us');
    }
    public function contact_us_save(Request $req)
    {
         $validator = $req->validate([
            'first_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:10|max:10',
            'message' => 'required',
         ]);

         $res = new ContactUsModel();
         $res->first_name = $req->first_name;
         $res->last_name = isset($req->last_name) ? $req->last_name : '';
         $res->email = $req->email;
         $res->mobile = $req->mobile;
         $res->message = $req->message;

         if($res->save()){
            return back()->with('flash-success', 'Message has been sent.');
         }else{
            return back()->with('flash-error', 'Something went wrong.');
         }

         dd($inputs);
    }
    public function videos_library(){
        $data = VideoLibrary::take(9)->get();
        $totalVideos = $data->count();

        return view('frontend/videos-library',compact('data', 'totalVideos'));
    }
    public function load_videos_library(Request $request){

        $data = VideoLibrary::where('id', '>', $request->id)->orderBy('id', 'desc')->take(6)->get()->toArray();
        echo json_encode($data);
    }

    public function privacy_policy()
    {
        $data = PrivacyPolicyModel::where('page_name', 'privacy-policy')->first();
        return view('frontend/privacy-policy',compact('data'));
    }

    public function cookie_policy(){
        $data = PrivacyPolicyModel::where('page_name', 'cookie-policy')->first();
        return view('frontend/cookie-policy',compact('data'));
    }
    
}
