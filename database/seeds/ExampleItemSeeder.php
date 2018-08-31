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
        $test->save();

        // create items
        $test->import(storage_path('app/comproso/data-example.csv'), ';');
    }
}
