<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagesModel;
use App\Models\ContactUsModel;
use App\Models\VideoLibrary;
use App\Models\PrivacyPolicyModel;
use Str;
class PagesController extends Controller
{
    public function about_us(){
        $section1 = PagesModel::where('section_type','section-1')->first();
        $section2 = PagesModel::where('section_type','section-2')->first();
        $section3 = PagesModel::where('section_type','section-3')->first();
        $section4 = PagesModel::where('section_type','section-4')->first();
       
      return view('admin/pages/about_us',compact('section2', 'section1', 'section3', 'section4'));
    }
    public function update_about_us(Request $req, $section='')
    {
        $inputs = $req->all();
        $res = PagesModel::where('section_type', $section)->first();
       // dd($section, $inputs);
        if($section == 'section-1'){
            $validator = $req->validate([
                'section1_heading' => 'required',
                'list.*' => 'required',
                'image' => 'required',
            ],[
                'list.*.required' => 'List is required',
            ]);

            $res->heading = $inputs['section1_heading'];
            $res->description = isset($inputs['list']) ? implode(", ", $inputs['list']) : '';

            if ($req->file('image')) {
                if (file_exists("public/front-assets/img/" . $res->image)) {
                    unlink("public/front-assets/img/" . $res->image);
                }
                $file = $req->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('front-assets/img/'), $filename);
                $res->image = $filename;
            }

        }elseif($section == 'section-2')
        {
            $validator = $req->validate([
                'section2_heading' => 'required',
                'section2_description' => 'required',
            ],
            [
                'section2_heading.required' => 'Heading is required',
                'section2_description.required' => 'Content is required',
            ]);
            
            $res->heading = $inputs['section2_heading'];
            $res->description = $inputs['section2_description'];

        }elseif($section == 'section-3')
        {
            $validator = $req->validate([
                'section3_heading' => 'required',
                'section3_description' => 'required',
            ],
            [
                'section3_heading.required' => 'Heading is required',
                'section3_description.required' => 'Content is required',
            ]);
            
            $res->heading = $inputs['section3_heading'];
            $res->description = $inputs['section3_description'];

        }elseif($section == 'section-4')
        {
            $validator = $req->validate([
                'description.*.heading' => 'required',
                'description.*.content' => 'required',
            ],
            [
                'description.*.heading.required' => 'Heading is required',
                'description.*.content.required' => 'Content is required',
            ]);
        
            $res->description = json_encode($inputs['description']);
        }else{
            return back()->with('flash-error', 'something went wrong.');
        }

        if($res->save()){
                return redirect()->route('about_us')->with('flash-success', 'Page Edit Successfully');
        }else{
                return back()->with('flash-error', 'something went wrong.');
        }
    
    }
    public function contact_us(){
        $data = ContactUsModel::orderBy('id', 'desc')->get();
        return view('admin/pages/contact-us',compact('data'));
    }

    public function video_library(){
        return view('admin/pages/videos_add');
    }

    public function video_library_list(){
        $data = VideoLibrary::get();
        return view('admin/pages/videos_list',compact('data'));

    }

    public function video_library_store(Request $request){
        $inputs = $request->all();

        if(isset($inputs['video'])){
            foreach($inputs['video'] as $key => $value)
            {
                $filename = time() . str::random(5) .$value->getClientOriginalName();

                $value->move(public_path('front-assets/video-library/'), $filename);
                $input['name'] = $filename;
                $result = VideoLibrary::create($input);
            }
            if($result){
                return redirect()->route('LibraryVideolist')->with('flash-success', 'Videos add successfully');
            }else{
                return back()->with('flash-error', 'something went wrong.');
            }
        }
         return redirect()->route('LibraryVideolist')->with('flash-error', 'something went wrong or field is required.');

    }
    public function video_library_delete($id){
        $id = decrypt($id);
        $data = VideoLibrary::find($id);

        if (file_exists("public/front-assets/video-library/" . $data->name)) {
            unlink("public/front-assets/video-library/" . $data->name);
        }
        VideoLibrary::where("id", $id)->delete();
        return back()->with("flash-error", "Video deleted Successfully.");
    }

    public function privacy_policy_terms(){
        $data = PrivacyPolicyModel::where('page_name', 'privacy-policy')->first();
        return view('admin/pages/privacy_policy',compact('data'));
    }
    public function update_privacy_policy(Request $request){

        $validated = $request->validate([
            'privacy_content' => 'required',
        ],[
            'privacy_content.required' => 'Field is required',
        ]);

        $data = PrivacyPolicyModel::where('page_name', 'privacy-policy')->first();
        if($data == null){
            $data = New PrivacyPolicyModel();
        }
        $data->content = $request->privacy_content;
        
        if($data->save()){
            return redirect()->route('PrivacyPolicyTerms')->with('flash-success', 'Page Edit Successfully');
        }else{
                return back()->with('flash-error', 'something went wrong.');
        }
    }

    public function cookie_policy(){
        $data = PrivacyPolicyModel::where('page_name', 'cookie-policy')->first();
        return view('admin/pages/cookie_policy',compact('data'));
    }

    public function update_cookie_policy(Request $request){
        $validated = $request->validate([
            'privacy_content' => 'required',
        ],[
            'privacy_content.required' => 'Field is required',
        ]);

        $data = PrivacyPolicyModel::where('page_name', 'cookie-policy')->first();
        if($data == null){
            $data = New PrivacyPolicyModel();
        }
        $data->content = $request->privacy_content;
        
        if($data->save()){
            return redirect()->route('CookiePolicy')->with('flash-success', 'Page Edit Successfully');
        }else{
            return back()->with('flash-error', 'something went wrong.');
        }
    }
}
