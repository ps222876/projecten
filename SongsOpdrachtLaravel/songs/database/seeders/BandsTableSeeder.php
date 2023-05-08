<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('bands')->insert([
            'name' => 'band1',
            'genre' => 'g1',
            'founded' => '2004',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);


        DB::table('bands')->insert([
            'name' => 'band2',
            'genre' => 'g2',
            'founded' => '2005',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);



        DB::table('bands')->insert([
            'name' => 'band3',
            'genre' => 'g3',
            'founded' => '2006',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
    }
}
