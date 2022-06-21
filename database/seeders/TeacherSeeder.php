<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('teachers')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        // $date=[
        //     [
        //         'name'=>Str::random(10),
        //         'email'=>Str::random(10).'@gmail.com',
        //         'address'=>Str::random(30),

        //     ],
        //     [
        //         'name'=>Str::random(15),
        //         'email'=>Str::random(12).'@gmail.com',
        //         'address'=>Str::random(40),

        //     ],
        //     [
        //         'name'=>Str::random(20),
        //         'email'=>Str::random(16).'@gmail.com',
        //         'address'=>Str::random(50),

        //     ],
        //     [
        //         'name'=>Str::random(25),
        //         'email'=>Str::random(18).'@gmail.com',
        //         'address'=>Str::random(60),

        //     ],
        // ];
        // DB::table('teachers')->insert($date);

        //factory
        Teacher::factory()
        ->count(20)
        
        ->create();
    }
}
