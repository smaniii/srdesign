<?php

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
    return view('info');
})->name('home');
Route::get('/history', function () {
    return view('history');
});
Route::get('/set', function () {
    return view('set');
});

Route::get('/new', 'newBatchController@newBatch');
Route::post('/set', 'newBatchController@editBatch');

Route::post('/set_info', 'InformationController@newInformation');
Route::get('/batch_id', 'InformationController@getCurrentBatchId');
Route::get('/information', 'InformationController@getInformation');