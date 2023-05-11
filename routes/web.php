<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\Admincontroller;
use App\Http\Controllers\admin\ParentCategoryController;
use App\Http\Controllers\admin\ChildCategoryController;
use App\Http\Controllers\admin\SubChildCategoryController;
//use App\Http\Controllers\admin\SubadminController;
use App\Http\Controllers\admin\AdminGoalsController;
use App\Http\Controllers\admin\AdminSlotsController;
use App\Http\Controllers\admin\AdminBookingController;
use App\Http\Controllers\admin\PagesController;

use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\frontend\MygoalsController;
use App\Http\Controllers\frontend\UserBookingController;


use App\Http\Controllers\frontend\FrontPagesController;


//use App\Http\Middleware\Adminlogincheck;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logout', [UserController::class,'user_logout'] )->name('userlogout');
Route::get('signout', [Admincontroller::class, 'signOut'])->name('signout');

Route::post('/book-slot',[UserBookingController::class, 'user_book_slot'])->name('user_book_slot');
Route::post('/fetch-slot-timming',[UserBookingController::class, 'fetch_slot_timming'])->name('fetch_slot_timming');

///////Logged-in adminuser///////
Route::group(['middleware' => ['auth']],function(){

	//Route::view('/admin','admin/dashboard')->name('dashboard');
	Route::get('/admin', [Admincontroller::class, 'dashboarddata'])->name('dashboard');
	//Route::view('admin/dashboard','admin/dashboard')->name('dashboard');
	//Route::view('admin/add-subadmin','admin/add-subadmin');

	/*
	Route::get('admin/subadmins', [SubadminController::class, 'get_subadmins_list'])->name('get_subadmins');
	Route::post('admin/insert-subadmin', [SubadminController::class,'insert_subadmin']);
	Route::post('admin/check-user-existance',[SubadminController::class,'check_user_existance']);
	Route::post('admin/edit-subadmin',[SubadminController::class,'edit_subadmin']);	
	*/
	//Route::get('admin/edit-subadmin/{id}',[SubadminController::class, 'get_single_subadmin'])->name('edit_subadmins');
	//Route::get('admin/update-subadmin',[SubadminController::class, 'get_single_subadmin'])->name('update_subadmins');
	//Route::get('admin/vendors',[VendorController::class,'get_vendors_list'])->name('get_vendors');

	Route::get('admin/all-user',[AdminUserController::class,'get_users_list'])->name('all_users');
	Route::post('admin/insert-users', [AdminUserController::class,'insert_users']);
	Route::post('admin/edit-users', [AdminUserController::class,'edit_users']);

	Route::get('admin/all-goals',[AdminGoalsController::class,'get_goals_list'])->name('all_goals');
	Route::get('admin/all-focused-goals/{goalid}', [AdminGoalsController::class,'get_all_focused_goals'])->name('all_focused_goals');
	// Route::view('admin/focused-goal-single', 'admin/goals/focused-goal-single')->name('focused_goal_single');
	Route::get('admin/focused-goal-single/{focuesdgoalid}', [AdminGoalsController::class,'get_single_focus_goal'])->name('focused_goal_single');

	Route::get('admin/all-slots',[AdminSlotsController::class,'get_slots_list'])->name('all_slots');
	Route::post('admin/create-slot',[AdminSlotsController::class, 'insert_slot'])->name('create_slot');
	Route::post('admin/edit-slot', [AdminSlotsController::class, 'edit_slot'])->name('edit_slot');
	Route::get('admin/delte-slot/{id}', [AdminSlotsController::class, 'delete_slot'])->name('delete_slot');


	// Route::view('admin/view-bookings/{slotid}', 'admin/view-booking')->name('view_booking');
	Route::get('admin/view-bookings/{slotid}',[AdminBookingController::class, 'view_slot_booking'] )->name('view_booking');


	Route::get('admin/parent-categories', [ParentCategoryController::class, 'get_parent_categories_list'])->name('get_parent_categories');
	Route::post('admin/insert-parentcat', [ParentCategoryController::class, 'insert_parent_cat']);
	Route::post('admin/edit-parentcat', [ParentCategoryController::class, 'edit_parent_cat']);

	Route::get('admin/child-categories', [ChildCategoryController::class,'get_child_categories_list'])->name('get_child_categories');
	Route::post('admin/insert-childcat',[ChildCategoryController::class, 'insert_child_cat']);
	Route::post('admin/edit-childcat', [ChildCategoryController::class,'edit_childcat']);

	Route::get('admin/sub-child-categories', [SubChildCategoryController::class,'get_subchild_categories_list'])->name('get_subchild_categories');
    Route::post('admin/insert-subchildcat', [SubChildCategoryController::class, 'insert_subchild_cat']);
    Route::post('admin/get-child-acc-to-parent', [SubChildCategoryController::class, 'get_child_acc_to_parent']);
    Route::post('admin/edit-subchildcat',[SubChildCategoryController::class, 'edit_subchildcat']);

    Route::post('admin/check-email-existance', [UserController::class,'check_email_existance']);


    Route::get('admin/about-us', [PagesController::class, 'about_us'])->name('about_us');
    Route::post('admin/post-about-us/{section}', [PagesController::class, 'update_about_us'])->name('update_about_us');
    Route::get('admin/contact-us', [PagesController::class, 'contact_us'])->name('contactUsList');


    Route::get('admin/add-video-library', [PagesController::class, 'video_library'])->name('LibraryVideoAdd');
    Route::post('admin/post-video-library', [PagesController::class, 'video_library_store'])->name('LibraryVideoStore');
    Route::get('admin/video-list', [PagesController::class, 'video_library_list'])->name('LibraryVideolist');
    Route::get('admin/video-delete/{id}', [PagesController::class, 'video_library_delete'])->name('LibraryVideoDelete');


    Route::get('admin/privacy-policy-terms', [PagesController::class, 'privacy_policy_terms'])->name('PrivacyPolicyTerms');

    Route::post('admin/update-policy-terms', [PagesController::class, 'update_privacy_policy'])->name('UpdatePrivacyPolicyTerms');

    Route::get('admin/cookie-policy', [PagesController::class, 'cookie_policy'])->name('CookiePolicy');
    
    Route::post('admin/update-cookie-policy', [PagesController::class, 'update_cookie_policy'])->name('UpdateCookiePolicy');
	
});

