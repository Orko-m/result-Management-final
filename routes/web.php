<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PdfController;




Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// this route for home dashboard
Route::get('redirects',[HomeController::class,'index'])->name('redirects')->middleware('IsActive');
// this route for home logout
Route::get('logout',[HomeController::class,'logout'])->name('logout')->middleware('IsActive');


//############################### Admin all route group Start #############################################################
// this route for  user
Route::get('user',[AdminController::class,'user'])->name('user')->middleware('IsActive','Manager','HrManager');
Route::get('addUserForm',[AdminController::class,'addUserForm'])->name('addUserForm')->middleware('IsActive','Manager','HrManager');
Route::post('storeUser',[AdminController::class,'StoreUser'])->name('storeUser')->middleware('IsActive','Manager','HrManager');
Route::get('/editUser/{id}',[AdminController::class,'EditUser'])->name('editUser')->middleware('IsActive','Manager','HrManager');
Route::post('/updateUser/{id}',[AdminController::class,'updateUser'])->name('updateUser')->middleware('IsActive','Manager','HrManager');
Route::get('/deleteUser/{id}',[AdminController::class,'deleteUser'])->name('deleteUser')->middleware('IsActive','Manager','HrManager');
Route::get('/inactiveUser/{id}', [AdminController::class,'inactive'])->name('inactive')->middleware('IsActive','Manager','HrManager');
Route::get('/activeUser/{id}', [AdminController::class,'active'])->name('active')->middleware('IsActive','Manager','HrManager');



// ############################### Admin Profile  & change password Route start ########################################################
Route::get('/profile',[AdminController::class,'edit_profile'])->name('profile')->middleware('IsActive');
Route::post('/update-profile',[AdminController::class,'update_profile'])->name('update-profile')->middleware('IsActive');
Route::get('/reset-password',[AdminController::class,'reset_password'])->name('reset-password')->middleware('IsActive');
Route::post('/update-password',[AdminController::class,'update_password'])->name('update-password')->middleware('IsActive');
// ############################### Admin Profile  & change password Route End ########################################################


// Attendance manage Route
Route::get('/add-attendance',[AttendanceController::class,'attendance_index'])->name('attendance_index')->middleware('IsActive');

Route::get('/present/{id}', [AttendanceController::class,'present'])->name('present')->middleware('IsActive');
Route::get('/absent/{id}', [AttendanceController::class,'absent'])->name('absent')->middleware('IsActive');
Route::get('/leave/{id}', [AttendanceController::class,'leave'])->name('leave')->middleware('IsActive');
Route::get('/offday/{id}', [AttendanceController::class,'offday'])->name('offday')->middleware('IsActive');
Route::post('/store',[AttendanceController::class,'store'])->name('store')->middleware('IsActive');
Route::get('/view-attendance',[AttendanceController::class,'view_attendance'])->name('view')->middleware('IsActive');
// for view all attendance
Route::get('/view-all-attendance',[AttendanceController::class,'view_all_attendance'])->name('viewall')->middleware('IsActive');
// for previous report form
Route::get('/previous-report',[AttendanceController::class,'showPrevious'])->name('previous')->middleware('IsActive');
// for previous report 
Route::post('/view-previous-report',[AttendanceController::class,'viewpreviousreport'])->name('viewpreviousreport')->middleware('IsActive');

Route::get('/count_attendance',[AttendanceController::class,'count_attendance'])->name('count_attendance')->middleware('IsActive');

Route::get('/edit-attendance/{employee_id}/{date}',[AttendanceController::class,'edit_attendance'])->name('edit-attendance')->middleware('IsActive');
Route::post('/update-attendance/{employee_id}/{date}',[AttendanceController::class,'update_attendance'])->name('update-attendance')->middleware('IsActive');
//############################### Admin all route group End  #############################################################


//############################### Admin Employee  all route group start  #############################################################
// Employee InActive View
Route::get('/employee',[EmployeeController::class,'index'])->name('employee')->middleware('IsActive','HrManager');

// Employee Add From
Route::get('/add-employee',[EmployeeController::class,'create'])->name('add-employee')->middleware('IsActive','HrManager');

// Employee Add Store
Route::post('/save-employee',[EmployeeController::class,'store'])->name('store-employee')->middleware('IsActive','HrManager');

// Employee Edit
Route::get('/edit-employee/{id}',[EmployeeController::class,'edit'])->name('edit-employee')->middleware('IsActive','HrManager');

// Employee Update
Route::post('/update-employee/{id}',[EmployeeController::class,'update'])->name('update-employee')->middleware('IsActive','HrManager');

// Employee Delete
Route::get('/delete-employee/{id}',[EmployeeController::class,'destroy'])->name('delete-employee')->middleware('IsActive','HrManager');



//############################### Employee  all route group End  #############################################################
#################### Just Employee Route ######################


Route::get('/view_employee_attendance',[EmployeeController::class,'view_employee_attendance'])->name('view_employee_attendance')->middleware('IsActive','Manager','HrManager');

// for pdf download current month
Route::get('/pdf-download', [PdfController::class, 'pdfGenerator'])->name('pdf')->middleware('IsActive','HrManager');
// // for pdf download  monthly

Route::post('/pdf-store', [PdfController::class, 'downloadPdf'])->name('download')->middleware('IsActive','HrManager');
// show pdf page
Route::get('/pdf-show', [PdfController::class, 'forReport'])->name('forshow')->middleware('IsActive','HrManager');
