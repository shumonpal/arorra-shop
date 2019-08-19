<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['admin', 'super_admin', 'editor'];
        $j = 1;
    	for ($i=0; $i < 3; $i++) { 
	    	DB::table('admins')->insert([
	            'name' => $names[$i],
		        'email' => $names[$i].'@arrora.com',
		        'password' => bcrypt('123456'),
                'phone' => $i.'90857460',
                'country' => 'America',
                'state' => 'New york',
		        'address' => '7345 Vicky River,
	Will land, MN 63923-3935',
		        'role' => $j,
            	'created_at' => \Carbon\Carbon::now(),
            	'updated_at' => \Carbon\Carbon::now(),
	        ]);
            $j++;
    	}
    }
}
