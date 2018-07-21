<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 20; $i++) {
			User::firstOrCreate([
	            'email' => 'user'.$i.'@example.com',
	        ],[
	            'name' => 'user'.$i,
	            'email' => 'user'.$i.'@example.com',
	            'password' => bcrypt('secret'),
	        ]);    		
    	}
    }
}
