<?php

use App\Http\Controllers\admin\basecontroller as AdminBasecontroller;
use App\Http\Controllers\admin\category\categoryController;
use App\Http\Controllers\admin\event\event_categorycontroller;
use App\Http\Controllers\admin\event\event_detailcontroller;
use App\Http\Controllers\admin\event\event_imagecontroller;
use App\Http\Controllers\admin\event\eventcontroller;
use App\Http\Controllers\admin\banner\bannerController;
use App\Http\Controllers\admin\page_infor\pageInforController;
use App\Http\Controllers\admin\titket\titketController as admintitketController;
use App\Http\Controllers\client\eventcontroller as clienteventcontroller;
use App\Http\Controllers\admin\user\usercontroller;
use App\Http\Controllers\client\baseController;
use App\Http\Controllers\client\loginController;
use App\Http\Controllers\client\seatController;
use App\Http\Controllers\client\titketController;
use App\Models\event_image;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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
//Route without Login:

Route::post('/client/login/store',[loginController::class,'login_function'])->name('login_function');
Route::get('/client/login',[loginController::class,'login'])->name('login');
Route::get('/client/register',[loginController::class,'sigup'])->name('sigup');
Route::post('/client/register/store',[loginController::class,'sigup_function'])->name('sigup_function');
Route::get('/client/aboutus',[baseController::class,'aboutus'])->name('aboutus');
Route::get('/client/event_detail/{detail_id}',[clienteventcontroller::class,'eventdetail'])->name('event_detail');
Route::get('/',[baseController::class,'index'])->name('home');
Route::get('/search_province',[baseController::class,'searchprovince']);
Route::get('/client/events',[baseController::class,'events'])->name('client_events');
Route::get('/getdistrict/{province_id}',[baseController::class,'getdistrict']);
Route::get('/getwards/{district_id}',[baseController::class,'getwards']);
Route::get('/finddistrict/{ward_id}',[baseController::class,'findprovince']);
Route::post('/client/events',[baseController::class,'search_event'])->name('search');
Route::get('/register/active/{user_id}',[loginController::class,'active_account'])->name('active_account');
//Forgotten Password Route:
Route::get('/client/forgot_password',[loginController::class,'forgot_password']);
Route::post('/client/forgot_password',[loginController::class,'forgot_password_find']);
Route::get('/client/password_newpass/{user_id}',[loginController::class,'newPass']);
Route::post('/client/password_newpass/{user_id}',[loginController::class,'newPass_store']);
//Route with auth:
Route::middleware(['auth'])->group(function() {
    Route::get('client/logout',[loginController::class,'sigout'])->name('logout');
    //Client Route
    Route::prefix('client')->group( function() {
        ROute::post('/event_detail/{detail_id}/titket/index',[titketController::class,'index']);
        //User-infor Route::
        Route::prefix('/infor/{user_id}') ->group(function(){
            Route::get('/index',[baseController::class,'client_infor']);
            Route::get('/changepass',[loginController::class,'changepass_index']);
            Route::post('/changepass',[loginController::class,'changepass_store']);
            Route::post('/changeavt',[baseController::class,'change_avt']);
        });
        // Booking Route:
        Route::prefix('titket')->group(function(){
            Route::post('/create',[titketController::class,'titket_create']);
            Route::post('/momo_payment',[titketController::class,'momo_payment']);
            Route::post('/vnpay_payment',[titketController::class,'vnpay_payment']);
            Route::get('/momo_payment_success/{titket_id}',[titketController::class,'momo_payment_success']);
            Route::get('/titket_list/{user_id}',[titketController::class,'ticket_list']);
            Route::get('/titket_detail/{ticket_id}',[titketController::class,'ticket_detail']);
        });
        Route::prefix('comment')->group(function() {
            Route::post('/create',[baseController::class,'create_comment']);
            Route::delete('/delete/{comment_id}',[baseController::class,'delete_comment']);
        });
        //Check seat Route:
        Route::prefix('seat')->group(function(){
            Route::post('/check',[seatController::class,'check_seat']);
            Route::delete('/delete',[seatController::class,'delete']);
        });
    });
    
    //Admin Route
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'admin'
    ], function(){
        Route::get('/index',[AdminBasecontroller::class,'index'])->name('admin_index');
        Route::prefix('/categories')->group(function() {
           
            Route::get('/index',[event_categorycontroller::class,'index']);
            Route::get('/find/{id}',[event_categorycontroller::class,'find']);
            Route::post('/edit/{id}',[event_categorycontroller::class,'edit_store']);
            Route::post('/create',[event_categorycontroller::class,'create_category']);
            Route::delete('/delete/{id}',[event_categorycontroller::class,'deleteOneCategory']);
            Route::delete('/deleteMany',[event_categorycontroller::class,'deleteManyCategory']);
            Route::get('/getall',[event_categorycontroller::class,'getall']);
        });
        Route::prefix('/event')->group(function(){
            Route::get('/index',[eventcontroller::class,'index']);
            Route::post('/create',[eventcontroller::class,'create_store']);
            Route::get('/find/{id}',[eventcontroller::class,'find']);
            Route::post('/edit/{id}',[eventcontroller::class,'edit_store']);
            Route::delete('/delete/{id}',[eventcontroller::class,'deleteOneevent']);
            Route::delete('/deleteMany',[eventcontroller::class,'deleteManyEvent']);
        });
        Route::prefix('event_detail/{id_sukien}')->group(function(){
            Route::get('/index',[event_detailcontroller::class,'index']);
            Route::get('/create',[event_detailcontroller::class,'create_index']);
            Route::post('/create/store',[event_detailcontroller::class,'create_store']);
            Route::get('/edit/{eventdetail_id}',[event_detailcontroller::class,'edit_index']);
            Route::post('/edit/{eventdetail_id}',[event_detailcontroller::class,'edit_store']);
            route::delete('/delete/{eventdetail_id}',[event_detailcontroller::class,'delete']);
            Route::post('/edit/closeevent/{eventdetail_id}',[event_detailcontroller::class,'close']);
        });
        Route::prefix('/event_image')->group(function(){
            Route::get('/index',[event_imagecontroller::class,'index']);
        });
        Route::prefix('event_image/{eventdetail_id}')->group(function(){
            Route::get('/index',[event_imagecontroller::class,'list_image']);
            Route::get('/create',[event_imagecontroller::class,'create']);
            Route::POST('/create',[event_imagecontroller::class,'store']);
            Route::delete('/delete/{image_id}',[event_imagecontroller::class,'delete']);
        });
        Route::prefix('user')->group(function(){
            Route::get('/index',[usercontroller::class,'index']);
            Route::get('/edit/{user_id}',[usercontroller::class,'edit']);
            Route::post('/edit/{user_id}',[usercontroller::class,'edit_user_store']);
            Route::POST('/edit/lock_user/{user_id}',[usercontroller::class,'edit_store']);
            Route::POST('/edit/unlock_user/{user_id}',[usercontroller::class,'edit_store']);
            Route::POST('/edit/changerole/{user_id}',[usercontroller::class,'edit_store']);
            Route::delete('/delete/{user_id}',[usercontroller::class,'deleteuser']);
            
        });
        //Page_infor Route::
        Route::prefix('page_infor')->group(function(){
            Route::get('/index',[pageInforController::class,'index']);
            Route::get('/create',[pageInforController::class,'create']);
            Route::post('/create',[pageInforController::class,'store']);
            Route::delete('/delete/{id}',[pageInforController::class,'delete']);
            Route::post('/unlock/{id}',[pageInforController::class,'unlock']);
            Route::get('/edit/{id}',[pageInforController::class,'edit']);
            Route::post('/edit/{id}',[pageInforController::class,'edit_store']);
        });
        //Banner Route:
        Route::prefix('banner')->group(function(){
            Route::get('/index',[bannerController::class,'index']);
            Route::get('/create',[bannerController::class,'create']);
            Route::post('create',[bannerController::class,'store']);
            Route::delete('/delete/{banner_id}',[bannerController::class,'delete']);
        });
        Route::prefix('titket')->group(function(){
            Route::get('/index',[admintitketController::class,'index']);
            Route::post('/find',[admintitketController::class,'search']);
            Route::get('/detail/{ticket_id}',[admintitketController::class,'ticket_detail']);
            Route::post('/detail/checkin/{titket_id}',[admintitketController::class,'checkin']);
            Route::delete('/detail/delete/{titket_id}',[admintitketController::class,'delete']);
            Route::get('/detail/print_titket/{titket_id}',[admintitketController::class,'export_titket']);
            Route::get('/event_ticket/{event_id}',[admintitketController::class,'event_ticket']);
        });
        //Thong ke
        Route::prefix('statistical')->group(function(){
            Route::get('/event_statistical',[AdminBasecontroller::class,'event_statistical']);
            Route::get('/event_statistical/{detail_id}',[AdminBasecontroller::class,'eventDetail_statistical']);
            Route::post('/event_statistical/date',[AdminBasecontroller::class,'event_statisticalDate']);
            Route::get('/viewer_statistical',[AdminBasecontroller::class,'viewer_statistical']);
            Route::get('/viewer_statistical/{user_id}',[AdminBasecontroller::class,'viewer_statistical_detail']);
        });
    });
});



