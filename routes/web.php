
<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SemesterController;
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
    Route::resource('/semester', SemesterController::class);
  // Tabs for the Student Detail Page
    Route::get('/students/{id}/profile', [StudentController::class, 'profile'])->name('students.profile');
    Route::get('/students/{id}/enrollment', [StudentController::class, 'showEnrollmentHistory'])->name('students.enrollment');
    Route::get('/students/{id}/contract', [StudentController::class, 'contract'])->name('students.contract');
    Route::get('/students/{id}/referral', [StudentController::class, 'showEnrollmentHistory'])->name('students.referral');
//Route::get('/students/{id}/contracts', [StudentController::class, 'show']);
Route::get('/students/{student}/contracts/create', [ContractController::class, 'createForStudent'])->name('student.createContract');


    // Enrollment and Unenrollment routes
    Route::post('/students/{student}/enroll/{semester}', [StudentController::class, 'enroll'])->name('students.enroll');
    Route::post('/students/{student}/unenroll/{semester}', [StudentController::class, 'unenroll'])->name('students.unenroll');
    // Contract creation specific to student
Route::post('/contracts', [ContractController::class, 'store'])->name('contracts.store');

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