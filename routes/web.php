<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FighterController;
use App\Http\Controllers\FrontendConroller;
use App\Http\Controllers\indexController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//admin
Route::get('/admin-index',[AdminController::class,'admin_index'])->name('admin-index');

//usercontroller//
Route::post('/login',[UserController::class,'login']);
Route::get('/logout',[UserController::class,'logout']);
Route::get('user',[UserController::class,'index'])->name('user');
Route::get("user/delete/{id}",[UserController::class,'delete'])->name('user-delete');
Route::post('/user-add',[UserController::class,'store'])->name('user-add');

//bannercontroller//
Route::get('admin-banner',[BannerController::class,'banner'])->name('admin-banner');
Route::post('banner-store',[BannerController::class,'store'])->name('banner-store');
Route::get("banner/delete/{id}",[BannerController::class,'delete'])->name('banner-delete');

//servicecontroller
Route::get('admin-service',[ServiceController::class,'service'])->name('admin-service');
Route::post('service-store',[ServiceController::class,'store'])->name('service-store');
Route::get("service/delete/{id}",[ServiceController::class,'delete'])->name('service-delete');

//blogcontroller
Route::get('admin-blog',[BlogController::class,'blog'])->name('admin-blog');
Route::post('blog-store',[BlogController::class,'store'])->name('blog-store');
Route::get("blog/delete/{id}",[BlogController::class,'delete'])->name('blog-delete');

//contactcontroller
Route::get('admin-contact',[ContactController::class,'contact'])->name('admin-contact');
Route::post('contact-store',[ContactController::class,'store'])->name('contact-store');
Route::get("contact/delete/{id}",[ContactController::class,'delete'])->name('contact-delete');

//NewsletterController//
Route::get('admin-new',[NewsletterController::class,'index'])->name('admin-new');
Route::post('new-store',[NewsletterController::class,'store'])->name('new-store');
Route::get('news-delete/{id}',[NewsletterController::class,'delete'])->name('news-delete');

//frontendController//
Route::get('/',[FrontendConroller::class,'index'])->name('/');
Route::get('/about',[FrontendConroller::class,'about'])->name('about');
Route::get('/service',[FrontendConroller::class,'service'])->name('service');
Route::get('/blog',[FrontendConroller::class,'blog'])->name('blog');
Route::get('/contact',[FrontendConroller::class,'contact'])->name('contact');
Route::get('/login',[FrontendConroller::class,'login'])->name('login');


//fightercontroller//
Route::get('/fighter',[FighterController::class,'index'])->name('fighter');
Route::post('/fighter-store',[FighterController::class,'store'])->name('fighter-store');
Route::get('fighter-delete/{id}',[FighterController::class,'delete'])->name('fighter-delete');

//partnerscontroller//
Route::get('partner',[PartnerController::class,'index'])->name('partner');
Route::post('/partner-store',[PartnerController::class,'store'])->name('partner-store');
Route::get('partner-delete/{id}',[PartnerController::class,'delete'])->name('partner-delete');

//indexController
Route::get('index',[indexController::class,'index'])->name('index');
Route::post('store',[indexController::class,'store'])->name('index-store');
Route::get("index/delete/{id}",[indexController::class,'delete'])->name('indexdelete');


