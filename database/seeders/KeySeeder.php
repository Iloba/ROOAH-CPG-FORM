<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keys')->insert([
            'key' => 'Fo2h!@200',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            
        ]);
    }
}
