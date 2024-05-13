<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\StepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/content1', [ContentController::class, 'content1'])->name('content1');
Route::get('/content2', [ContentController::class, 'content2'])->name('content2');

Route::get('/content2/step1', [ContentController::class, 'content2Step1'])->name('content2.step1');
Route::get('/content2/step2', [ContentController::class, 'content2Step2'])->name('content2.step2');
