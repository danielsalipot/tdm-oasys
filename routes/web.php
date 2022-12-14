<?php

use App\Http\Controllers\AuditController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RequestCertificate;
use App\Http\Controllers\TestController;

Route::prefix('')->group(function () {
    include 'emails.php';
});

Route::get('/Password/Forget',
    function (){
        return view('pages.forgot_password.landing');
    }
);

Route::get('/Password/Forget/{id}/{date}',
    function ($id,$date){
        return view('pages.forgot_password.change_password')->with([
            'id' => $id,
            'date' => $date
        ]);
    }
);

Route::POST('/signatureUpload',[PagesController::class,'signatureUpload']);


Route::get('/request/employment',[RequestCertificate::class,'requestCOE']);
Route::POST('/sendRequestCOE',[RequestCertificate::class,'sendRequestCOE']);

Route::POST('/forgotPassword',[ForgotPasswordController::class,'forgotPassword']);

Route::get('/test',[TestController::class,'PSPDFTest']);

Route::get('/display_resume', [PagesController::class, 'display_resume']);

//Audit PDF ROUTE
Route::get('/auditPdf', [AuditController::class,'audit']);

// Employee Routes
Route::prefix('')->group(function () {
    include 'Employee/employee.php';
});
Route::prefix('')->group(function () {
    include 'Employee/insert.php';
});
Route::prefix('')->group(function () {
    include 'Employee/update.php';
});
Route::prefix('')->group(function () {
    include 'Employee/delete.php';
});
Route::prefix('')->group(function () {
    include 'Employee/json.php';
});





// Payroll Routes
Route::prefix('')->group(function () {
    include 'Payroll/payroll.php';
});
// Json
Route::prefix('')->group(function () {
    include 'Payroll/JsonRoutes.php';
});
// Insert
Route::prefix('')->group(function () {
    include 'Payroll/InsertRoutes.php';
});
// Delete
Route::prefix('')->group(function () {
    include 'Payroll/DeleteRoutes.php';
});
// Delete
Route::prefix('')->group(function () {
    include 'Payroll/UpdateRoutes.php';
});
// PDF
Route::prefix('')->group(function () {
    include 'Payroll/PDFRoutes.php';
});





// Applicant Routes
Route::prefix('')->group(function () {
    include 'Applicant/applicants.php';
});

Route::prefix('')->group(function () {
    include 'Applicant/SignUpRoutes.php';
});


// Admin Routes
Route::prefix('')->group(function () {
    include 'Admin/admin.php';
});
Route::prefix('')->group(function () {
    include 'Admin/insert.php';
});
Route::prefix('')->group(function () {
    include 'Admin/delete.php';
});
Route::prefix('')->group(function () {
    include 'Admin/edit.php';
});
Route::prefix('')->group(function () {
    include 'Admin/json.php';
});
Route::prefix('')->group(function () {
    include 'Admin/pdf.php';
});




// Staff Routes
Route::prefix('')->group(function () {
    include 'Staff/staff.php';
});
Route::prefix('')->group(function () {
    include 'Staff/json.php';
});
Route::prefix('')->group(function () {
    include 'Staff/insert.php';
});
Route::prefix('')->group(function () {
    include 'Staff/update.php';
});
Route::prefix('')->group(function () {
    include 'Staff/delete.php';
});
Route::prefix('')->group(function () {
    include 'Staff/certificate.php';
});

Route::get('/employees/list', [PagesController::class, 'employee_profile_list']);


Route::get('/profile', [PagesController::class, 'hrProfile']);

Route::post('/managerUpdateAccount', [PagesController::class, 'managerUpdateAccount']);


Route::get('/message', [MessageController::class, 'message']);
Route::get('/message/{name}', [MessageController::class, 'message_search']);
Route::get('/messagejson/{r_id}',[MessageController::class,'MessageJson']);
Route::get('/chatemployeelistjson', [MessageController::class,'ChatEmployeeDetails']);
Route::get('/fetchNavBarMessageCount', [MessageController::class,'fetchNavBarMessageCount']);
Route::get('/markAsReadChat/{sender_id}', [MessageController::class,'markAsReadChat']);

Route::get('/notification', [MessageController::class, 'notification']);
Route::get('/notification/views', [PagesController::class, 'view_notif']);
Route::get('/sendmessage',[MessageController::class,'InsertMessage']);
Route::post('/sendnotification',[MessageController::class,'InsertNotification']);

Route::get('/notification_acknowledgement_insert', [PagesController::class, 'notification_acknowledgement_insert']);

// Landing Pages
Route::get('/change_picture', [PagesController::class, 'change_picture']);
Route::post('/submit_change_picture', [PagesController::class, 'submit_change_picture']);

Route::get('/password', [PagesController::class, 'change_pass']);
Route::post('/changePassword', [PagesController::class, 'changePassword']);


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


//Logout
Route::get('/logout', [PagesController::class, 'logout']);