///////Non-logged-in user//////
Route::group(['middleware' => ['guest']],function(){

	Route::get('/', function () {
	    return view('frontend/welcome');
	});

	/////Admin Routes Here//////
	Route::view('admin/login','admin/auth/login')->name('login');
	Route::view('admin/forgot-password','admin/auth/forgot-password')->name('password.request');
	//Route::view('admin/signup','admin/signup')->name('signup');
	Route::post('admin/user_login', [Admincontroller::class,'user_login_func'] )->name('userlogin');
	//Route::post('admin/register', [Admincontroller::class,'user_registration_func'] );


	/////Frontend Routes Here////////
	// Route::view('/signup', 'frontend/signup')->name('frontend.signup');
	Route::get('/signup', [UserController::class, 'Signupviewpage'])->name('frontend.signup');
	Route::view('/signin', 'frontend/signin')->name('frontend.signin');

	Route::post('/user-register', [UserController::class,'insert_users'] )->name('userregistration');
	Route::post('/check-email-existance', [UserController::class,'check_email_existance']);
	Route::post('/usersignin', [UserController::class,'usersignin'])->name('user-signin');

});

///////Frontend logged-in user//////
Route::group(['middleware' => ['frontendusercheck']],function(){

	Route::get('overview', [MygoalsController::class,'overview'])->name('overview');
	Route::get('step1', [MygoalsController::class,'getstep1data'])->name('getstep1');
	Route::post('submition_step1',[MygoalsController::class,'submit_step1'])->name('submit_step1');

	//Route::view('step2', 'frontend/step2')->name('frontend.step2');
	Route::get('step2/{adjustgoal?}', [MygoalsController::class,'getstep2data'])->name('getstep2');
	Route::post('submition_step2',[MygoalsController::class,'submit_step2'])->name('submit_step2');

	//Route::view('step3', 'frontend/step3')->name('getstep3');
	Route::get('step3', [MygoalsController::class,'getstep3data'])->name('getstep3');
	Route::post('submition_step3',[MygoalsController::class,'submit_step3'])->name('submit_step3');

	//Route::view('step4', 'frontend/step4')->name('getstep4');
	Route::get('step4', [MygoalsController::class,'getstep4data'])->name('getstep4');
	Route::post('submition_step4',[MygoalsController::class,'submit_step4'])->name('submit_step4');

	//Route::view('step5', 'frontend/step5')->name('getstep5');
	Route::get('step5', [MygoalsController::class,'getstep5data'])->name('getstep5');
	Route::post('submition_step5',[MygoalsController::class,'submit_step5'])->name('submit_step5');

	
	//Route::view('step6', 'frontend/step6')->name('getstep6');
	Route::get('step6', [MygoalsController::class,'getstep6data'])->name('getstep6');


	Route::middleware('step_check')->group(function(){
		Route::get('step7', [MygoalsController::class,'getstep7data'])->name('getstep7');
		Route::post('/step7-achieve-cats-submition', [MygoalsController::class,'step7_achieve_cats_submition']);

		Route::get('step8/{goal?}', [MygoalsController::class,'getstep8data'])->name('getstep8');
		Route::post('submition_step8',[MygoalsController::class,'submit_step8'])->name('submit_step8');

		Route::post('/step9-update-tracking-amount', [MygoalsController::class,'step9_update_tracking_amount'])->name('step9_trackingamount');

		Route::get('step9', [MygoalsController::class,'getstep9data'])->name('getstep9');
		Route::post('/step9-achieve-cats-submition', [MygoalsController::class,'step9_achieve_cats_submition']);

		Route::post('increase-month', [MygoalsController::class,'increase_month'])->name('increaseMonth');

	});
	

	Route::get('my-goals',[MygoalsController::class,'all_my_goals'])->name('all_my_goals');
	//Route::view('my-goals', 'frontend/my-goals')->name('my_goals');
	//Route::view('focused-goal', 'frontend/focused-goal')->name('focused_goal');
	Route::get('my-focused-goal/{mygoalid}',[MygoalsController::class,'my_focused_goal'])->name('my_focused_goal');


	//Route::view('my-profile','frontend/my-profile')->name('my_profile');
	Route::get('my-profile',[UserController::class,'my_profile_view'])->name('my_profile');
	Route::get('my-booking', [UserBookingController::class, 'all_my_booking'])->name('all_my_booking');


	Route::post('update-profile-image', [ UserController::class, 'storeuserImage' ])->name('update_profile_image');

	Route::post('update-user-details', [UserController::class, 'update_user_details'])->name('update_user_details');


	Route::get('/step6-like',[MygoalsController::class, 'step6_like'])->name('step6_like');


});

