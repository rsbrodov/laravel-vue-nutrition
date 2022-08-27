<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\Api\V1\DishesController;
use App\Http\Controllers\Api\V1\DishesProductsController;
use App\Http\Controllers\Api\V1\MenuController;
use App\Http\Controllers\Api\V1\MenuDishesController;
use App\Http\Controllers\Api\V1\ProductsController;
use App\Http\Controllers\CulinaryProcessings;
use App\Http\Controllers\Api\V1\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*$nameUrl = '/dishes';
$nameMethod = 'index';
$class = App\Http\Controllers\DishesController::class;*/
//Route::get($nameUrl, [$class, $nameMethod]);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/athenticated', function () {
    return true;
});


/*DISHES GROUP*/
Route::prefix('/v1/dishes')->group(function(){
    Route::get('/index', [DishesController::class, 'index']);
    Route::post('/store', [DishesController::class, 'store']);
    Route::delete('/{id}', [DishesController::class, 'destroy']);
    Route::get('/dishes-categories', [DishesController::class, 'dishesCategories']);
    Route::get('/recipes-collections', [DishesController::class, 'recipesCollections']);
    Route::get('/culinary-processings', [DishesController::class, 'culinaryProcessings']);
    Route::post('/copy-dish/{id}', [DishesController::class, 'copyDish']);
    Route::post('/one-dish/{id}', [DishesController::class, 'oneDish']);
});
/*DISHES-PRODUCTS GROUP*/
Route::prefix('v1/dishes-products')->group(function(){
    Route::post('/store', [DishesProductsController::class, 'store']);
    Route::delete('/{id}', [DishesProductsController::class, 'destroy']);
    Route::post('/products-dish/{id}', [DishesProductsController::class, 'productsDish']);
    Route::delete('/{id}', [DishesProductsController::class, 'destroy']);
});

/*PRODUCTS GROUP*/
Route::prefix('v1/products')->group(function(){
    Route::get('/', [ProductsController::class, 'index'])->middleware('auth:sanctum');
    Route::post('/store', [ProductsController::class, 'store']);
    Route::get('/products-category', [ProductsController::class, 'productsCategory']);
    Route::delete('/{id}', [ProductsController::class, 'destroy']);
});

/*MENUS GROUP*/
Route::prefix('v1/menus')->group(function(){
    Route::get('/', [MenuController::class, 'index']);
    Route::get('/first-menu', [MenuController::class, 'firstMenu']);
    Route::post('/store', [MenuController::class, 'store']);
    Route::delete('/{id}', [MenuController::class, 'destroy']);
    Route::get('/menu-characters/{id}', [MenuController::class, 'menuCharacters']);
});

/*MENUS-DISHES GROUP*/
Route::prefix('v1/menus-dishes')->group(function(){
    Route::get('/nutritions/{id}', [MenuDishesController::class, 'getNutritions']);
    Route::post('/report', [MenuDishesController::class, 'getReport']);
    Route::get('/days/{id}', [MenuDishesController::class, 'getDays']);
    Route::post('/store', [MenuDishesController::class, 'store']);
    Route::post('/index', [MenuDishesController::class, 'index']);
    Route::delete('/{id}', [MenuDishesController::class, 'destroy']);
});

/*REGISTER GROUP*/
Route::prefix('v1/register')->group(function(){
    Route::get('/roles', [RegisterController::class, 'roles']);
    Route::get('/headerlinks', [RegisterController::class, 'headerlinks']);
});

Route::get('/items', [ItemController::class, 'index']);
Route::prefix('/item')->group(function(){
    Route::post('/store', [ItemController::class, 'store']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});
