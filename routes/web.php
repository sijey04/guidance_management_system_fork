
<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\CounselingController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentProfileController;
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
    Route::get('/students/{id}/counseling', [StudentController::class, 'counseling'])->name('students.counseling');
    Route::get('/students/{id}/contract', [StudentController::class, 'contract'])->name('students.contract');
    Route::get('/students/{id}/referral', [StudentController::class, 'showEnrollmentHistory'])->name('students.referral');
//Route::get('/students/{id}/contracts', [StudentController::class, 'show']);
    Route::get('/students/{student}/contracts/create', [ContractController::class, 'createForStudent'])->name('student.createContract');

// enroll-unenroll-delete all
    Route::post('/students/enroll-all', [StudentController::class, 'enrollAll'])->name('students.enrollAll');
    Route::post('/students/unenroll-all', [StudentController::class, 'unenrollAll'])->name('students.unenrollAll');
    Route::delete('/students/delete-all', [StudentController::class, 'deleteAll'])->name('students.deleteAll');

// Enrollment and Unenrollment routes
    Route::post('/students/{student}/enroll/{semester}', [StudentController::class, 'enroll'])->name('students.enroll');
    Route::post('/students/{student}/unenroll/{semester}', [StudentController::class, 'unenroll'])->name('students.unenroll');
// Contract creation specific to student
    Route::post('/contracts', [ContractController::class, 'store'])->name('contracts.store');
    Route::get('/contracts', [ContractController::class, 'index'])->name('contracts.contract');

    Route::get('/contracts', [ContractController::class, 'allContracts'])->name('contracts.index');
    Route::get('/contracts/create', [ContractController::class, 'create'])->name('contracts.create');

    Route::get('/students/{student}/counseling/create', [CounselingController::class, 'create'])
    ->name('students.createCounseling');
    Route::post('/store', [CounselingController::class, 'store'])->name('counseling.store');

Route::put('/student/profile/{student}', [StudentController::class, 'updateProfile'])->name('student.profile.update');

Route::get('/report', [ReportController::class, 'index'])->middleware(['auth', 'verified'])->name('report');

  Route::get('/reports/student-list', [ReportController::class, 'studentList'])->name('reports.studentList');
Route::get('/reports/student-history/{student}', [ReportController::class, 'studentHistory'])->name('reports.studentHistory');
Route::get('/reports/view-profile/{studentId}/{semesterId}', [ReportController::class, 'viewProfile'])->name('reports.viewProfile');
Route::get('/reports/student-history/{studentId}', [ReportController::class, 'studentFullHistory'])->name('reports.studentFullHistory');
Route::get('/reports', [ReportController::class, 'report'])->name('reports.report');
Route::get('/reports/student-history/{student_id}', [ReportController::class, 'studentHistory'])->name('reports.student-history');
Route::get('/contracts/{contract}/view', [ContractController::class, 'view'])->name('contracts.view');

Route::get('/student/{studentId}/profile/{profileId}', [StudentController::class, 'viewProfile'])
     ->name('student.viewProfile');
Route::get('/student/{id}/enrollment', [StudentController::class, 'enrollmentHistory'])->name('student.enrollment');
Route::get('/student/{student}/profile/{semester}', [StudentController::class, 'viewHistoricalProfile'])->name('student.viewHistoricalProfile');
Route::get('/student/{student}/profile/{profile}', [StudentController::class, 'viewProfile'])->name('student.profile.view');

Route::get('/reports/view-records/{studentId}', [ReportController::class, 'viewRecords'])->name('reports.view-records');
Route::get('/counseling', [CounselingController::class, 'index'])->name('counselings.index');
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




// Route::get('/report', function () {
//     return view('reports.report');
// })->middleware(['auth', 'verified'])->name('report');

Route::get('/setup', function () {
    return view('setting.setup');
})->middleware(['auth', 'verified'])->name('setup');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';