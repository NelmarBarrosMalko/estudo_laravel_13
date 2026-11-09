<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PageController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sobre', [PageController::class, 'about'])->name('about');

Route::get('/contato', [PageController::class, 'contact'])->name('contact');



