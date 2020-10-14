<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\NotificationController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\admin\RoleController as AdminRoleController;
use App\Http\Controllers\admin\ProfileController as AdminProfileController;

use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\PaperController as UserPaperController;
use App\Http\Controllers\user\MaterialController as UserMaterialController;
use App\Http\Controllers\user\ProfileController as UserProfileController;
use App\Http\Controllers\user\FileController as UserFileController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\PaperController;
use App\Http\Controllers\MaterialController;

use App\Http\Controllers\FileController;

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


Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');




// Login Routes

Route::get('login', [LoginController::class, 'show'])->name('login.show');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// End of Login Routes



// Register Routes

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register');

// End of Register Routes



// Admin routes

Route::get('/admin', [AdminController::class, 'index'])->name('admin');


Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
Route::put('/admin/profile/edit-details', [AdminProfileController::class, 'updateDetails'])->name('admin.profile.details.update');
Route::put('/admin/profile/edit-password', [AdminProfileController::class, 'updatePassword'])->name('admin.profile.password.update');

// Route::get('/admin/settings/details', [AdminSettingController::class, 'details'])->name('admin.settings.details');
// Route::get('/admin/settings/edit-details', [AdminSettingController::class, 'editDetails'])->name('admin.settings.details.edit');
// Route::get('/admin/settings/edit-password', [AdminSettingController::class, 'editPassword'])->name('admin.settings.password.edit');
// Route::put('admin/settings/edit-details', [AdminSettingController::class, 'updateDetails'])->name('admin.settings.details.update');
// Route::put('admin/settings/edit-password', [AdminSettingController::class, 'updatePassword'])->name('admin.settings.password.update');


Route::get('/admin/notifications', [NotificationController::class, 'index'])->name('admin.notifications');
Route::get('/admin/notifications/{notification}', [NotificationController::class, 'show'])->name('admin.notifications.show');


Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
Route::get('/admin/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');

Route::put('admin/users/{user}/approve', [AdminUserController::class, 'approve'])->name('admin.users.approve');

Route::put('admin/users/{user}/activate', [AdminUserController::class, 'activate'])->name('admin.users.activate');
Route::put('admin/users/{user}/deactivate', [AdminUserController::class, 'deactivate'])->name('admin.users.deactivate');

Route::put('admin/users/{user}/password_reset', [AdminUserController::class, 'resetPassword'])->name('admin.users.password.reset');


Route::put('admin/users/{user}/roles/{role}/add', [AdminRoleController::class, 'add'])->name('admin.users.roles.add');
Route::delete('admin/users/{user}/roles/{role}/delete', [AdminRoleController::class, 'destroy'])->name('admin.users.roles.destroy');

// End of Admin routes






// User Routes

Route::get('/user', [UserController::class, 'index'])->name('user');

Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
Route::put('/user/profile/edit-details', [UserProfileController::class, 'updateDetails'])->name('user.profile.details.update');
Route::put('/user/profile/edit-password', [UserProfileController::class, 'updatePassword'])->name('user.profile.password.update');

Route::put('user/profile/update-avatar', [UserProfileController::class, 'updateAvatar'])->name('user.profile.avatar.update');
Route::delete('user/profile/delete-avatar', [UserProfileController::class, 'deleteAvatar'])->name('user.profile.avatar.delete');

Route::get('user/papers', [UserPaperController::class, 'index'])->name('user.papers');
Route::get('user/papers/create', [UserPaperController::class, 'create'])->name('user.papers.create');
Route::post('user/papers/create', [UserPaperController::class, 'store'])->name('user.papers.store');
Route::get('user/papers/{paper}', [UserPaperController::class, 'show'])->name('user.papers.show');
Route::put('user/papers/{paper}', [UserPaperController::class, 'update'])->name('user.papers.update');
Route::delete('user/papers/{paper}', [UserPaperController::class, 'destroy'])->name('user.papers.delete');

Route::get('user/materials', [UserMaterialController::class, 'index'])->name('user.materials');
Route::get('user/materials/create', [UserMaterialController::class, 'create'])->name('user.materials.create');
Route::post('user/materials/create', [UserMaterialController::class, 'store'])->name('user.materials.store');
Route::get('user/materials/{material}', [UserMaterialController::class, 'show'])->name('user.materials.show');
Route::put('user/materials/{material}', [UserMaterialController::class, 'update'])->name('user.materials.update');
Route::delete('user/materials/{material}', [UserMaterialController::class, 'destroy'])->name('user.materials.destroy');

Route::post('user/materials/{material}/files', [UserFileController::class, 'upload'])->name('user.materials.files.upload');
Route::delete('user/materials/files/{file}', [UserFileController::class, 'destroy'])->name('user.materials.files.destroy');

// User Routes





// Past Examination Paper Routes

Route::get('papers', [PaperController::class, 'index'])->name('papers');
Route::post('papers/search', [PaperController::class, 'search'])->name('papers.search');


// End of Past Examination Paper Routes






// Material Routes

Route::get('materials', [MaterialController::class, 'index'])->name('materials');
Route::post('materials/search', [MaterialController::class, 'search'])->name('materials.search');
Route::get('materials/{material}', [MaterialController::class, 'show'])->name('materials.show');
Route::get('materials/user/{user}', [MaterialController::class, 'user'])->name('materials.user');

// End of Material Routes










// Download Routes

Route::get('/download/papers/{paper}', [FileController::class,  'downloadPaper'])->name('download.paper');
Route::get('/download/materials/files/{file}', [FileController::class, 'downloadFile'])->name('download.materials.file');
Route::get('/download/materials/{material}', [FileController::class, 'downloadZip'])->name('download.materials.zip');

// End of Download Routes