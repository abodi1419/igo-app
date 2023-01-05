<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path1 = asset('assets/sql/tables_lite.sql');
        $path2 = asset('assets/sql/cities_lite.sql');
        $path3 = asset('assets/sql/districts_lite.sql');

        $sql1 = file_get_contents($path1);
        $sql2 = file_get_contents($path2);
        $sql3 = file_get_contents($path3);

        DB::unprepared($sql1);
        DB::unprepared($sql2);
        DB::unprepared($sql3);
    }
}
