<?php

use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Item\ItemController;
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

Route::get('/', function () {
    return view('welcome');
});

//customers
Route::get('/customers', [CustomerController::class, 'index'])
    ->name('customer.index');

Route::get('/customers/{id}', [CustomerController::class, 'getById'])
    ->name('customer.id');

Route::get('/customers/search/{name}', [CustomerController::class, 'searchCustomer'])
    ->name('customer.search');

//items
Route::get('/items', [ItemController::class, 'index'])
    ->name('item.index');

Route::get('/items/{id}', [ItemController::class, 'getById'])
    ->name('item.id');

Route::get('/items/search/{name}', [ItemController::class, 'searchItem'])
    ->name('item.search');

//books
Route::get('/books', [BookController::class, 'index'])
    ->name('book.index');

Route::get('/books/{id}', [BookController::class, 'getById'])
    ->name('book.id');

Route::get('/books/search/{name}', [BookController::class, 'searchBook'])
    ->name('book.search');