Route::post('admin/recover-password', [Admincontroller::class,'recover_password_func'] );
Route::post('admin/reset-password', [Admincontroller::class,'reset_password_func'] );

Route::get('/reset-password/{token}', function ($token) {
    return view('admin.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

//Route::view('admin/profile','admin/profile');
Route::get('admin/profile', [Admincontroller::class,'get_admin_generalinfo']);
Route::post('admin/admin_general_info', [Admincontroller::class,'update_admin_generalinfo'] );
Route::post('admin/admin_update_pass', [Admincontroller::class,'update_admin_passwordinfo'] );
Route::post('upload-images', [ Admincontroller::class, 'storeImage' ])->name('uploadimage');

Route::get('fridaynotification', [ UserController::class, 'fridaynotification']);
Route::get('incompletegoalnotification', [ UserController::class, 'incompletegoalnotification']);

Route::get('about-us', [FrontPagesController::class, 'about_us'])->name('AboutUsPage');
Route::get('contact-us', [FrontPagesController::class, 'contact_us'])->name('ContactUsPage');
Route::post('contact-us-save', [FrontPagesController::class, 'contact_us_save'])->name('ContactUsSave');
Route::get('videos-library', [FrontPagesController::class, 'videos_library'])->name('FrontentVideosLibrary');
Route::post('load-videos-library', [FrontPagesController::class, 'load_videos_library'])->name('FrontentLoadVideosLibrary');

Route::get('privacy-policy', [FrontPagesController::class, 'privacy_policy'])->name('FrontentPrivacyPolicy');
Route::get('cookie-policy', [FrontPagesController::class, 'cookie_policy'])->name('FrontendCookiePolicy');
