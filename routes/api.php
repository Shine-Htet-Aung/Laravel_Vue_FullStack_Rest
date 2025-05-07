<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('contacts', [ContactController::class, 'contacts']);
Route::post('contacts', [ContactController::class, 'store']);
Route::delete('contacts/{id}', [ContactController::class, 'destroy']);
Route::get('contacts/{id}', [ContactController::class, 'show']);  
Route::put('contacts/{id}',[ContactController::class, 'update']);


