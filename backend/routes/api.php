<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BuyItemController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/** UserController */
Route::get('user_index', [UserController::class, 'index']);
Route::post('user_find_by_id', [UserController::class, 'findById']);
Route::post('user_store', [UserController::class, 'store']);
Route::post('user_update', [UserController::class, 'update']);
Route::delete('user_delete', [UserController::class, 'delete']);
Route::post('user_login', [UserController::class, 'login']);

/** BuyItemController */
Route::get('buy_item_index', [BuyItemController::class, 'index']);
Route::post('buy_item_find_by_id', [BuyItemController::class, 'findById']);
Route::post('buy_item_store', [BuyItemController::class, 'store']);
Route::post('buy_item_update', [BuyItemController::class, 'update']);
Route::delete('buy_item_delete', [BuyItemController::class, 'delete']);

/** ProductController */
Route::get('product_index/{supplier}', [ProductController::class, 'index']);
Route::post('product_search_by_id', [ProductController::class, 'searchById']);