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
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\UploadFileController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\MyMiddleWare;

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
    return view('welcome');
});

Route::get('/main/{id?}', [MainController::class, 'main_index'])->name('default');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
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
Route::post('/post', [PostController::class, 'post']);

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


///////// ////////USER ROUTE /////////////////////
////////// GET ROUTE ///////////////
Route::middleware(['MyMiddleWare'])->group(function () {
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




Route::get('/{id?}', function () {
    return redirect(route('default'));
})->where('id', '.*');
