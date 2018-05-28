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

	DB::table('users')->insert([
            'username' => 'cherprang',
            'email' => 'cherprang@bnk48.com',
            'password' => bcrypt('bnk481'),
            'role' => '5',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'krukaew',
            'email' => 'krukaew@bnk48.com',
            'password' => bcrypt('bnk481'),
            'role' => '5',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'music',
            'email' => 'music@bnk48.com',
            'password' => bcrypt('bnk481'),
            'role' => '5',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'jennis',
            'email' => 'jennis@bnk48.com',
            'password' => bcrypt('bnk481'),
            'role' => '5',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'kaimook',
            'email' => 'kaimook@bnk48.com',
            'password' => bcrypt('bnk481'),
            'role' => '5',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'miori',
            'email' => 'miori@bnk48.com',
            'password' => bcrypt('bnk481'),
            'role' => '5',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
        DB::table('users')->insert([
            'username' => 'pun',
            'email' => 'pun@bnk48.com',
            'password' => bcrypt('bnk481'),
            'role' => '5',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);

        DB::table('student_info')->insert([
	    'user_id' => '1',
            'student_id' => '59070503406',
            'Identification_Number' => '11111xxxxxxxx',
	    'Firstname' => 'Jatuchot',
	    'Lastname' => 'Siriwongsilp',
	    'FirstnameTH' => 'จตุโชติ',
	    'LastnameTH' => 'ศิริวงษ์ศิลป์',
	    'gender' => 'M',
	    'address' => '-',
	    'phone_num' => '-',
	    'Personal_Email' => '-',
	    'Kmutt_Email' => '-',
	    'DOB' => '1998-02-06',
	    'image_filename' => 'miori.jpg',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')

        ]);

        DB::table('teacher_info')->insert([
            'user_id' => '6',
            'Identification_Number' => '11111xxxxxxxx',
            'Firstname' => 'CHERPRANG',
            'Lastname' => 'AREEKUL',
            'FirstnameTH' => 'เฌอปราง',
            'LastnameTH' => 'อารีย์กุล',
            'gender' => 'F',
            'address' => 'Bangkok',
            'phone_num' => '-',
            'Personal_Email' => '-',
            'Kmutt_Email' => '-',
            'DOB' => '1996-05-02',
            'image_filename' => 'cherprang.jpg',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')

        ]);
        DB::table('teacher_info')->insert([
            'user_id' => '7',
            'Identification_Number' => '11111xxxxxxxx',
            'Firstname' => 'NATRUJA',
            'Lastname' => 'CHUTIWANSOPON',
            'FirstnameTH' => 'ณัฐรุจา',
            'LastnameTH' => 'ชุติวรรณโสภณ',
            'gender' => 'F',
            'address' => 'Chonburi',
            'phone_num' => '-',
            'Personal_Email' => '-',
            'Kmutt_Email' => '-',
            'DOB' => '1994-03-31',
            'image_filename' => 'krukaew.jpg',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
	DB::table('teacher_info')->insert([
            'user_id' => '9',
            'Identification_Number' => '11111xxxxxxxx',
            'Firstname' => 'JENNIS',
            'Lastname' => 'OPRASERT',
            'FirstnameTH' => 'เจนนิษฐ์',
            'LastnameTH' => 'โอ่ประเสริฐ',
            'gender' => 'F',
            'address' => 'Petchaburi',
            'phone_num' => '-',
            'Personal_Email' => '-',
            'Kmutt_Email' => '-',
            'DOB' => '2000-07-04',
            'image_filename' => 'jennis.jpg',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
	DB::table('teacher_info')->insert([
            'user_id' => '8',
            'Identification_Number' => '11111xxxxxxxx',
            'Firstname' => 'PRAEWA',
            'Lastname' => 'SUTHAMPHONG',
            'FirstnameTH' => 'แพรวา',
            'LastnameTH' => 'สุธรรมพงษ์',
            'gender' => 'F',
            'address' => 'Bangkok',
            'phone_num' => '-',
            'Personal_Email' => '-',
            'Kmutt_Email' => '-',
            'DOB' => '2001-02-24',
            'image_filename' => 'music.jpg',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
	DB::table('teacher_info')->insert([
            'user_id' => '10',
            'Identification_Number' => '11111xxxxxxxx',
            'Firstname' => 'WARATTAYA',
            'Lastname' => 'DEESOMLERT',
            'FirstnameTH' => 'วรัทยา',
            'LastnameTH' => 'ดีสมเลิศ',
            'gender' => 'F',
            'address' => 'Bangkok',
            'phone_num' => '-',
            'Personal_Email' => '-',
            'Kmutt_Email' => '-',
            'DOB' => '1997-08-27',
            'image_filename' => 'kaimook.jpg',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
	DB::table('teacher_info')->insert([
            'user_id' => '11',
            'Identification_Number' => '11111xxxxxxxx',
            'Firstname' => 'MIORI',
            'Lastname' => 'OHKUBO',
            'FirstnameTH' => 'มิโอริ',
            'LastnameTH' => 'โอคุโบะ',
            'gender' => 'F',
            'address' => 'Ibaraki, Japan',
            'phone_num' => '-',
            'Personal_Email' => '-',
            'Kmutt_Email' => '-',
            'DOB' => '1998-09-30',
            'image_filename' => 'miko.jpg',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);
	DB::table('teacher_info')->insert([
            'user_id' => '12',
            'Identification_Number' => '11111xxxxxxxx',
            'Firstname' => 'PUNSIKORN',
            'Lastname' => 'TIYAKORN',
            'FirstnameTH' => 'ปัญสิกรณ์',
            'LastnameTH' => 'ติยะกร',
            'gender' => 'F',
            'address' => 'Bangkok',
            'phone_num' => '-',
            'Personal_Email' => '-',
            'Kmutt_Email' => '-',
            'DOB' => '2000-11-09',
            'image_filename' => 'pun.jpg',
            'created_at' => date('Y-m-d G:i:s'),
            'updated_at' => date('Y-m-d G:i:s')
        ]);





    }
}
