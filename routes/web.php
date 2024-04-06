<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\patrimoineController;
use App\Http\Middleware\admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\mainController;
use App\Http\Controllers\UserController;


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
Route::get('/test-db', function () {
    $results = DB::select('select * from users');
    dd($results); // Output the results to the browser
});
Route::get('/', function () {
    return view('welcome');
});
//Route::get('/loginForm', [AuthController::class, 'DoLogin'])->name('loginForm');
//Route::get('/loginForm', [AuthController::class, 'login'])->name('loginForm');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'DoLogin'])->name('dologin');
/*Route::get('/main', function () {
    return view ('main');
})->name('main');*/


//Route::get('/main', [AuthController::class, 'adminRedirect'])->name('main');
Route::get('/main', [AuthController::class, 'adminRedirect'])
    ->name('main')
    ->middleware(admin::class . ':admin');
//Route::get('/userMain', [AuthController::class, 'userRedirect'])->name('main');
Route::get('/userMain', [AuthController::class, 'userRedirect'])
    ->name('main')
    ->middleware(admin::class . ':user');

// For the user main dashboard
Route::post('/storeUser', [UserController::class, 'storeUser'])->name('storeUser');
Route::get('/showUser', [UserController::class, 'showUsers'])->name('showUsers');

Route::get('/addUser', [UserController::class, 'addUser'])->name('addUser');
//Route::post('/storeUser', [UserController::class, 'storeUser'])->name('storeUser');
Route::get('/modifyUser', [UserController::class, 'modifyUser'])->name('modifyUser');
Route::post('/modifyUserSubmit', [UserController::class, 'modifyUserSubmit'])->name('modifyUserSubmit');

Route::post('/storeNewUser', [UserController::class, 'storeNewUser'])->name('storeNewUser');
Route::post('/addPatrimoine', [patrimoineController::class, 'addPatrimoine'])->name('addPatrimoine');

//Route::post('/submit-form', [UserController::class, 'submitForm'])->name('submitForm');
Route::post('/users/{idUser}/update', [UserController::class, 'submitForm'])->name('submitForm');
Route::post('/users/{idUser}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');
Route::get('/showPatrimoine', [patrimoineController::class, 'showPatrimoine'])->name('showPatrimoine');


Route::post('/patrimoine/{idMateriel}/update', [patrimoineController::class, 'submitFormP'])->name('submitFormP');
Route::post('/patrimoine/{idMateriel}/delete', [patrimoineController::class, 'deletePat'])->name('deletePat');
Route::post('/patrimoine/{idMateriel}/reformer', [patrimoineController::class, 'reformer'])->name('reformer');
Route::post('/patrimoine/{idMateriel}/vendre', [patrimoineController::class, 'vendre'])->name('vendre');
Route::post('/patrimoine/{idMateriel}/transfert', [patrimoineController::class, 'transfert'])->name('transfert');





