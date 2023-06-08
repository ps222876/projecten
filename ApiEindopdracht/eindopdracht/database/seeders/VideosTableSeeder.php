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
            'title' => 'Squid game in real life!',
            'likes' => '16000000',
            'uploaded_on' => '2021-11-24',
            'channel_id' => '1',
        ]);

        DB::table('videos')->insert([
            'title' => 'I sold my house for $1',
            'likes' => '3500000',
            'uploaded_on' => '2021-03-06',
            'channel_id' => '1',
        ]);





        DB::table('videos')->insert([
            'title' => 'Being followed by fans',
            'likes' => '153000',
            'uploaded_on' => '2023-03-28',
            'channel_id' => '2',
        ]);


        DB::table('videos')->insert([
            'title' => 'Try not to laugh',
            'likes' => '198000',
            'uploaded_on' => '2023-04-16',
            'channel_id' => '2',
        ]);



        DB::table('videos')->insert([
            'title' => 'Not afraid',
            'likes' => '11000000',
            'uploaded_on' => '2010-06-05',
            'channel_id' => '3',
        ]);


        DB::table('videos')->insert([
            'title' => 'Without me',
            'likes' => '12000000',
            'uploaded_on' => '2009-06-17',
            'channel_id' => '3',
        ]);



        // DB::table('videos')->insert([
        //     'title' => 'I Sold My House for $1',
        //     'likes' => '3500000',
        //     'uploaded_on' => '2021-03-06',
        //     'channel_id' => '1',
        // ]);

        // DB::table('videos')->insert([
        //     'title' => 'I Bought A Private Island',
        //     'likes' => '3400000',
        //     'uploaded_on' => '2020-08-13',
        //     'channel_id' => '1',
        // ]);
    }
}
