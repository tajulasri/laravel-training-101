<?php

use App\Asset;
use Illuminate\Database\Seeder;

class AssetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //laravel 8
        //Asset::factory()->count(20)->create();
        
        DB::table('assets')->truncate();
        //laravel <= 7
        factory(Asset::class,1000)->create();
    }
}
