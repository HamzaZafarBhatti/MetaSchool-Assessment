<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'code' => 'pk',
                'name' => 'Pakistan'
            ],
            [
                'code' => 'in',
                'name' => 'India'
            ]
        ];
        DB::table('countries')->insert($data);
    }
}
