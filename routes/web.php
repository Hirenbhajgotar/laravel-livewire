<?php

use App\Comment;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('comments', function() {
    // $comments = Comment::latest()->get();
    // return view('comments.index', compact('comments'));
    return view('comments.index');
})->name('comments');

