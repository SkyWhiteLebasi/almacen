<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', UserController::class)->middleware('auth');
Auth::routes();

/*Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create']);*/
Route::group(['middleware' => 'auth'], function(){
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
});
//nuevo
/*
Route::get('/producto', function () {
    return view('producto.index');
});

Route::get('/producto/create',[ProductoController::class, 'create']);*/

Route::get('/producto/add',[ProductoController::class, 'add']);

Route::resource('producto', ProductoController::class)->middleware('auth');
Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/producto', [ProductoController::class, 'index'])->name('home');
    
    });