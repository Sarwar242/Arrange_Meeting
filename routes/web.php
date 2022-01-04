<?php

use Illuminate\Support\Facades\Route;
use App\Http\Models\test;
use App\Http\Models\test1;
use App\Models\UserPanel;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
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


Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login',  [AuthController::class, 'login'])->name('login.post');
// Route::get('/add', function () {
//     return view('AdminPanel.AddTeacherForm');
// });
Route::group(['middleware'=>'auth'], function (){

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return view('UserPanel.MainContentPage');
    })->name('dashboard');
    Route::get('/dashboard', function () {
        return view('UserPanel.MainContentPage');
    })->name('dashboard');

    Route::prefix('/adminpanel')->group(function () {
        Route::get('/','App\Http\Controllers\AdminPanelController@ShowView');

        //Dept
        Route::get('/departments',[DepartmentController::class, 'index'])->name('admin.departments');
        Route::get('/department/create',[DepartmentController::class, 'create'])->name('admin.department.create');
        Route::post('/department/create',[DepartmentController::class, 'store'])->name('admin.department.store');
        Route::get('/department/update/{id}',[DepartmentController::class, 'edit'])->name('admin.department.edit');
        Route::post('/department/update/{id}',[DepartmentController::class, 'update'])->name('admin.department.update');
        Route::get('/department/delete/{id}',[DepartmentController::class, 'destroy'])->name('admin.department.delete');

        //Courses
        Route::get('/courses',[CourseController::class, 'index'])->name('admin.courses');
        Route::get('/course/create',[CourseController::class, 'create'])->name('admin.course.create');
        Route::post('/course/create',[CourseController::class, 'store'])->name('admin.course.store');
        Route::get('/course/update/{id}',[CourseController::class, 'edit'])->name('admin.course.edit');
        Route::post('/course/update/{id}',[CourseController::class, 'update'])->name('admin.course.update');
        Route::get('/course/delete/{id}',[CourseController::class, 'destroy'])->name('admin.course.delete');

        //Batches
        Route::get('/batches',[BatchController::class, 'index'])->name('admin.batches');
        Route::get('/batch/create',[BatchController::class, 'create'])->name('admin.batch.create');
        Route::post('/batch/create',[BatchController::class, 'store'])->name('admin.batch.store');
        Route::get('/batch/update/{id}',[BatchController::class, 'edit'])->name('admin.batch.edit');
        Route::post('/batch/update/{id}',[BatchController::class, 'update'])->name('admin.batch.update');
        Route::get('/batch/delete/{id}',[BatchController::class, 'destroy'])->name('admin.batch.delete');

        //Students
        Route::get('/students',[StudentController::class, 'index'])->name('admin.students');
        Route::get('/student/create',[StudentController::class, 'create'])->name('admin.student.create');
        Route::post('/student/create',[StudentController::class, 'store'])->name('admin.student.store');
        Route::get('/student/update/{id}',[StudentController::class, 'edit'])->name('admin.student.edit');
        Route::post('/student/update/{id}',[StudentController::class, 'update'])->name('admin.student.update');
        Route::get('/student/delete/{id}',[StudentController::class, 'destroy'])->name('admin.student.delete');

        //Attendances
        Route::get('/attendances',[AttendanceController::class, 'index'])->name('admin.attendances');
        Route::get('/present',[AttendanceController::class, 'toggle'])->name('admin.attendance.take');
        Route::match(['get', 'post'],'/attendance',[AttendanceController::class, 'store'])->name('admin.attendance');
        // Route::get('/attendance/update/{id}',[AttendanceController::class, 'edit'])->name('admin.attendance.edit');
        // Route::post('/attendance/update/{id}',[AttendanceController::class, 'update'])->name('admin.attendance.update');

        Route::get('/attendance/delete/{id}',[AttendanceController::class, 'destroy'])->name('admin.attendance.delete');
        Route::get('/get-batches/{id}', function ($id) {
            return json_encode(App\Models\Batch::where('department_id', $id)->get());
        });
    });
    Route::get('/AddTeacherForm','App\Http\Controllers\AdminPanelController@AddTeacherForm');
    Route::Post('/AddTeacher','App\Http\Controllers\AdminPanelController@AddTeacher')->name('AddTeacher');
    Route::get('/TeachersView','App\Http\Controllers\AdminPanelController@TeachersView');
    Route::get('teacherDelete/{id}','App\Http\Controllers\AdminPanelController@DeleteTeacher');
    Route::get('editTeacher/{id}','App\Http\Controllers\AdminPanelController@EditTeacher');
    Route::Post('UpdateTeacher/{id}','App\Http\Controllers\AdminPanelController@UpdateTeacher')->name('UpdateTeacher');;
    Route::Post('/test','App\Http\Controllers\AdminPanelController@test')->name('test');

    Route::get('/meetings', [MeetingController::class, 'index'])->name('meetings');
    Route::get('/meeting/create', [MeetingController::class, 'create'])->name('meeting.create');
    Route::post('/meeting/create', [MeetingController::class, 'store'])->name('meeting.store');
    Route::get('/meeting/update/{id}', [MeetingController::class, 'edit'])->name('meeting.update');
    Route::post('/meeting/update/{id}', [MeetingController::class, 'update'])->name('meeting.update.post');
    Route::get('/meeting/delete/{id}', [MeetingController::class, 'delete'])->name('meeting.delete');

    // Route::get('/test1','App\Http\Controllers\AdminPanelController@test1');
    // Route::get('/testview','App\Http\Controllers\AdminPanelController@view');
    // Route::get('/testviewdata/{id}','App\Http\Controllers\AdminPanelController@testviewdata');

    // UserPanel
    // Route::get('/ShowTTableForMeeting','App\Http\Controllers\UserPanelController@ShowTeacherTableForMeeting');
    // Route::get('/MessageService','App\Http\Controllers\UserPanelController@MessageService');
    // Route::get('/ArrangeMeeting','App\Http\Controllers\UserPanelController@ArrangeMeeting');

    Route::get('/userlogin', function () {
        return view('UserPanel.UserLogin');
    });
    Route::get('/Inbox', function () {
        return view('UserPanel.Inbox');
    });





});
