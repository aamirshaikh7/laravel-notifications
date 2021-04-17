<?php

use Illuminate\Support\Facades\Route;
use App\Models\Subscriber;

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

    return redirect(route('subscribe.create'))->with('message', 'You are now subscribed !');
})->name('subscribe.store');