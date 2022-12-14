<?php

use App\Http\Controllers\Payroll\PayrollInsertController;

Route::prefix('')->group(function () {
    // Deduction INSERT ROUTE
    Route::post('/insertdeduction', [PayrollInsertController::class,'InsertDeduction']);

    // Cash Advance INSERT ROUTE
    Route::post('/insertcashadvance', [PayrollInsertController::class,'InsertCashAdvance']);

    // Overtime INSERT ROUTE
    Route::get('/insertovertime', [PayrollInsertController::class,'InsertOvertime']);

    // Bonus INSERT ROUTE
    Route::post('/insertbonus', [PayrollInsertController::class,'InsertBonus']);

    // Multi Pay INSERT ROUTE
    Route::post('/insertmultipay', [PayrollInsertController::class,'InsertMultiPay']);

    // Holiday INSERT ROUTE
    Route::post('/insertholiday', [PayrollInsertController::class,'InsertHoliday']);
    Route::post('/Insertattendanceholiday', [PayrollInsertController::class,'InsertAttendanceHoliday']);

    //leave INSERT ROUTE
    Route::post('/insertleave', [PayrollInsertController::class,'InsertLeave']);
    Route::post('/insertApprovalLeave', [PayrollInsertController::class,'insertApprovalLeave']);

});
