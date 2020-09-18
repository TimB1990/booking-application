<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'abbr' => 'A',
                'name' => 'Admin'
            ],
            [
                'abbr' => 'G',
                'name' => 'Guest'
            ],
            [
                'abbr' => 'FO',
                'name' => 'Front Office'
            ],
            [
                'abbr' => 'BO',
                'name' => 'Back Office'
            ],
            [
                'abbr' => 'R',
                'name' => 'Restaurant'
            ],
            [
                'abbr' => 'HK',
                'name' => 'House Keeping'
            ],
            [
                'abbr' => 'TS',
                'name' =>'Technical Service'
            ],
            [
                'abbr' => 'GS',
                'name' => 'General Service'
            ]
        ];

        DB::table('roles')->insert($roles);
    }
}
