<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =[ 
    		[
    			'name'=>'admin',
    			'email'=>'admin@gmail.com',
    			'level'=>'admin',
    			'password'=>bcrypt('123456'),
    		],
    		[
    			'name'=>'econ',
    			'email'=>'econ@gmail.com',
    			'level'=>'user',
    			'password'=>bcrypt('123456'),
    		],
            [
                'name'=>'nigga',
                'email'=>'nigga@gmail.com',
                'level'=>'user',
                'password'=>bcrypt('123456'),
            ],
    	];
    	foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
