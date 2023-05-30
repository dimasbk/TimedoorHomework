<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookControllerAPI;

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

Route::get('/books', [BookControllerAPI::class, 'index'])->name('books.index');
Route::post('/books', [BookControllerAPI::class, 'store'])->name('books.store');
Route::get('/books/{id}', [BookControllerAPI::class, 'show'])->name('books.show');
Route::put('/books/{id}/update', [BookControllerAPI::class, 'update'])->name('books.update');
Route::delete('/books/{id}/delete', [BookControllerAPI::class, 'delete'])->name('books.destroy');