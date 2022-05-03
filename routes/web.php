<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::post('/store_event', 'HomeController@store_event')->name('store_event');
    Route::post('/update_event', 'HomeController@update_event')->name('update_event');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/delete/{id}', 'HomeController@delete')->name('delete');
    Route::get('/edit/{id}', 'HomeController@edit')->name('edit');
    Route::get('/view/{id}', 'HomeController@view')->name('view');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/addEvent',  function () {
    return view('addEvent');
})->middleware(['auth'])->name('addEvent');



require __DIR__.'/auth.php';
