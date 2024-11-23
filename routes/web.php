<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testTemplate', function () {
    return view('panel.layout.app');
});

Route::get('/panel/tasks/create', [TaskController::class,'createPage'])->name('panel.CreateTaskPage');
Route::post('/panel/tasks/add', [TaskController::class,'addTask'])->name('panel.addTask');

