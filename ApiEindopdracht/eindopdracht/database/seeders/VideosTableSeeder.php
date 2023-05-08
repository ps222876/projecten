<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('videos')->insert([
            'title' => 'I Hunted 100 People!',
            'likes' => '2800000',
            'uploaded_on' => '2022-09-03',
            'channel_id' => '1',
        ]);


        DB::table('videos')->insert([
            'title' => 'I Sold My House for $1',
            'likes' => '3500000',
            'uploaded_on' => '2021-03-06',
            'channel_id' => '1',
        ]);

        DB::table('videos')->insert([
            'title' => 'I Bought A Private Island',
            'likes' => '3400000',
            'uploaded_on' => '2020-08-13',
            'channel_id' => '1',
        ]);
    }
}
