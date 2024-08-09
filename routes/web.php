<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return redirect()->route('todos.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('todos/index', [TodoController::class, 'index'])->name('todos.index');
    Route::get('todos/create', [TodoController::class, 'create'])->name('todos.create');
    Route::post('todos/store', [TodoController::class, 'store'])->name('todos.store');
    
    Route::get('todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::put('todos/update', [TodoController::class, 'update'])->name('todos.update');
    
    Route::delete('todos/{id}/destroy', [TodoController::class, 'destroy'])->name('todos.destroy');

    // Route::delete('todos/destroy', [TodoController::class, 'destroy'])->name('todos.destroy');
    


});


require __DIR__.'/auth.php';
