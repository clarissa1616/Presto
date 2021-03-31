<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\RevisorCreateController;
use App\Http\Controllers\UserController;
use App\Models\RevisorCreate;

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

Route::get('/', [PublicController::class,'index'])->name('welcome');

//Announcment Route home controller
Route::get('/announcement/create',[HomeController::class,'create'])->name('announcement.create');
Route::post('/announcement/store',[HomeController::class,'store'])->name('announcement.store');
// UploadImages
Route::post('/announcement/images/upload',[HomeController::class,'uploadImages'])->name('announcement.images.upload');
Route::delete('/announcement/images/remove', [HomeController::class,'removeImages'])->name('announcement.images.remove');
Route::get('/announcement/images/getImages',[HomeController::class,'getImages'])->name('announcement.images.getImages');

//Announcment Route pubblic controller
Route::get('/announcement/category/{name}/{id}/announcements' , [PublicController::class , 'announcementsByCategory'])->
name('announcement.category');
Route::get('/announcement/show/{announcement}' , [PublicController::class, 'show'])->name('announcement.show');

//Revisor route
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.home');
Route::post('/revisor/announcement/{announcement}/accept', [RevisorController::class, 'accept'])
->name('revisor.accept');
Route::post('/revisor/announcement/{announcement}/reject', [RevisorController::class, 'reject']
)->name('revisor.reject');

// SearchBar route
Route::get('/welcome/search',[PublicController::class,'search'])->name('welcome.search');


//Rotte Revisor request
Route::get('/revisor/create', [RevisorCreateController::class, 'create'])->name('revisor.create')->middleware('auth');
Route::post('/revisor/store', [RevisorCreateController::class, 'store'])->name('revisor.store');
//Route Revisor Control thank you page
Route::get('/revisor/control' , [RevisorCreateController::class, 'control'])->name('revisor.control');
// Route::post('/revisor/store', [RevisorCreateController::class , 'store'])->name('contact_recived');
Route::get('/revisor/index',[RevisorCreateController::class,'index'])->name('revisor.index');

Route::delete('/revisor/{id}/destroyRevisor',[RevisorCreateController::class,'destroyRevisor'])->name('revisor.destroyRevisor');
Route::post('/revisor/{id}/revisorTrue',[RevisorCreateController::class,'revisorTrue'])->name('revisor.revisorTrue');

Route::post('/revisor/{id}/destroyRevisorAccept',[RevisorCreateController::class,'destroyRevisorAccept'])->name('revisor.destroyRevisorAccept');

Route::get('revisol/final',[RevisorCreateController::class,'final'])->name('revisor.final');

Route::get('/revisorCreate/index',[RevisorCreateController::class,'indexRevisor'])->name('revisorCreate.index');

//Rotta lingue
Route::post('/locale{locale}' , [PublicController::class, 'locale'])->name('locale');
Auth::routes();

// Rotta utente
Route::get('/user/index', [UserController::class , 'index'])->name('user.index');

Route::get('/user/edit/{user}', [UserController::class , 'edit'])->name('user.edit');
Route::put('user/update/{user}' , [UserController::class , 'update'])->name('user.update');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

