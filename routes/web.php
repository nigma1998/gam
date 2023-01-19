<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ButtonController;
use App\Http\Controllers\NpsController;
use App\Http\Controllers\ChatController; 
use App\Http\Controllers\AmbulanceController; 
use App\Http\Controllers\ButtonparkController; 
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProbaController;
use App\Http\Controllers\AmbulancController;
use App\Http\Controllers\CanteenController;
use App\Http\Controllers\BonusController;
use App\Http\Controllers\PharmaceuticalsController;
use App\Http\Controllers\DiamondController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\Admin\MedicinesController as AdminMedicinesController;
use App\Http\Controllers\Admin\DrinksController as AdminDrinksController;
use App\Http\Controllers\Admin\BonusController as AdminBonusController;
use App\Http\Controllers\Admin\DishController as AdminDishController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\GlobalController as AdminGlobalController;
use App\Http\Controllers\Admin\NpsController as AdminNpsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\SchablonController as AdminSchablonControllerController;

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
//подключение домашней страницы игрока
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//подключение скорой помощи
Route::get('/ambulance', [App\Http\Controllers\AmbulanceController::class, 'index'])->name('ambulance');


//подключение админки
Auth::routes();
Route::group(['prefix' => 'admins', 'as' => 'admin.'], function(){
Route::resource('global', AdminGlobalController::class);
Route::resource('bonus', AdminBonusController::class);
Route::resource('product', AdminProductController::class);
Route::resource('nps', AdminNpsController::class);
Route::resource('drinks', AdminDrinksController::class);
Route::resource('medicines', AdminMedicinesController::class);
Route::resource('dish', AdminDishController::class);
Route::resource('users', AdminUserController::class);
Route::resource('schablon', AdminSchablonControllerController::class);
});
//подключение кухни
Route::group(['prefix' => 'canteen', 'as' => 'canteen.'], function(){
Route::resource('canteen', CanteenController::class);
});
//подключение чата
Route::group(['prefix' => 'chat', 'as' => 'chat.'], function () {
  Route::resource('chat', ChatController::class);
});
//подключение автопарка
Route::group(['prefix' => 'ambulance', 'as' => 'ambulance.'], function () {
  Route::resource('ambulance', AmbulancController::class);
  Route::resource('buttonpark', ButtonparkController::class);
});
  //подключение склада
  Route::group(['prefix' => 'stock', 'as' => 'stock.'], function(){
  Route::resource('stock', StockController::class);
  });
  //подключение формацевтики
  Route::group(['prefix' => 'pharmaceuticals', 'as' => 'pharmaceuticals.'], function(){
  Route::resource('pharmaceuticals', PharmaceuticalsController::class);
  Route::resource('bonus', BonusController::class);
  });



//подключение палат
Route::group(['prefix' => 'gem', 'as' => 'gem.'], function(){
Route::resource('gem', CartController::class);
Route::resource('nonesk', NpsController::class);
Route::resource('taim', TimController::class);
Route::resource('proba', ProbaController::class);
Route::resource('button', ButtonController::class);
Route::resource('diamond', DiamondController::class);
  });



Route::resource('view', ViewController::class);
