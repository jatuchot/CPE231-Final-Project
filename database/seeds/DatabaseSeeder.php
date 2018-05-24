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
            'username' => '59070503406',
            'email' => 'jatuchot@gmail.com',
            'password' => bcrypt('5554764s'),
	    'role' => '2',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);

        DB::table('users')->insert([
            'username' => '60070503406',
            'email' => 'first@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => '1',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);

        DB::table('users')->insert([
            'username' => '58070503406',
            'email' => 'thirdyear@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => '3',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);

	DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@bosscpe30.info',
            'password' => bcrypt('5554764s'),
            'role' => '4',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);

	DB::table('users')->insert([
            'username' => '59070503405',
            'email' => 'people12237@gmail.com',
            'password' => bcrypt('rpg1k9'),
            'role' => '2',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);

        DB::table('student_info')->insert([
	    'user_id' => '1',
            'student_id' => '59070503406',
            'Identification_Number' => '11111xxxxxxxx',
	    'Firstname' => 'xxx',
	    'Lastname' => 'xxx',
	    'FirstnameTH' => 'xxx',
	    'LastnameTH' => 'xxx',
	    'gender' => 'M',
	    'address' => '-',
	    'phone_num' => '-',
	    'Personal_Email' => '-',
	    'Kmutt_Email' => '-',
	    'DOB' => '1998-02-06',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')

        ]);
    }
}
