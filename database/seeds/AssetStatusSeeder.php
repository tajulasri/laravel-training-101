<?php

use App\AssetStatus;
use Illuminate\Database\Seeder;

class AssetStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asset_statuses')->truncate();

        foreach(['dispose','new','on maintenance'] as $status){
            AssetStatus::create(['name'=>$status]);
        }
    }
}
