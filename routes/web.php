<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Models\Item;

Route::get('/', [ItemController::class, 'show']);
Route::post('/delete/{id}', [ItemController::class, 'delete']);
