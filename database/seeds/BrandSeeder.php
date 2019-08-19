<?php

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['sumsang', 'hp', 'cisco', 'panasonic', 'Nike', 'Puma', 'Cotton\'on'];
        $j = 1;
    	for ($i=0; $i < 4; $i++) { 
	    	DB::table('brands')->insert([
	            'name' => $names[$i],
	            'logo' => "frontend/images/brands/brand$j.png",
            	'created_at' => \Carbon\Carbon::now(),
            	'updated_at' => \Carbon\Carbon::now(),
	        ]);
    	$j++;
    	}
    }
}
