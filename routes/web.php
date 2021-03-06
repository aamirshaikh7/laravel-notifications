<?php

use Illuminate\Support\Facades\Route;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserSubscribed;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/subscribe', function () {
    return view('subscribe');
})->name('subscribe.create');

Route::middleware(['auth:sanctum', 'verified'])->post('/subscribe', function () {
    $subscriber = new Subscriber();

    $subscriber->name = request()->user()->name;
    $subscriber->email = request()->user()->email;

    $subscriber->save();

    // Notification::send(request()->user(), new UserSubscribed());

    request()->user()->notify(new UserSubscribed('abc channel'));

    \App\Events\UserSubscribed::dispatch('abc');
    
    // event(new UserSubscribed('abc'));

    // return redirect(route('subscribe.create'))->with('message', 'You are now subscribed !');
})->name('subscribe.store');

Route::middleware(['auth:sanctum', 'verified'])->get('/notifications', function () {
    return view('notifications', ['unreadNotifications' => tap(auth()->user()->unreadNotifications)->markAsRead(), 'readNotifications' => auth()->user()->readNotifications]);
})->name('notifications.index');