<?php
use Leazycms\Simpel\Controllers\WebController;
use Illuminate\Support\Facades\Route;
Route::get('/', [WebController::class, 'index']);
