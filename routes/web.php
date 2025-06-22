<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilièreController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ÉtudiantController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SéanceController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\Auth\CustomAuthController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

    
// Protected resource 
Route::middleware('auth')->group(function () {
  
    Route::get('/', function () { return view('home.dashboard'); })->name('dashboard');
    Route::resource('filieres', FilièreController::class);
    Route::resource('classes', ClasseController::class);
    Route::resource('etudiants', ÉtudiantController::class);
    Route::resource('modules', ModuleController::class);
    Route::resource('seances', SéanceController::class);
    Route::resource('absences', AbsenceController::class);
    Route::get('seances/{id}/pdf', [SéanceController::class, 'downloadPdf'])->name('seances.pdf');
});

// Custom authentication routes
Route::get('/login', function () {
    return view('authentication.login');
})->name('login')->middleware('guest');

Route::post('/login', [CustomAuthController::class, 'login'])->name('login.attempt');

Route::get('/register', function () {
    return view('authentication.register');
})->name('register')->middleware('guest');

Route::post('/register', [CustomAuthController::class, 'register'])->name('register.attempt');

Route::get('/logout', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
