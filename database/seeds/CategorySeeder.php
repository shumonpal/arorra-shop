<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['electronics', 'construction', 'cloths', 'housholds'];
    	for ($i=0; $i < 4; $i++) { 
	    	DB::table('categories')->insert([
	            'name' => $names[$i],
		        'descp' => 'Larium spame silivas make sure to place composer\'s system-wide vendor bin directory in your $PATH so the laravel executable can be located by your system. This directory exists in different locations based on your operating system; however, some common locations include',
            	'created_at' => \Carbon\Carbon::now(),
            	'updated_at' => \Carbon\Carbon::now(),
	        ]);
    	}
    }
}
