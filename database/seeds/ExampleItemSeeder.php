<?php

use Illuminate\Database\Seeder;

use Comproso\Framework\Models\Test;

class ExampleItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create test
        $test = new Test;
        $test->type = "project";
        $test->active = true;
        $test->name = "Example Test";	// Name your test
        
        $test->repetitions = 0;
		$test->repetitions_interval = 0;
		$test->time_limit = 5000;
		$test->continueable = false;
		$test->reporting = true;
		$test->caching = true;
        
        $test->save();

        // create items
        $test->import(storage_path('app/comproso/data-example.csv'), ';');
    }
}
