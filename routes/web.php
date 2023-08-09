<?php

use App\Http\Controllers\admin\AdminController;
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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'Userroles:admin', 'prefix' => 'admin', 'namespace' => 'admin'], function () {
        Route::get('/', AdminController::class);

        Route::get('/deleted_items', 'RecoverDeletedCakeController@index');

        Route::get('/deleted_items/{id}', 'RecoverDeletedCakeController@edit');

        Route::resource('User', ProfileController::class)
            ->only(['show', 'edit', 'update']);

        Route::resource('newcake', CakeCreationController::class)
            ->except(['show', 'edit', 'create']);

        Route::resource('testimonial', TestimonialController::class)
            ->except(['show', 'edit', 'create']);

        Route::resource('team', TeamsController::class)
            ->except(['show', 'edit', 'create']);

        Route::resource('User', AdminregistrationController::class)
            ->except(['show', 'edit', 'create']);

    });

    Route::group(['prefix' => 'user', 'namespace' => 'users'], function () {
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
            ->only(['create', 'store']);

    });

});

Route::group(['prefix' => 'user', 'namespace' => 'users'], function () {
    Route::resource('testimonial', TestimonialController::class)
        ->only(['index']);

    Route::resource('teams', TeamsController::class)
        ->only(['index']);

});

Route::resource('catigory', catigoryController::class)
    ->except(['index', 'show', 'edit', 'create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
