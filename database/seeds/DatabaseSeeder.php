<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	DB::table('users')->insert([
            'name' => '59070503406',
            'email' => 'jatuchot@gmail.com',
            'password' => bcrypt('5554764s'),
	    'role' => '2',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);

        DB::table('users')->insert([
            'name' => '60070503406',
            'email' => 'first@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => '1',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);

        DB::table('users')->insert([
            'name' => '58070503406',
            'email' => 'thirdyear@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => '3',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
    }
}
