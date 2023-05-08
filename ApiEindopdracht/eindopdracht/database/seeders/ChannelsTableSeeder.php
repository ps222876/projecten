<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('channels')->insert([
            'name' => 'MrBeast',
            'subs' => '146000000',
            'views' => '24764565810',
            'created_on' => '2012-02-20',
        ]);
    }
}
