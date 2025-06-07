<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admain\AdmainController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\PostActionsController;
use App\Http\Controllers\PostController;

// Routes for main pages
Route::get('/', [MainController::class, 'index'])->name('index');

Route::middleware('auth','verified')->group(function () {
    Route::resource('/profile', ProfileController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/comment', CommentController::class);
    Route::post('/CommentLove/add',[CommentController::class, 'addLove'])->name('comment.addLove');
    Route::post('/CommentLove/delete',[CommentController::class, 'deleteLove'])->name('comment.deleteLove');
    Route::post('/CommentReply/create',[CommentController::class, 'createReply'])->name('comment.createReply');
    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
    Route::post('/conversations', [ConversationController::class, 'show'])->name('conversations.show');
    Route::get('/allNotifications', [NotifyController::class, 'all_notifications'])->name('all_notifications');
    Route::get('/readNotify/{id}', [NotifyController::class, 'read_notify'])->name('read_notify');
    Route::post('/follow/add',[FollowController::class, 'add'])->name('follow.add');
    Route::post('/follow/delete',[FollowController::class, 'delete'])->name('follow.delete');
});

// Authentication routes
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
