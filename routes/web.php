<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;

//Home
Route::middleware('visitor')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/berita', [App\Http\Controllers\HomeController::class, 'berita'])->name('posts');
    Route::get('/berita/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('post');
    Route::get('/tentang-kami', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
    Route::get('/hubungi-kami', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
    Route::post('/hubungi-kami', [App\Http\Controllers\MessageController::class, 'store'])->name('message');
});

//Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticated']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//dashboard
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'Dashboard']);
    Route::get('/dashboard/posts', [PostController::class, 'index'])->name('list-posts');
    Route::get('/dashboard/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/dashboard/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/dashboard/post/{slug}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/dashboard/post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/dashboard/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/dashboard/members', [MemberController::class, 'index'])->name('members');
    Route::get('/dashboard/member/create', [MemberController::class, 'create'])->name('member.create');
    Route::post('/dashboard/member/store', [MemberController::class, 'store'])->name('member.store');
    Route::get('/dashboard/member/{id}/edit', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('/dashboard/member/{member}', [MemberController::class, 'update'])->name('member.update');
    Route::delete('/dashboard/member/{id}', [MemberController::class, 'destroy'])->name('member.destroy');

    Route::get('/dashboard/messages', [MessageController::class, 'index'])->name('messages');
    Route::delete('/dashboard/message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
    Route::get('/dashboard/messages/reset', [MessageController::class, 'reset'])->name('message.reset');
});

use Illuminate\Support\Facades\Artisan;

Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return response()->json(['message' => 'Storage link has been created.']);
});