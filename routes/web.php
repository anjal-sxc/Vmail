<?php

use App\Inbox;
use Illuminate\Support\Facades\Auth;
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

Route::get('phpinfo', function () {
    echo get_cfg_var('cfg_file_path');
    echo phpinfo();
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/dashboard/compose', 'HomeController@compose')->name('compose');
    Route::post('/dashboard/compose', 'SentController@store');

    Route::get('/dashboard/sent', 'SentController@index')->name('sent');
    Route::post('/dashboard/sent', 'SentController@destroy')->name('sent');
    Route::get('/dashboard/sent/{id}', 'SentController@show');

    Route::get('/dashboard/inbox', 'InboxController@index')->name('inbox');
    Route::post('/dashboard/inbox', 'InboxController@destroy')->name('inbox');
    Route::get('/dashboard/inbox/{id}', 'InboxController@show');

    Route::get('/dashboard/trash', 'TrashController@index')->name('trash');
    Route::post('/dashboard/trash', 'TrashController@update')->name('trash');

});


