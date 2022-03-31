<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\UserCredential;
use App\Models\UserDetail;

use Faker\Factory as Faker;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        UserCredential::create([
            'username' => 'HRAdmin',
            'password' => 'password123',
            'user_type' => 'admin'
        ]);
    
        $login_id = UserCredential::where('username','HRAdmin')
                    ->first('login_id')
                    ->login_id;
        
        UserDetail::create([
            'login_id' => $login_id, 
            'fname' => $faker->FirstName, 
            'mname' => $faker->LastName, 
            'lname' => $faker->LastName, 
            'sex' =>  'male', 
            'age' => '20',
            'bday' => $faker->date($format = 'Y-m-d'),  
            'cnum' => $faker->e164PhoneNumber, 
            'email' => $faker->email, 
            'picture' => 'pictures/1.png',  
        ]);
    }
}
