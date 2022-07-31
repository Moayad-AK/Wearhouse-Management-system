<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> 'Moayad',
            'email'=> 'moayad@gmail.com',
            'password'=> Hash::make('12345678'),
            'phone'=> 1997152,
            'address'=> 'Mazze',
            'birth_date'=> '2000-04-02',
            'employment_date'=> '2022-05-03',
            'salary'=> 3000,
            'status'=> 1,
            'job_title'=> 'first',
            'gender'=> 'other',
        ]);
    }
}
