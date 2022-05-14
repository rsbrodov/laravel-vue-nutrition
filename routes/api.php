<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\DishesController;
use App\Http\Controllers\DishesProductsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuDishesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CulinaryProcessings;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RegisterController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/athenticated', function () {
    return true;
});

Route::get('/items', [ItemController::class, 'index']);
Route::prefix('/item')->group(function(){
    Route::post('/store', [ItemController::class, 'store']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
});


Route::get('/chats', [ChatController::class, 'index']);
Route::prefix('/chat')->group(function(){
    Route::post('/store', [ChatController::class, 'store']);
});


$nameUrl = '/dishes';
$nameMethod = 'index';
$class = App\Http\Controllers\DishesController::class;
Route::get($nameUrl, [$class, $nameMethod]);
Route::prefix('/dishes')->group(function(){
    Route::post('/store', [DishesController::class, 'store']);
    Route::delete('/{id}', [DishesController::class, 'destroy']);
    Route::get('/dishes-categories', [DishesController::class, 'dishesCategories']);
    Route::get('/recipes-collections', [DishesController::class, 'recipesCollections']);
    Route::get('/culinary-processings', [DishesController::class, 'culinaryProcessings']);
    Route::post('/copy-dish/{id}', [DishesController::class, 'copyDish']);
    Route::post('/one-dish/{id}', [DishesController::class, 'oneDish']);
});

Route::prefix('/dishes-products')->group(function(){
    Route::post('/store', [DishesProductsController::class, 'store']);
    Route::delete('/{id}', [DishesProductsController::class, 'destroy']);
    Route::post('/products-dish/{id}', [DishesProductsController::class, 'productsDish']);
});
Route::get('/products', [ProductsController::class, 'index'])->middleware('auth:sanctum');
Route::post('/products/store', [ProductsController::class, 'store']);
Route::get('/register/roles', [RegisterController::class, 'roles']);
Route::get('/register/headerlinks', [RegisterController::class, 'headerlinks']);
Route::get('/products/products-category', [ProductsController::class, 'productsCategory']);
Route::delete('/products/{id}', [ProductsController::class, 'destroy']);

Route::get('/menus', [MenuController::class, 'index']);
Route::get('/menus/first-menu', [MenuController::class, 'firstMenu']);
Route::post('/menus/store', [MenuController::class, 'store']);
Route::delete('/menus/{id}', [MenuController::class, 'destroy']);
Route::get('/menus/menu-characters/{id}', [MenuController::class, 'menuCharacters']);
Route::post('/dishes-products/store', [DishesProductsController::class, 'store']);
Route::delete('/{id}', [DishesProductsController::class, 'destroy']);

Route::get('menus-dishes/nutritions/{id}', [MenuDishesController::class, 'getNutritions']);
Route::post('menus-dishes/report', [MenuDishesController::class, 'getReport']);
Route::get('menus-dishes/days/{id}', [MenuDishesController::class, 'getDays']);
Route::post('/menus-dishes/store', [MenuDishesController::class, 'store']);
Route::post('/menus-dishes/index', [MenuDishesController::class, 'index']);
Route::delete('/menus-dishes/{id}', [MenuDishesController::class, 'destroy']);
