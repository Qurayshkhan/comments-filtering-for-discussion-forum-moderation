<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicController;
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



Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'users'])->name('users');
    Route::post('/add-ban', [UserController::class, 'addBan'])->name('user.ban');
    Route::get('/remove-ban/{userId}', [UserController::class, 'removeBan'])->name('user.remove.ban');
    Route::post('/changes-status/{userId}', [UserController::class, 'statusChange'])->name('user.changes.status');
    Route::post('/add-moderators', [UserController::class, 'storeModerator'])->name('admin.add.moderators');
});
Route::prefix('normal_user')->middleware('auth')->group(function () {
    Route::get('/create-topic', [TopicController::class, 'create'])->name('create.topic');
    Route::post('/store-topic', [TopicController::class, 'storeTopic'])->name('store.topic');
    Route::get('/topic/details/{topic}', [TopicController::class, 'details'])->name('topic.details');
    Route::post('/topic/comment', [TopicController::class, 'storeComment'])->name('store.comment');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
