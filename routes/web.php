<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
//    Route::get('/sesi', [\App\Http\Controllers\Sesis::class, 'index'])->name('sesi');
//    Route::get('/create', [\App\Http\Controllers\Sesis::class, 'create'])->name('sesi.create');
//    Route::post('/create/save', [\App\Http\Controllers\Sesis::class, 'store'])->name('sesi.store');
    Route::resource('/sesi', App\Http\Controllers\Sesis::class);
//    Route::post('/sesi/create', [App\Livewire\Sesis\Create::class, 'store'])->name('sesi.store');
//    Route::get('/sesi/create', App\Livewire\Sesis\Create::class)->name('sesi.create');

});
//Route::get('/sesi', function (){
//    return view('livewire.sesis.index');
//})->name('sesi');
