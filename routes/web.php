<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PayrollController;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\Payroll\PayrollInsertController;
use App\Http\Controllers\Payroll\PayrollUpdateController;
use App\Http\Controllers\Payroll\PayrollJSONController;
use App\Http\Controllers\Payroll\PayrollPAYROLLPDFController;
use App\Http\Controllers\Payroll\PayrollPAYSLIPPDFController;


use App\Http\Controllers\Applicant\ApplicantSignUpController;

// Employee Routes
Route::prefix('')->group(function () {
    include 'employee.php';
});

// Payroll Routes
Route::prefix('')->group(function () {
    include 'payroll.php';
});

// Applicant Routes
Route::prefix('')->group(function () {
    include 'applicants.php';
});

// Admin Routes
Route::prefix('')->group(function () {
    include 'admin.php';
});

// Staff Routes
Route::prefix('')->group(function () {
    include 'staff.php';
});




Route::get('/payroll1', [PayrollJSONController::class,'payroll1']);
Route::get('/test', [LoginController::class,'test']);

                    /////////////////////////
                    //PDF generation ROUTES//
                    /////////////////////////
                            /////////
Route::post('/payrollPDF', [PayrollPAYROLLPDFController::class, 'payrollPdf']);
Route::post('/payslipPdf', [PayrollPAYSLIPPDFController::class, 'payslipPdf']);

                //////////////////////////////////////
                //Json Payroll Routes for datatables//
                //////////////////////////////////////
                            //////////////
// Payroll Page JSON ROUTE
Route::get('/payrolljson', [PayrollJSONController::class,'payroll']);
Route::get('/payslipjson', [PayrollJSONController::class,'payslip']);

//Employee List JSON ROUTE
Route::get('/fetchSingleEmployee', [PayrollJSONController::class,'fetchSingleEmployee']);

// Deduction JSON ROUTE
Route::get('/deductionjson', [PayrollJSONController::class,'Deduction']);
Route::post('/insertdeduction', [PayrollInsertController::class,'InsertDeduction']);
Route::get('/employeedetailsjson', [PayrollJSONController::class,'EmployeeDetails']);

//Cash Adavance JSON ROUTE
Route::get('/cashadvancejson', [PayrollJSONController::class,'CashAdvance']);
Route::post('/insertcashadvance', [PayrollInsertController::class,'InsertCashAdvance']);

// Overtime JSON ROUTE
Route::get('/overtimejson', [PayrollJSONController::class,'Overtime']);
Route::get('/insertovertime', [PayrollInsertController::class,'InsertOvertime']);
Route::get('/getPaidOvertime', [PayrollJSONController::class,'getPaidOvertime']);

// Not yet done ROUTES for payroll
Route::get('/deductiontypejson', [PayrollJSONController::class,'DeductionType']);
Route::get('/employeelistjson', [PayrollJSONController::class,'EmployeeList']);
Route::get('/messagejson', [PayrollJSONController::class,'Message']);
Route::get('/notificationjson', [PayrollJSONController::class,'Notification']);
Route::get('/doublepayjson', [PayrollJSONController::class,'DoublePay']);
Route::get('/bonusjson', [PayrollJSONController::class,'Bonus']);


Route::post('applicant/crudsignup', [ApplicantSignUpController::class, 'crudsignup']);
Route::post('applicant/crudintroduce', [ApplicantSignUpController::class, 'crudintroduce']);
Route::post('applicant/crudapply', [ApplicantSignUpController::class, 'crudapply']);

                ////////////////////////
                //Landing Pages routes//
                ////////////////////////
                        ///////
// Landing Pages
Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/features', [PagesController::class, 'features']);

                //////////////////////
                //Login Pages routes//
                //////////////////////
                        //////
//Login routes
Route::get('/login', [PagesController::class, 'login']);
Route::post('crudlogin', [LoginController::class, 'crudlogin']);

            //////////////////////////
            //Applicant Pages Routes//
            //////////////////////////
                    /////////
// STEP 1 BACKEND ROUTE
Route::post('crudsignup', [ApplicantSignUpController::class, 'crudsignup']);
// STEP 2 BACKEND ROUTE
Route::post('crudintroduce', [ApplicantSignUpController::class, 'crudintroduce']);
// STEP 3 BACKEND ROUTE
Route::post('crudapply', [ApplicantSignUpController::class, 'crudapply']);

//Delete applicant's account
Route::get('deleteApplication', [ApplicantSignUpController::class, 'deleteApplication']);

// Update Controller for updating Employee Rates
Route::post('/editrate', [PayrollUpdateController::class, 'editrate']);

//Logout
Route::get('/logout', [PagesController::class, 'logout']);
