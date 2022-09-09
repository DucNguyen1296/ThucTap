<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogOutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminToolController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UploadFileController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\MyMiddleWare;
use App\Mail\NewMail;
use Illuminate\Support\Facades\Mail;

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

Route::get('/', function () {
    return view('login');
});



Route::get('/login', function () {
    return view('login');
})->name('login');

// Route register
Route::get('/register', function () {
    return view('register');
})->name('register');


////////////////// ADMIN ROUTE ////////////////////
/////////// POST ROUTE ////////////////

////////// GET ROUTE ///////////////
// Route Login
Route::middleware(['MyMiddleWare'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('main', [AdminController::class, 'admin_index'])->name('admin');
    });
});
Route::get('user_info', [UserController::class, 'user_info'])->name('admin.user.info');

// Route Delete User
Route::delete('/user_info/{id}', [AdminToolController::class, 'user_delete'])->name('admin.user.delete');

// Route Edit User
Route::get('/user_edit_index/{id?}', [AdminToolController::class, 'user_edit_index']);

Route::post('/user_edit/{id}', [AdminToolController::class, 'user_edit'])->name('admin.user.edit');



/////////////////////USER ROUTE ////////////////////////
/////////// POST ROUTE ////////////////
// Route Access
Route::post('/submit', [LoginController::class, 'login']);

// Route register
Route::post('/register', [RegisterController::class, 'register']);

// Route Update-Edit profile
Route::post('/edit_profile', [EditProfileController::class, 'update']);

// Route Change Password
Route::post('/change_password', [PasswordController::class, 'updatePassword']);

// Route to Post
Route::post('/post', [PostController::class, 'post'])->name('user.post');

// Route to Update Post
Route::get('/post/{id?}', [PostController::class, 'post_index']);
Route::post('/update_post/{id}', [PostController::class, 'update_post'])->name('user.post.update');
Route::delete('/delete_post/{id}', [PostController::class, 'delete_post'])->name('user.post.delete');

// Route to Upload Avatar
Route::post('/avatar', [AvatarController::class, 'avatar_update']);

// Route to Upload file
// Route::post('/upload', [UploadFileController::class, 'upload_img']);

// Route to Update file
Route::post('/update_file/{id}', [UploadFileController::class, 'update_img'])->name('user.file.update');

// Route Delete File Upload
// Route::delete('/delete_file/{id}', [UploadFileController::class, 'delete_img'])->name('user.file.delete');

// Route to Comment
Route::post('/comment/{id}', [CommentController::class, 'comment'])->name('user.post.comment');
Route::delete('/delete_comment/{id}', [CommentController::class, 'comment_delete'])->name('user.comment.delete');
Route::post('/update_comment/{id}', [CommentController::class, 'comment_update'])->name('user.comment.update');

// Route to Reply
Route::post('/reply_comment/{id?}', [ReplyController::class, 'store'])->name('user.reply.create');
Route::delete('/delete_reply/{id}', [ReplyController::class, 'destroy'])->name('user.reply.delete');

///////// ////////USER ROUTE /////////////////////
////////// GET ROUTE ///////////////
Route::middleware(['MyMiddleWare'])->group(function () {
    Route::get('/main/{id?}', [MainController::class, 'main_index'])->name('default');
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::prefix('profile')->group(function () {
        Route::get('show', [ProfileController::class, 'show']);
        Route::get('{name}', [ProfileController::class, 'index'])->name('user.profile');
    });
});

// Route Edit
Route::get('editprofile', [EditProfileController::class, 'edit_index']);

// Route change Password
Route::get('change_password', [PasswordController::class, 'change_index']);

// Route Log Out
Route::get('/logout', [LogOutController::class, 'logout']);

// Route to read the detail
Route::get('/main_post/{id}', [MainController::class, 'main_post_detail'])->name('main.post.detail');

// Route to show the user
Route::get('/user/{id}', [MainController::class, 'main_user_detail'])->name('user.profile.detail');

/////// Mail

//Route to forgot password
Route::get('/forgot_password', [PasswordController::class, 'forgot_index'])->name('user.forgot.index');
Route::post('/forgot_password', [PasswordController::class, 'forgot_send'])->name('user.forgot.send');

//Route to reset password
Route::get('/reset_password/{id}', [PasswordController::class, 'reset_index'])->name('user.reset.index');
Route::post('/reset_password/{id?}', [PasswordController::class, 'reset_password'])->name('user.reset.password');

Route::get('/{id?}', function () {
    return redirect(route('login'));
})->where('id', '.*');
