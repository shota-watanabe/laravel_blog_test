<?php

use Illuminate\Support\Facades\Route;
use Tests\Feature\Controllers\BlogViewControllerTest;
use App\Http\Controllers\BlogViewController;
use App\Http\Controllers\SignUpController;

Route::get('/', [BlogViewController::class, 'index']);
Route::get('blogs/{blog}', [BlogViewController::class, 'show']);
Route::get('signup', [SignUpController::class, 'index']);
Route::post('signup', [SignUpController::class, 'store']);
