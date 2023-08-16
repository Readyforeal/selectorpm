<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SelectionController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //Projects
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project/create', [ProjectController::class, 'store']);
    Route::get('/project/{uid}', [ProjectController::class, 'view'])->name('project.view');
    Route::get('/project/{uid}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::patch('/project/{uid}/edit', [ProjectController::class, 'update']);
    Route::delete('/project/{uid}/delete', [ProjectController::class, 'destroy']);

    //Selections
    Route::get('/project/{uid}/selections', [SelectionController::class, 'index'])->name('selections.index');
    Route::get('/project/{uid}/selection/create', [SelectionController::class, 'create'])->name('selection.create');
    Route::post('/project/{uid}/selection/create', [SelectionController::class, 'store']);
    Route::get('/project/{uid}/selection/{selectionId}', [SelectionController::class, 'view'])->name('selection.view');
    Route::get('/project/{uid}/selection/{selectionId}/edit', [SelectionController::class, 'edit'])->name('selection.edit');
    Route::patch('/project/{uid}/selection/{selectionId}/edit', [SelectionController::class, 'update']);
    Route::delete('/project/{uid}/selection/{selectionId}/delete', [SelectionController::class, 'destroy']);
});


require __DIR__.'/auth.php';
