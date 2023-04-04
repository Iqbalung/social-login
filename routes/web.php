<?php

  

use Illuminate\Support\Facades\Route;

  

use App\Http\Controllers\GithubController;
use App\Http\Controllers\TiktokController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\LinkedinController;
  

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

Route::controller(TiktokController::class)->group(function(){
    Route::get('auth/tiktok', 'redirectToTiktok')->name('auth.tiktok');
    Route::get('auth/tiktok/callback', 'handleTiktokCallback');
});

Route::controller(GithubController::class)->group(function(){
    Route::get('auth/github', 'redirectToGithub')->name('auth.github');
    Route::get('auth/github/callback', 'handleGithubCallback');
});

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

Route::controller(LinkedinController::class)->group(function(){
    Route::get('auth/linkedin', 'redirectToLinkedin')->name('auth.linkedin');
    Route::get('auth/linkedin/callback', 'handleLinkedinCallback');
});