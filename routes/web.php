<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('accueil');
});
Route::get('/about-us', function () {
    return view('about');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/register-form', [RegisterController::class,'index'])->name('register.index');
Route::post('/register-form', [RegisterController::class,'store'])->name('register.store');


Route::get('/login-form', [LoginController::class,'index'])->name('login.index');//affiche le form
Route::post('/login', [LoginController::class,'login'])->name('login.login');//login for testing

// table event----------------------------------------------------------


Route::get('/event', [EventController::class,'show'])->name('events.index');
Route::get('/event_overview/{id}', [EventController::class,'showOverview'])->name('events.index');
Route::get('/admin/events', [EventController::class,'index'])->name('events.index');
Route::get('/admin/events/destroy/{id}', [EventController::class,'destroy'])->name('events.destroy');
Route::get('/admin/events/edit/{id}', [EventController::class,'edit'])->name('events.edit');
//form view
Route::get('/admin/events/create', [EventController::class,'create']);
// stock dans database
Route::post('/admin/events/store', [EventController::class,'store']);
Route::post('/admin/events/update', [EventController::class,'update']);



// table member----------------------------------------------------------


Route::get('/member', [MemberController::class,'show'])->name('members.index');
Route::get('/admin/members', [MemberController::class,'index'])->name('members.index');
Route::get('/admin/members/destroy/{id}', [MemberController::class,'destroy'])->name('members.destroy');
Route::get('/admin/members/edit/{id}', [MemberController::class,'edit'])->name('members.edit');
//form view
Route::get('/admin/members/create', [MemberController::class,'create']);
// stock dans database
Route::post('/admin/members/store', [MemberController::class,'store']);
Route::post('/admin/members/update', [MemberController::class,'update']);





Route::get('/blog', [BlogController::class,'show'])->name('blogs.index');
Route::get('/blog_overview/{id}', [BlogController::class,'showOverview'])->name('blogs.index');
// table blog----------------------------------------------------------
Route::get('/admin/blogs', [BlogController::class,'index'])->name('blogs.index');
Route::get('/admin/blogs/destroy/{id}', [BlogController::class,'destroy'])->name('blogs.destroy');
Route::get('/admin/blogs/edit/{id}', [BlogController::class,'edit'])->name('blogs.edit');
//form view
Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
// stock dans database
Route::post('/admin/blogs/store', [BlogController::class, 'store']);
Route::post('/admin/blogs/update', [BlogController::class,'update']);










// table contact----------------------------------------------------------
Route::get('/admin/contact', [ContactController::class,'index'])->name('contact.index');
Route::get('/admin/contact/destroy/{id}', [ContactController::class,'destroy'])->name('contact.destroy');
Route::get('/admin/contact/edit/{id}', [ContactController::class,'edit'])->name('contact.edit');
//form view
Route::get('/admin/contact/create', [ContactController::class,'create']);
// stock dans database
Route::post('/admin/contact/store', [ContactController::class,'store']);
Route::post('/admin/contact/update', [ContactController::class,'update']);



// -----------------------language
Route::get('locale/{language}', [LanguageController::class, 'setLanguage'])->name('language.set');
