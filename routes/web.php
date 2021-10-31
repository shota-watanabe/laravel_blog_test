<?php

use Illuminate\Support\Facades\Route;
use Tests\Feature\Controllers\BlogViewControllerTest;
use App\Http\Controllers\BlogViewController;

Route::get('/', [BlogViewController::class, 'index']);
Route::get('blogs/{blog}', [BlogViewController::class, 'show']);
