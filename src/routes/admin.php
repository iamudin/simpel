<?php
use Leazycms\Simpel\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
$path = 'simpel';
Route::prefix($path)->group(function()use($path){
    Route::get('dashboard', [AdminController::class, 'index'])->name($path.'.dashboard');
    Route::get('permohonan', [AdminController::class, 'index'])->name($path.'.penduduk');
});
Route::get('simpel',function()use($path){
    return to_route($path.'.dashboard');
 });
