<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SlideimageController;
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

Route::get('/', 'SlideimageController');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'Userroles:admin', 'prefix' => 'admin', 'namespace' => 'admin'], function () {
        Route::get('/', AdminController::class);
        /* admin/show all deleted items */
        Route::get('/deleted_items', 'RecoverDeletedCakeController@index');
        /* admin/recover deleted items */
        Route::get('/deleted_items/{id}', 'RecoverDeletedCakeController@edit');
        /* admin/categories */
        Route::resource('categories', CategoriesController::class)
            ->only(['index', 'store', 'update']);
        /* admin/Profile */
        Route::resource('User', ProfileController::class)
            ->only(['show', 'edit', 'update']);
        /* admin/CakeCreation */
        Route::resource('newcake', CakeCreationController::class)
            ->except(['show', 'edit', 'create']);
        /* admin/testimonial */
        Route::resource('testimonial', TestimonialController::class)
            ->except(['show', 'edit', 'create']);
        /* admin/teams */
        Route::resource('team', TeamsController::class)
            ->except(['show', 'edit', 'create']);
        /* admin/Adminregistration */
        Route::resource('User', AdminregistrationController::class)
            ->except(['show', 'edit', 'create']);
        /* admin/slideimage */
        Route::resource('slideimage', SlideimageController::class)
            ->except(['show', 'edit', 'create']);

    });

    Route::group(['prefix' => 'user', 'namespace' => 'users'], function () {
        /* user/show all cakes */
        Route::resource('newcake', NewcakeController::class)
            ->only(['show']);
        /* user/comment */
        Route::resource('comment', CommentController::class)
            ->only(['store', 'update', 'destroy']);
        /* user/replycomment */
        Route::resource('replycomment', ReplycommentController::class)
            ->only(['store', 'update', 'destroy']);
        /* user/like */
        Route::resource('like', LikeController::class)
            ->only(['store']);
        /* user/unlike */
        Route::resource('unlike', UnlikeController::class)
            ->only(['store']);
        /* user/upload profile image */
        Route::resource('upload_img', UploadImgController::class)
            ->only(['create', 'store', 'update']);
        /* user/ profile editing  */
        Route::resource('User', UsersprofileController::class)
            ->only(['edit', 'update', 'destroy']);

    });

});

Route::group(['prefix' => 'user', 'namespace' => 'users'], function () {
    /* user/ profile editing  */
    Route::resource('testimonial', TestimonialController::class)
        ->only(['index']);

    Route::resource('teams', TeamsController::class)
        ->only(['index']);

});

Route::resource('catigory', catigoryController::class)
    ->except(['index', 'show', 'edit', 'create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
