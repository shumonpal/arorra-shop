<?php

use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['berbs', 'lakpin', 'lorium', 'kirds', 'beds'];
        $categories = \App\Models\Category::all();

    	foreach ($categories as $category) { 
            for ($i=0; $i < 5; $i++) { 
                $subcat = \App\Models\Subcategory::create([
                    'name' => $names[$i],
                    'descp' => 'Larium spume silivas make sure to place composer\'s system-wide vendor bin directory in your $PATH so the laravel executable can be located by your system. This directory exists in different locations based on your operating system.',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
                DB::table('category_subcategory')->insert([
                    'category_id' => $category->id,
                    'subcategory_id' => $subcat['id'],
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                    ]);
            }
    	}
    }
}
