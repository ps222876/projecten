<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('albums')->insert([
            'name' => 'album1',
            'year' => '2004',
            'times_sold' => '2004',
            'band_id' => '1',

        ]);



        DB::table('albums')->insert([
            'name' => 'album2',
            'year' => '2005',
            'times_sold' => '2005',
            'band_id' => '1',

        ]);




        DB::table('albums')->insert([
            'name' => 'album3',
            'year' => '2006',
            'times_sold' => '2006',
            'band_id' => '2',

        ]);




        DB::table('albums')->insert([
            'name' => 'album4',
            'year' => '2007',
            'times_sold' => '2007',
            'band_id' => '2',

        ]);




        DB::table('albums')->insert([
            'name' => 'album5',
            'year' => '2008',
            'times_sold' => '2008',
            'band_id' => '3',

        ]);
    }
}
