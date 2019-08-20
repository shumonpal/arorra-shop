<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['user'];
    	for ($i=0; $i < 1; $i++) { 
	    	DB::table('users')->insert([
	            'name' => $names[$i],
		        'email' => $names[$i].'@arrora.com',
		        'password' => bcrypt('123456'),
                'phone' => $i.'90857460',
                'country' => 'America',
                'state' => 'New york',
		        'address' => '7345 Vicky River,
	Will land, MN 63923-3935',
            	'created_at' => \Carbon\Carbon::now(),
            	'updated_at' => \Carbon\Carbon::now(),
	        ]);
    	}
    }
}
