<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractTypeController;
use App\Http\Controllers\CounselingController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseYearSectionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\ReferralReasonController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\StudentTransitionController;
use App\Http\Controllers\YearController;
use Illuminate\Support\Facades\Route;

// Redirect root URL to login page or dashboard based on authentication status
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Student routes
    Route::resource('student', StudentController::class);
    Route::get('/students/{id}/profile', [StudentController::class, 'profile'])->name('students.profile');
    Route::get('/students/{id}/enrollment', [StudentController::class, 'showEnrollmentHistory'])->name('students.enrollment');
    Route::get('/students/{id}/counseling', [StudentController::class, 'counseling'])->name('students.counseling');
    Route::get('/students/{id}/contract', [StudentController::class, 'contract'])->name('students.contract');
    Route::get('/students/{id}/referral', [StudentController::class, 'referral'])->name('students.referral');
    Route::post('/student/{id}/drop', [StudentController::class, 'markAsDropped'])->name('student.drop');
    Route::put('/student/profile/{student}', [StudentController::class, 'updateProfile'])->name('student.profile.update');
    Route::get('/student/{studentId}/profile/{profileId}', [StudentController::class, 'viewProfile'])->name('student.viewProfile');
    Route::get('/student/{id}/enrollment', [StudentController::class, 'enrollmentHistory'])->name('student.enrollment');
    Route::get('/student/{student}/profile/{semester}', [StudentController::class, 'viewHistoricalProfile'])->name('student.viewHistoricalProfile');
    Route::get('/student/{student}/profile/{profile}', [StudentController::class, 'viewProfile'])->name('student.profile.view');
    
    // Semester routes
    Route::resource('semester', SemesterController::class);
    Route::get('/semester/{semesterId}/validate', [SemesterController::class, 'validateStudentsForm'])->name('semester.validate');
    Route::post('/semester/{semesterId}/validate', [SemesterController::class, 'processValidateStudents'])->name('semester.processValidate');
    Route::post('/semesters/{newSemesterId}/carry-over', [SemesterController::class, 'carryOverFromPrevious'])->name('semesters.carryOver');
    Route::post('/school-years/store', [SemesterController::class, 'storeSchoolYear'])->name('school-years.store');
    Route::resource('semesters', SemesterController::class)->only(['index', 'store']);
    Route::post('/school-years/{id}/activate', [SchoolYearController::class, 'activate'])->name('school-years.activate');
    
    // Contract routes
    Route::resource('contracts', ContractController::class);
    Route::get('/students/{student}/contracts/create', [ContractController::class, 'createForStudent'])->name('student.createContract');
    Route::get('/contracts/{contract}/view', [ContractController::class, 'view'])->name('contracts.view');
    Route::post('/contracts/{id}/mark-complete', [ContractController::class, 'markComplete'])->name('contracts.markComplete');
    Route::post('/contracts/{id}/mark-inprogress', [ContractController::class, 'markInProgress'])->name('contracts.markInProgress');
    Route::patch('/contracts/{contract}/remarks', [ContractController::class, 'updateRemarks'])->name('contract.updateRemarks');
    Route::patch('/contracts/{contracts}/status', [ContractController::class, 'updateStatus'])->name('contract.updateStatus');
    Route::post('/contracts/{id}/upload-images/{type}', [ContractController::class, 'uploadImages'])->name('contracts.uploadImages');
    Route::delete('/contracts/{contract}/images/{image}', [ContractController::class, 'deleteImage'])->name('contracts.deleteImage');
    
    // Contract Types
    Route::get('/contract-types', [ContractTypeController::class, 'index'])->name('contract-types.index');
    Route::post('/contract-types', [ContractTypeController::class, 'store'])->name('contract-types.store');
    Route::delete('/contract-types/{id}', [ContractTypeController::class, 'destroy'])->name('contract-types.destroy');
    
    // Counseling routes
    Route::resource('counselings', CounselingController::class);
    Route::post('/counseling/store', [CounselingController::class, 'store'])->name('counseling.store');
    Route::get('/students/{student}/counseling/create', [CounselingController::class, 'create'])->name('students.createCounseling');
    Route::get('/counseling/{id}/view', [CounselingController::class, 'show'])->name('counseling.view');
    Route::delete('/counseling/{id}', [CounselingController::class, 'destroy'])->name('counseling.destroy');
    Route::patch('/counselings/{counseling}/status', [CounselingController::class, 'updateStatus'])->name('counseling.updateStatus');
    Route::patch('/counselings/{counseling}/remarks', [CounselingController::class, 'updateRemarks'])->name('counseling.updateRemarks');
    Route::post('/counselings/{id}/upload-images/{type}', [CounselingController::class, 'uploadImages'])->name('counseling.uploadImages');
    Route::delete('/counselings/{counseling}/images/{image}', [CounselingController::class, 'deleteImage'])->name('counseling.deleteImage');
    
    // Referral routes
    Route::resource('referrals', ReferralController::class);
    Route::patch('/referrals/{id}/update-remarks', [ReferralController::class, 'updateRemarks'])->name('referrals.updateRemarks');
    Route::patch('/referrals/{referrals}/status', [ReferralController::class, 'updateStatus'])->name('referrals.updateStatus');
    Route::delete('/referrals/{referralId}/images/{imageId}', [ReferralController::class, 'deleteImage'])->name('referrals.deleteImage');
    Route::post('/referrals/{id}/upload-images/{type}', [ReferralController::class, 'uploadImages'])->name('referrals.uploadImages');
    Route::get('/referrals/{id}/view', [ReferralController::class, 'show'])->name('referrals.view');

    // Referral Reasons
    Route::resource('referral-reasons', ReferralReasonController::class);
    
    // Student Transitions
    Route::resource('transitions', StudentTransitionController::class);
    Route::post('/transitions/store-student-transition', [StudentTransitionController::class, 'storeStudentTransition'])->name('transitions.storeStudentTransition');
    Route::patch('/transitions/{transition}/remarks', [StudentTransitionController::class, 'updateRemarks'])->name('transitions.updateRemarks');
    Route::post('/transitions/{transition}/images', [StudentTransitionController::class, 'uploadImages'])->name('transitions.uploadImages');
    Route::delete('/transitions/{transition}/images/{image}', [StudentTransitionController::class, 'deleteImage'])->name('transitions.deleteImage');
    
    // Course, Year, Section Management
    Route::get('/manage-course-year-section', [CourseYearSectionController::class, 'index'])->name('course_year_section.index');
    Route::post('/manage-course', [CourseYearSectionController::class, 'storeCourse'])->name('course.store');
    Route::post('/manage-year', [CourseYearSectionController::class, 'storeYear'])->name('year.store');
    Route::post('/manage-section', [CourseYearSectionController::class, 'storeSection'])->name('section.store');
    Route::delete('/course/{id}', [CourseYearSectionController::class, 'destroyCourse'])->name('course.destroy');
    Route::delete('/year/{id}', [CourseYearSectionController::class, 'destroyYear'])->name('year.destroy');
    Route::delete('/section/{id}', [CourseYearSectionController::class, 'destroySection'])->name('section.destroy');
    
    // Reports
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/student-list', [ReportController::class, 'studentList'])->name('reports.studentList');
    Route::get('/reports/view-profile/{studentId}/{semesterId}', [ReportController::class, 'viewProfile'])->name('reports.viewProfile');
    Route::get('/reports/student/{student_id}', [ReportController::class, 'view'])->name('reports.student.view');
    Route::get('/reports/export/pdf', [ReportController::class, 'export'])->name('reports.export');
    Route::get('/reports/student/export', [ReportController::class, 'exportStudentHistory'])->name('reports.student.export');
    Route::get('/reports/view-records/{studentId}', [ReportController::class, 'viewRecords'])->name('reports.view-records');
});

// Static pages
Route::get('/contract', function () {
    return view('contracts.contract');
})->middleware(['auth', 'verified'])->name('contract');

Route::get('/setup', function () {
    return view('setting.setup');
})->middleware(['auth', 'verified'])->name('setup');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
