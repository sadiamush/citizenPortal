<?php

namespace Database\Seeders;

use App\Models\Network;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $network = [
            [
                  "id"=>1,
                  "city_name"=>"Lahore",
                  "state"=>"Punjab",
            ],
            [
                    "id"=>2,
                    "city_name"=>"Faisalabad",
                    "state"=>"Punjab",
            ],
            [
                "id"=>3,
                "city_name"=>"Rawalpindi",
                "state"=>"Punjab",
            ],
            [
                "id"=>4,
                "city_name"=>"Gujranwala",
                "state"=>"Punjab",
            ],
            [
                "id"=>5,
                "city_name"=>"Multan",
                "state"=>"Punjab",
            ],
            [
                "id"=>6,
                "city_name"=>"Bahawalpur",
                "state"=>"Punjab",
            ],
            [
                "id"=>7,
                "city_name"=>"Sargodha",
                "state"=>"Punjab",
            ],
            [
                "id"=>8,
                "city_name"=>"Sialkot",
                "state"=>"Punjab",
            ],
            [
                "id"=>9,
                "city_name"=>"Chiniot",
                "state"=>"Punjab",
            ],
            [
                "id"=>10,
                "city_name"=>"Shekhupura",
                "state"=>"Punjab",
            ],
            [
                "id"=>11,
                "city_name"=>"Shekhupura",
                "state"=>"Punjab",
            ],
            [
                "id"=>12,
                "city_name"=>"Jhang",
                "state"=>"Punjab",
            ],
            [
                "id"=>13,
                "city_name"=>"Dera Ghazi Khan",
                "state"=>"Punjab",
            ],
            [
                "id"=>14,
                "city_name"=>"Gujrat",
                "state"=>"Punjab",
            ],
            [
                "id"=>15,
                "city_name"=>"Rahimyar Khan",
                "state"=>"Punjab",
            ],
            [
                "id"=>16,
                "city_name"=>"Mardan",
                "state"=>"Khyber Pakhtunkhwa",
            ],
            [
                "id"=>17,
                "city_name"=>"Mingaora",
                "state"=>"Khyber Pakhtunkhwa",
            ],
            [
                "id"=>18,
                "city_name"=>"Kohat",
                "state"=>"Khyber Pakhtunkhwa",
            ],
            [
                "id"=>19,
                "city_name"=>"Abbottabad",
                "state"=>"Khyber Pakhtunkhwa",
            ],
            [
                "id"=>20,
                "city_name"=>"Peshawar",
                "state"=>"Khyber Pakhtunkhwa",
            ],
        ];

        foreach($network as $network)
        {
            Network::create($network);
        }
    }
}
