<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

use App\Models\UserCredential;
use App\Models\UserDetail;
use App\Models\EmployeeDetail;
use App\Models\Onboardee;
use App\Models\Offboardee;
use App\Models\Position;
use App\Models\Regular;
use App\Models\Resigned;
use App\Models\Retired;
use App\Models\Terminated;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $username = $faker->username;
        $departments = Department::all('department_name');
        $positions = Position::all('position_title');

        $login_id = UserCredential::create([
            'username' => $username,
            'password' => md5(md5('password123')),
            'user_type' => 'employee'
        ]);


        $info_id = UserDetail::create([
            'login_id' => $login_id->id,
            'fname' => $faker->FirstName,
            'mname' => $faker->LastName,
            'lname' => $faker->LastName,
            'sex' =>  (rand(0,1)) ? 'female' : 'male',
            'age' => rand(20,65),
            'bday' => $faker->date($format = 'Y-m-d'),
            'cnum' => $faker->e164PhoneNumber,
            'email' => $faker->email,
            'picture' => 'pictures/temp'.rand(1,9).'.jpg',
        ]);

        $decimals = 2; // number of decimal places
	    $div = pow(10, $decimals);

        $rand_num = rand(0,2);

        if($rand_num == 2){
            $status = 'Onboardee';
        }elseif($rand_num == 1){
            $status = 'Offboardee';
        }else{
            $status = 'Regular';
        }

        $emp_id = EmployeeDetail::create([
            'login_id' => $login_id->id,
            'information_id' =>$info_id->id,
            'educ' => 'College',
            'position' => $positions[(rand(0,count($positions) - 1))]->position_title,
            'department' => $departments[(rand(0,count($departments)-1  ))]->department_name,
            'rate' => rand(500,1500) + mt_rand(0.01 * $div, 0.05 * $div) / $div,
            'employment_status' => $status,
            'resume' => 'resumes/resume'.rand(1,3).'.pdf',
            'start_date' => $faker->dateTimeBetween('2022-08-01', '2022-08-01'),
            'schedule_days' => json_encode([1,2,3,4,5]),
            'schedule_Timein' => date('H:i:s', 25200),
            'schedule_Timeout' => date('H:i:s', 68400)
        ]);

        if($rand_num == 2){
            Onboardee::create(['employee_id'=>$emp_id->id]);
        }elseif($rand_num == 1){
            Offboardee::create(['employee_id'=>$emp_id->id]);

            $rand = rand(0,1);
            if($rand){
                Retired::create(['employee_id'=>$emp_id->id]);
            }else{
                Terminated::create(['employee_id'=>$emp_id->id]);
            }
        }else{
            Regular::create(['employee_id'=>$emp_id->id]);
        }
    }
}
