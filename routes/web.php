<?php

use App\Http\Controllers\PollingUnitController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/Polling-Unit-Results', [PollingUnitController::class , 'view_page'])->name('view-polling-units-results');

Route::get('/get_announced_pu_results/{uniqueid}',[PollingUnitController::class,'get_results'])
    ->name('get-announced-pu-results-unique-id');

Route::get('/get_all_results_view',[PollingUnitController::class,'all_results_view'])
    ->name('get-all-results_view');

Route::post('/results',[PollingUnitController::class,'results'])
    ->name('results');

Route::get('/save_page',[PollingUnitController::class,'save_page'])
    ->name('save-results-page');

Route::post('/save',[PollingUnitController::class,'save'])
    ->name('save-results');


