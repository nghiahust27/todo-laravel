<?php

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\TodoController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Web\FriendController;
use App\Http\Controllers\Auth\MicrosoftController;
use App\Http\Controllers\Web\GroupController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function(){
    Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
    Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');
    Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
    Route::get('todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::put('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
    Route::get('/todos/trash', [TodoController::class, 'trash'])
    ->name('todos.trash');
    Route::patch('/todos/{id}/restore', [TodoController::class, 'restore'])
        ->name('todos.restore');
    Route::delete('/todos/{id}/force-delete', [TodoController::class, 'forceDelete'])
        ->name('todos.forceDelete');



    Route::prefix('friends')->name('friends.')->group(function(){
        Route::get('/', [FriendController::class, 'index'])->name('index');
    
        Route::get('/search', [FriendController::class, 'search'])
        ->name('search');

        Route::get('/{friendId}/todos', [FriendController::class, 'friendTodos'])
        ->name('todos');

        Route::post('/{friendId}/request', [FriendController::class, 'sendRequest'])
        ->name('request');
        
        Route::patch('/request/{requestId}/accept', 
        [FriendController::class, 'acceptRequest'])
        ->name('requests.accept');

        Route::patch('/request/{requestId}/reject', 
        [FriendController::class, 'rejectRequest'])
        ->name('requests.reject');

        Route::delete('/{friendId}/remove', [FriendController::class, 'removeFriend'])
        ->name('remove');

        Route::delete('/{requestId}/removerequest', [FriendController::class, 'removeRequest'])
        ->name('removerequest');
    });
    Route::prefix('groups')->name('groups.')->group(function(){
        Route::get('/', [GroupController::class, 'index'])
        ->name('index');

        Route::delete('/{groupId}/leave', [GroupController::class,
        'leaveGroup'])->name('leave');

        Route::get('/create', [GroupController::class, 
        'createGroup'])->name('create');

        Route::get('/join', [GroupController::class, 'showJoinForm'])
        ->name('join.form');

        Route::post('/join', [GroupController::class, 'joinGroup'
        ])->name('join');

        Route::get('/create', [GroupController::class, 'create'])
        ->name('create');

        Route::post('/create', [GroupController::class, 'createGroup'])
        ->name('store');


        Route::prefix('{groupId}/todos')->name('todos.')->group(function(){
            Route::get('/',[GroupController::class,
            'inGroupIndex'])->name('index');
            Route::get('/create', [TodoController::class,
             'createGroupTodo'])->name('create');
            Route::post('/', [TodoController::class, 'storeGroupTodo'])
            ->name('store');
            Route::get('todos/{id}/edit', [TodoController::class, 
            'editGroupTodo'])->name('edit');
            Route::put('/todos/{id}', [TodoController::class,
            'updateGroupTodo'])->name('update');
            Route::delete('/todos/{id}', [TodoController::class, 
            'destroyGroupTodo'])->name('destroy');

        });
    });
});

Route::get('/auth/google', [GoogleController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleController::class, 'callback'])
    ->name('google.callback');


Route::get('/auth/facebook', [FacebookController::class, 'redirect'])
    ->name('facebook.login');

Route::get('/auth/facebook/callback', [FacebookController::class, 'callback'])
    ->name('facebook.callback');

Route::get('/auth/microsoft', [MicrosoftController::class, 'redirect'])
    ->name('microsoft.login');

Route::get('/auth/microsoft/callback', [MicrosoftController::class, 'callback'])
    ->name('microsoft.callback');

require __DIR__.'/auth.php';
