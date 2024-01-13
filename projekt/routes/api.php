<?php

use App\Http\Controllers\Api\CRUD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('Rabenda/310710/people', [CRUD::class, 'index']);
Route::post('Rabenda/310710/people', [CRUD::class, 'create']);
Route::get('Rabenda/310710/people/{id}', [CRUD::class, 'show']);
Route::get('Rabenda/310710/people/{id}/edit', [CRUD::class, 'edit']);
Route::put('Rabenda/310710/people/{id}/edit', [CRUD::class, 'update']);
Route::delete('Rabenda/310710/people/{id}/delete', [CRUD::class, 'destroy']);