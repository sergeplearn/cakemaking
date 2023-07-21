<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
 

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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'Userroles:admin', 'prefix' => 'admin', 'namespace' => 'admin'], function () {
        Route::get('/', AdminController::class);

        Route::resource('newcake', CakeCreationController::class)
            ->only(['index', 'store', 'update', 'destroy']);

        Route::resource('testimonial', TestimonialController::class)
            ->only(['index', 'store', 'update', 'destroy']);

        Route::resource('team', TeamsController::class)
            ->only(['index', 'store', 'update', 'destroy']);

        
        Route::resource('User', AdminregistrationController::class)
            ->only(['index', 'store','update', 'destroy']);

    });

   
    Route::group(['prefix' => 'user','namespace' => 'users'], function () {
        Route::resource('newcake', NewcakeController::class)
        ->only(['show']);

        Route::resource('comment', CommentController::class)
            ->only(['store', 'update', 'destroy']);

        Route::resource('replycomment', ReplycommentController::class)
            ->only(['store', 'update', 'destroy']);

        Route::resource('like', LikeController::class)
            ->only(['store']);

        Route::resource('unlike', UnlikeController::class)
            ->only(['store']);
        
        Route::resource('upload_img', UploadImgController::class)
            ->only(['store']);

        
        
            
        
    });
   
   
   
   
    

});

Route::group(['prefix' => 'user', 'namespace' => 'users'], function () {
    Route::resource('testimonial', TestimonialController::class)
        ->only(['index']);

    Route::resource('teams', TeamsController::class)
        ->only(['index']);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
