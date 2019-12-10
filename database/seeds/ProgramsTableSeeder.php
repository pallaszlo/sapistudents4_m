<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
        	'name' => 'GI',
        	'description'=> 'Gazdasági informatika',
        ]);
        DB::table('programs')->insert([
        	'name' => 'KGI',
        	'description'=> 'Könyvelés és gazdálkodási informatika',
        ]);
        DB::table('programs')->insert([
        	'name' => 'MA',
        	'description'=> 'Marketing',
        ]);
    }
}
