<?php

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

// Route::get('/', function () {
//     return view('admin.login');
// });

Route::get('/login', function () {
    return view('admin.login');
});

Route::get('/login', ['as' => 'login', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\LoginController@index']);
Route::post('/submitLogin', ['as' => 'submitLogin', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\LoginController@submitLogin']);

// ================================================
Route::group(['middleware' => ['admin']], function () {
    Route::get('/dashboard', ['as' => '/dashboard', 'uses' => 'App\Http\Controllers\Admin\Dashboard\DashboardController@index']);
    Route::get('/list-users', ['as' => 'list-users', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@index']);
    Route::get('/add-users', ['as' => 'add-users', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@addUsers']);
    Route::post('/add-users', ['as' => 'add-users', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@register']);
    Route::get('/edit-users/{edit_id}', ['as' => 'edit-users', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@editUsers']);
    Route::post('/update-users', ['as' => 'update-users', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@update']);
    Route::post('/delete-users', ['as' => 'delete-users', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@delete']);
    Route::post('/show-users', ['as' => 'show-users', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@show']);
    Route::get('/cities', ['as' => 'cities', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@getCities']);
    Route::get('/states', ['as' => 'states', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@getState']);
    Route::get('/check-email-exists', ['as' => 'check-email-exists', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@checkEmailExists']);

    // Route::post('/update-active-user', ['as' => 'update-active-user', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@updateOne']);
    // Route::get('/prof', ['as' => 'prof', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@getProf']);

    // Route::get('/edit-user-profile', ['as' => 'edit-user-profile', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@editUsersProfile']);

    // Route::post('/update-user-profile', ['as' => 'update-user-profile', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@updateProfile']);

    // Route::post('/otp-verification', ['as' => 'otp-verification', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\RegisterController@updateEmailOtp']);
    

    // Landing Start================

    // Route::get('/list-landing-slide', ['as' => 'list-landing-slide', 'uses' => 'App\Http\Controllers\Admin\Landing\LandingSliderController@index']);
    // Route::get('/add-landing-slide', ['as' => 'add-landing-slide', 'uses' => 'App\Http\Controllers\Admin\Landing\LandingSliderController@add']);
    // Route::post('/add-landing-slide', ['as' => 'add-landing-slide', 'uses' => 'App\Http\Controllers\Admin\Landing\LandingSliderController@store']);
    // Route::get('/edit-landing-slide/{edit_id}', ['as' => 'edit-landing-slide', 'uses' => 'App\Http\Controllers\Admin\Landing\LandingSliderController@edit']);
    // Route::post('/update-landing-slide', ['as' => 'update-landing-slide', 'uses' => 'App\Http\Controllers\Admin\Landing\LandingSliderController@update']);
    // Route::post('/show-landing-slide', ['as' => 'show-landing-slide', 'uses' => 'App\Http\Controllers\Admin\Landing\LandingSliderController@show']);
    // Route::post('/delete-landing-slide', ['as' => 'delete-landing-slide', 'uses' => 'App\Http\Controllers\Admin\Landing\LandingSliderController@destroy']);
    // Route::post('/update-active-landing-slide', ['as' => 'update-active-landing-slide', 'uses' => 'App\Http\Controllers\Admin\Landing\LandingSliderController@updateOne']);
    
// Route::get('/db-backup', ['as' => 'db-backup', 'uses' => 'App\Http\Controllers\DBBackup\DBBackupController@downloadBackup']);
Route::get('/log-out', ['as' => 'log-out', 'uses' => 'App\Http\Controllers\Admin\LoginRegister\LoginController@logout']);

});
