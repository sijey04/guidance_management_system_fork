
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/student', StudentController::class); // Correct usage of Route::resource
    // ... rest of your routes ...
});
// // Student List,Create,edit
// Route::resource('/student',[StudentController::class, 'index'])
// ->middleware(['auth', 'verified'])->name('student');

// Route::get('/student/create',[StudentController::class, 'create'])
// ->middleware(['auth', 'verified'])->name('student.create');

// Route::post('/student',[StudentController::class, 'store'])
// ->middleware(['auth', 'verified'])->name('student.store');


Route::get('/contract', function () {
    return view('contracts.contract');
})->middleware(['auth', 'verified'])->name('contract');

Route::get('/referral', function () {
    return view('referrals.referral');
})->middleware(['auth', 'verified'])->name('referral');

Route::get('/counseling', function () {
    return view('counseling.counseling');
})->middleware(['auth', 'verified'])->name('counseling');

Route::get('/report', function () {
    return view('reports.report');
})->middleware(['auth', 'verified'])->name('report');

Route::get('/setup', function () {
    return view('setting.setup');
})->middleware(['auth', 'verified'])->name('setup');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';