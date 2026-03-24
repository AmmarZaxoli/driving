<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\Print_backPageController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\AdminLogin;
use Illuminate\Support\Facades\Auth;

// 1. لاپەڕەی سەرەکی
Route::get('/', function () {
    return view('first.create');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes (Login)
|--------------------------------------------------------------------------
| لێرەدا میدڵوێری 'is.logged' بەکاردێنین بۆ ئەوەی ئەگەر یوزەر لۆگین بێت
| بە هیچ شێوەیەک (URL یان Back) نەتوانێت ئەم لاپەڕانە ببینێت.
*/

Route::middleware(['is.logged'])->group(function () {
    // لۆگینی ئەدمین
    Route::get('/admin/login', AdminLogin::class)->name('admin.login');

    // لۆگینی درایڤەر (Coach)
    Route::get('/login', Login::class)->name('login');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:admin', 'prevent-back'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('layouts.index');
    })->name('admin.dashboard');

    Route::view('/dashboard', 'dashboard.create')->name('dashboard');
    Route::view('/learntype', 'learntype.create')->name('learntype');
    Route::view('/student', 'student.create')->name('student');
    Route::view('/student/absent', 'student.absent')->name('studentAbsent');
    Route::view('/coach', 'coach.create')->name('coach');
    Route::view('/nationality', 'nationality.create')->name('nationality');
    Route::view('/cart', 'cart.create')->name('cart');
    Route::view('/studentwrite', 'studentwrite.create')->name('studentwrite');
    Route::view('/teacher', 'techer.create')->name('techer');
    Route::view('/student/addtoclass', 'student.addtoclass')->name('addToClass');
    Route::view('/student/writeing', 'student.writeing')->name('writeing');
    // Printing Routes
    Route::get('/students/print/{id}', function ($id) {
        $student = Student::with('coach', 'nationality')->findOrFail($id);
        return view('student.print', compact('student'));
    });

    Route::get('/print/selected-students/{ids}', [PrintController::class, 'printSelectedStudents'])->name('print.selected-students');
    Route::get('/print/selectedstudentsBackPage/{ids}', [Print_backPageController::class, 'printSelectedStudents'])->name('print.selectedstudentsBackPage');
});

/*
|--------------------------------------------------------------------------
| Driver (Coach) Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:coach', 'prevent-back'])->group(function () {
    Route::get('/driverlayout', function () {
        return view('layouts.indexdriver');
    })->name('indexdriver');

    Route::view('/driver/learntime', 'driver.create')->name('driverlearntime');
});

/*
|--------------------------------------------------------------------------
| Logout Logic
|--------------------------------------------------------------------------
*/

// دەرکەوتنی ئەدمین
Route::post('/admin/logout', function () {
    Auth::guard('admin')->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('admin.login');
})->name('admin.logout');

// دەرکەوتنی درایڤەر
Route::post('/driver/logout', function () {
    Auth::guard('coach')->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('login');
})->name('driver.logout');
