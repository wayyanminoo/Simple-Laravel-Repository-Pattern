<?php

use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Item\ItemController;
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

//customers
Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])
        ->name('customer.index');

    Route::get('/{id}', [CustomerController::class, 'getById'])
        ->name('customer.id');

    Route::post('/create', [CustomerController::class, 'saveCustomer'])
        ->name('customer.create');

    Route::put('/update', [CustomerController::class, 'updateCustomer'])
        ->name('customer.update');

    Route::get('/search/{name}', [CustomerController::class, 'searchCustomer'])
        ->name('customer.search');

    Route::delete('/delete/{id}', [CustomerController::class, 'deleteCustomer'])
        ->name('customer.delete');
});

//items
Route::prefix('items')->group(function () {
    Route::get('/', [ItemController::class, 'index'])
        ->name('item.index');

    Route::get('/{id}', [ItemController::class, 'getById'])
        ->name('item.id');

    Route::post('/create', [ItemController::class, 'saveItem'])
        ->name('item.create');

    Route::put('/update', [ItemController::class, 'updateItem'])
        ->name('item.update');

    Route::get('/search/{name}', [ItemController::class, 'searchItem'])
        ->name('item.search');

    Route::delete('/delete/{id}', [ItemController::class, 'deleteItem'])
        ->name('item.delete');
});

//books
Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])
        ->name('book.index');

    Route::get('/{id}', [BookController::class, 'getById'])
        ->name('book.id');

    Route::post('/create', [BookController::class, 'saveBook'])
        ->name('book.create');

    Route::put('/update', [BookController::class, 'updateBook'])
        ->name('book.update');

    Route::get('/search/{name}', [BookController::class, 'searchBook'])
        ->name('book.search');

    Route::delete('/delete/{id}', [BookController::class, 'deleteBook'])
        ->name('book.delete');
});
