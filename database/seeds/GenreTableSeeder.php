<?php

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
        	['name' => "Role Playing", 'created_at' => NULL, 'updated_at' => NULL],
        	['name' => "First Person Shooter", 'created_at' => NULL, 'updated_at' => NULL],
        	['name' => "Sports", 'created_at' => NULL, 'updated_at' => NULL],
        	['name' => "Action-adventure", 'created_at' => NULL, 'updated_at' => NULL],
        	['name' => "Strategy", 'created_at' => NULL, 'updated_at' => NULL]
        ]);
    }
}
