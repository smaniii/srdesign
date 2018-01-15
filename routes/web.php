<?php
use App\batchInfo;
use App\inputInfo;
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
    return view('info',['current_batch'=>batchInfo::all()->last(),'current_information'=>inputInfo::all()->last()]);
})->name('home');
Route::get('/history', function () {
    return view('history',['batches'=>batchInfo::all(),'information_inputs'=>inputInfo::all()]);
});
Route::get('/set', function () {
    return view('set');
});

Route::get('/new', 'newBatchController@newBatch');
Route::post('/set', 'newBatchController@editBatch');

Route::post('/set_info', 'InformationController@newInformation');
Route::get('/batch_id', 'InformationController@getCurrentBatchId');
Route::get('/information', 'InformationController@getInformation');