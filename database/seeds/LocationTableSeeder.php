<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            'Department IT',
            'Terminal Guard 1',
            'Kantin A'
        ];

        foreach($data as $location){
            //part best dia ini
            Location::create(['location'=>$location]);
        }
    }
}
