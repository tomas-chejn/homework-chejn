<?php

use App\Http\Controllers\Task1Controller;
use App\Http\Controllers\Task2Controller;
use App\Http\Controllers\Task3Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/task/1', [Task1Controller::class, 'page']);

Route::get('/task/2', [Task2Controller::class, 'data']);

Route::get('/task/3/a', [Task3Controller::class, 'taskA'])->name('get.taskA');
Route::post('/task/3/a', [Task3Controller::class, 'taskA'])->name('post.taskA');

Route::get('/task/3/b', [Task3Controller::class, 'taskB'])->name('get.taskB');
Route::post('/task/3/b', [Task3Controller::class, 'taskB'])->name('post.taskB');
