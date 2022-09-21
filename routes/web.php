<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/teams', \App\Http\Livewire\Teams::class)->name('teams');


    Route::prefix('admin')->group( function () {
        Route::get('/employees', \App\Http\Livewire\Admin\Employees\ListEmployees::class)->name('employees.list');
        Route::get('/employees/create', \App\Http\Livewire\Admin\Employees\CreateEmployee::class)->name('employees.create');
    });

    Route::prefix('imports')->group( function () {
        Route::get('talkdesk', \App\Http\Livewire\Imports\Talkdesk::class)->name('talkdesk');
    });

    Route::prefix('reports')->group(function () {
        Route::get('/', \App\Http\Livewire\Reports\ListReports::class)->name('reports');
    });
});


