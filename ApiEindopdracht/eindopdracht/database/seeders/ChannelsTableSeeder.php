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

        DB::table('channels')->insert([
            'name' => 'PewDiePie ',
            'subs' => '111000000',
            'views' => '29002199933',
            'created_on' => '2010-04-29',
        ]);

        DB::table('channels')->insert([
            'name' => 'EminemMusic',
            'subs' => '56400000',
            'views' => '26604285531',
            'created_on' => '2007-02-09',
        ]);
    }
}
