<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('landing');
});
Route::get('/2', function () {
    return view('comments');
});

Route::get('/edit', function () {
    return view('testuser');
});

Auth::routes();



Route::get('/getstarted', [App\Http\Controllers\RoleController::class, 'index']);

Route::post('/getstarted', [App\Http\Controllers\RoleController::class, 'roleselect']);




//Route::get('/main', [App\Http\Controllers\MainController::class, 'index']);

Route::post('/profile/edit', [App\Http\Controllers\UserController::class, 'update']);

Route::get('/profiles/{userid}', [App\Http\Controllers\ProfileController::class, 'index']);

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::get('dashboard', 'AdminController@dashboard');

});

Route::post('/home', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/admin/users', [App\Http\Controllers\Admin\UserController::class, 'index']);
Route::get('/admin/general', [App\Http\Controllers\Admin\AdminController::class, 'index']);

Route::get('/changeStatus', [App\Http\Controllers\Admin\UserController::class, 'ChangeMemberStatus'])->name('changeStatus');

Route::group(['middleware' => ['auth', "isUser"]], function () {

    Route::get('/home/{section}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    /*Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::post('userBan', [App\Http\Controllers\Admin\UserController::class, 'ban'])->name('users.ban');
    Route::get('userUserRevoke/{id}', [App\Http\Controllers\Admin\UserController::class, 'revoke'])->name('users.revokeuser');*/





});

Route::get('/users/status/{user_id}/{status_code}', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('users.status.update');

Route::get('/posts/status/{post_id}/{status_code}', [App\Http\Controllers\Admin\AdminController::class, 'updateStatus'])->name('posts.status.update');


//chat and comments

Route::get('/chats', [App\Http\Controllers\ChatController::class, 'seeUsers']);

Route::get('/chatting/{id}', [App\Http\Controllers\ChatController::class, 'chatting']);

Route::get('/viewPost/{post_id}', [App\Http\Controllers\PostController::class, 'postComments']);


Route::group(['middleware' => ['web']], function () {
    Route::post('/search', [App\Http\Controllers\ChatController::class, 'searchUsers']);
    Route::post('/refresh', [App\Http\Controllers\ChatController::class, 'showChats']);
    Route::post('/addchat', [App\Http\Controllers\ChatController::class, 'addchat']);

    Route::post('/addc', [App\Http\Controllers\ComntController::class, 'addcomment']);
    Route::post('/getcomm', [App\Http\Controllers\PostController::class, 'getcomm']);
    Route::post('/likepost', [App\Http\Controllers\LikeController::class, 'giveLike']);
});