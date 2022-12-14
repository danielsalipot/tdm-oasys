<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\UserCredential;
use App\Models\UserDetail;
use App\Models\ApplicantDetail;

use Faker\Factory as Faker;

class ApplicantSeeder extends Seeder
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

        $login_id = UserCredential::create([
            'username' => $username,
            'password' => md5(md5('password123')),
            'user_type' => 'applicant'
        ]);

        $info_id = UserDetail::create([
            'login_id' => $login_id->login_id,
            'fname' => $faker->FirstName,
            'mname' => $faker->LastName,
            'lname' => $faker->LastName,
            'sex' =>  (rand(0,1)) ? 'Male' : 'Female',
            'age' => rand(21,55),
            'bday' => $faker->date($format = 'Y-m-d'),
            'cnum' => $faker->e164PhoneNumber,
            'email' => 'danielsalipot1@gmail.com',
            'picture' => 'pictures/temp'.rand(1,9).'.jpg',
        ]);


        ApplicantDetail::create([
            'login_id' => $login_id->login_id,
            'information_id' =>$info_id->information_id,
            'Applyingfor' => 'Teacher',
            'educ' => 'College',
            'resume' => 'resumes/resume'.rand(1,3).'.pdf'
        ]);
    }
}
