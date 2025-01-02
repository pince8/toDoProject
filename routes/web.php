<?php

use App\Http\Controllers\CategoryController;
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
// task routleraı
Route::get('/panel/tasks/create', [TaskController::class,'createPage'])->name('panel.CreateTaskPage');
Route::post('/panel/tasks/add', [TaskController::class,'addTask'])->name('panel.addTask');
Route::get('/panel/tasks/index', [TaskController::class,'indexPage'])->name('panel.indexTask');
//end


//kategori routes start
//kategori listesi
Route::get('/panel/categories/index',[CategoryController::class,'index'])->name('panel.categoryIndex');
//kategori oluşturma
Route::get('/panel/categories/createPage',[CategoryController::class,'createPage'])->name('panel.categoryCreatePage');

Route::post('/panel/categories/addCategory',[CategoryController::class,'postCategory'])->name('panel.categoryAdd');
Route::get('/panel/categories/update/{id}',[CategoryController::class, 'updatePage'])->name('panel.categoryUpdatePage');
Route::post('/panel/category/updatePost',[CategoryController::class,'updateCategory'])->name('panel.updateCategory');
//parametreli form post
Route::post('/panel/category/updatePostTest/{id}',[CategoryController::class,'updateCategoryTest'])->name('panel.updateCategoryTest');
Route::get('/panel/category/deleteCategory/{id}',[CategoryController::class,'categoryDelete'])->name('panel.categoryDelete');
//kategori routes end


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
