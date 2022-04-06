<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\EmployeeDetail;
use App\Models\Deduction;
use App\Models\Overtime;
use App\Models\Attendance;

class PayrollController extends Controller
{
    function getCompleteEmployeeDetails(){
        // User information + Employee Details = Complete Employee Info
        return EmployeeDetail::join('user_details', 'employee_details.information_id','=', 'user_details.information_id')
        ->paginate(6);;
    }
        function payroll(){
            return view('pages.payroll_manager.payroll',['employees' => $this->getCompleteEmployeeDetails()]);
        }
        function employeelist(){
            return view('pages.payroll_manager.employeelist',['employees' => $this->getCompleteEmployeeDetails()]);
        }

        function deduction(){
            $employeeDeductions = Deduction::join('employee_details','employee_details.employee_id','=','deductions.employee_id')
                            ->join('user_details', 'employee_details.information_id','=', 'user_details.information_id')
                            ->paginate(6);
            return view('pages.payroll_manager.deduction',['employeeDeductions' => $employeeDeductions]);
        }

        function overtime(){
            $employeesOvertime = Overtime::join('employee_details','employee_details.employee_id','=','overtimes.employee_id')
                                ->join('user_details', 'employee_details.information_id','=', 'user_details.information_id')
                                ->join('attendances','attendances.attendance_id','=','overtimes.attendance_id')
                                ->get();

            foreach ($employeesOvertime as $key => $data) {
                //Attendance
                list($timein_hours, $timein_minutes, $timein_seconds) = explode(':',$data->time_in);
                $timein = $timein_hours * 3600 + $timein_minutes * 60 + $timein_seconds;

                list($timeout_hours, $timeout_minutes, $timeout_seconds) = explode(':',$data->time_out);
                $timeout = $timeout_hours * 3600 + $timeout_minutes * 60 + $timeout_seconds;

                // Schedule
                list($stimein_hours, $stimein_minutes, $stimein_seconds) = explode(':',$data->schedule_Timein);
                $stimein = $stimein_hours * 3600 + $stimein_minutes * 60 + $stimein_seconds;

                list($stimeout_hours, $stimeout_minutes, $stimeout_seconds) = explode(':',$data->schedule_Timeout);
                $stimeout = $stimeout_hours * 3600 + $stimeout_minutes * 60 + $stimeout_seconds;

                if($stimein - $timein < 0 || $timeout - $stimeout < 0){
                    unset($employeesOvertime[$key]);
                }
            }
            return view('pages.payroll_manager.overtime',['employeesOvertime' => $employeesOvertime]);
        }
        function cashadvance(){
            return view('pages.payroll_manager.cashadvance');
        }
        function deductiontype(){
            return view('pages.payroll_manager.deductiontype');
        }
        function message(){
            return view('pages.payroll_manager.message');
        }
        function notification(){
            return view('pages.payroll_manager.notification');
        }
}
