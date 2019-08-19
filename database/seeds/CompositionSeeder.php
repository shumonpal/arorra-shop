<?php

use Illuminate\Database\Seeder;

class CompositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['new', 'sub-banner', 'deals-of-week', 'main-banner', 'manu-banner', 'spacial-product'];
    	for ($i=0; $i < 5; $i++) { 
	    	DB::table('compositions')->insert([
	            'name' => $names[$i],
		        'created_at' => \Carbon\Carbon::now(),
            	'updated_at' => \Carbon\Carbon::now(),
	        ]);
    	}
    }
}
