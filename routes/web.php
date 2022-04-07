<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\LoginController;


Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/features', [PagesController::class, 'features']);

//Login routes
Route::get('/login', [PagesController::class, 'login']);
Route::post('crudlogin', [LoginController::class, 'crudlogin']);


//Create User Routes
Route::post('crudsignup', [CrudController::class, 'crudsignup']);
Route::post('crudintroduce', [CrudController::class, 'crudintroduce']);
Route::post('crudapply', [CrudController::class, 'crudapply']);

//Delete applicant's account
Route::get('deleteApplication', [CrudController::class, 'deleteApplication']);

//Payroll Manager Routes
Route::get('/deductiontype', [PayrollController::class, 'deductiontype']);
Route::get('/message', [PayrollController::class, 'message']);
Route::get('/notification', [PayrollController::class, 'notification']);
Route::get('/cashadvance', [PayrollController::class, 'cashadvance']);
Route::get('/overtime', [PayrollController::class, 'overtime']);
Route::get('/deduction', [PayrollController::class, 'deduction']);
Route::get('/employeelist', [PayrollController::class, 'employeelist']);
Route::get('/payroll', [PayrollController::class, 'payroll']);

//HR Admin Routes
Route::get('/adminhome', [AdminController::class, 'adminhome']);
Route::get('/attendance', [AdminController::class, 'attendance']);
Route::get('/performance', [AdminController::class, 'performance']);
Route::get('/peopleorientation', [AdminController::class, 'peopleorientation']);
Route::get('/moduleorientation', [AdminController::class, 'moduleorientation']);
Route::get('/peopletraining', [AdminController::class, 'peopletraining']);
Route::get('/moduletraining', [AdminController::class, 'moduletraining']);
Route::get('/peoplecorrection', [AdminController::class, 'peoplecorrection']);
Route::get('/modulecorrection', [AdminController::class, 'modulecorrection']);
Route::get('/adminmessage', [AdminController::class, 'adminmessage']);
Route::get('/adminnotification', [AdminController::class, 'adminnotification']);

//HR Staff Routes
Route::get('/staffhome', [StaffController::class, 'staffhome']);
Route::get('/onboarding', [StaffController::class, 'onboarding']);
Route::get('/termination', [StaffController::class, 'termination']);
Route::get('/offboarding', [StaffController::class, 'offboarding']);
Route::get('/schedules', [StaffController::class, 'schedules']);
Route::get('/interview', [StaffController::class, 'interview']);
Route::get('/department', [StaffController::class, 'department']);
Route::get('/position', [StaffController::class, 'position']);
Route::get('/staffmessage', [StaffController::class, 'staffmessage']);
Route::get('/staffnotification', [StaffController::class, 'staffnotification']);


//Employee Routes
Route::get('/employeehome', [PagesController::class, 'employeehome']);
Route::get('/employeeorientation', [PagesController::class, 'employeeorientation']);
Route::get('/employeetraining', [PagesController::class, 'employeetraining']);
Route::get('/employeecorrection', [PagesController::class, 'employeecorrection']);
Route::get('/employeemessage', [PagesController::class, 'employeemessage']);
Route::get('/employeeprofile', [PagesController::class, 'employeeprofile']);


//Applicants Routes
Route::get('/introduce', [PagesController::class, 'introduce']);
Route::get('/signup', [PagesController::class, 'signup']);
Route::get('/application', [PagesController::class, 'application']);
Route::get('/applying', [PagesController::class, 'applying']);
Route::get('/applicanthome', [PagesController::class, 'applicanthome']);

//Logout
Route::get('/logout', [PagesController::class, 'logout']);

//Test
Route::get('/test', [CrudController::class, 'test']);

Route::get('/getTest/{id}',[PayrollController::class,'getTest']);
