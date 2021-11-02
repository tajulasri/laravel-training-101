<?php

use App\AssetStatus;
use App\AssetType;
use Illuminate\Database\Seeder;

class AssetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('asset_types')->truncate();

        foreach(['Disposable assets','Fixed assets','Moving assets'] as $type){
            AssetType::create(['type'=>$type]);
        }
    }
}
