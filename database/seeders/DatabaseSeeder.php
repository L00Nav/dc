<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Users
        DB::table('users')->insert([
            'name' => 'Luna',
            'email' => 'lunar@biscuit.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Beaver',
            'email' => 'beaver@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Moose',
            'role' => 10,
            'email' => 'moose@gmail.com',
            'password' => Hash::make('123'),
        ]);


        //Systems
        DB::table('systems')->insert([
            'name' => 'D&D 5e',
            'complexity' => 2,
        ]);

        DB::table('systems')->insert([
            'name' => 'Pathfinder',
            'complexity' => 4,
        ]);

        DB::table('systems')->insert([
            'name' => 'Shadowrun',
            'complexity' => 5,
        ]);

        DB::table('systems')->insert([
            'name' => 'Dungeon World',
            'complexity' => 1,
        ]);


        //Sessions
        DB::table('sessions')->insert([
            'user_id' => 1,
            'system_id' => 4,
            'time' => date("2022-09-24 18:00:00"),
            'players' => 3,
        ]);
    }
}
