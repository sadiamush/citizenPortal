<?php

namespace Database\Seeders;

use App\Models\ListDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listDetail = [
            [
                "id" => 1,
                "list_name" => "Education",
                "list_table" => "Bachelor in computer science",
                "list_value" => "bachelor in computer science"
            ],
            [
                "id" => 2,
                "list_name" => "Education",
                "list_table" => "Bachelor in Physics",
                "list_value" => "bachelor in physics"
            ],
            [
                "id" => 3,
                "list_name" => "Education",
                "list_table" => "Bachelor in chemistry",
                "list_value" => "bachelor in chemistry"
            ],
            [
                "id" => 4,
                "list_name" => "Education",
                "list_table" => "Bachelor in math",
                "list_value" => "bachelor in math"
            ],
            [
                "id" => 5,
                "list_name" => "Education",
                "list_table" => "Bachelor in Biology",
                "list_value" => "bachelor in biology"
            ],
            [
                "id" => 6,
                "list_name" => "Education",
                "list_table" => "Bachelor in Information Technology",
                "list_value" => "bachelor in information technology"
            ],
            [
                "id" => 7,
                "list_name" => "Education",
                "list_table" => "Bachelor in Geographic",
                "list_value" => "bachelor in Geographic"
            ],
            [
                "id" => 8,
                "list_name" => "Education",
                "list_table" => "Bachelor in Architecture",
                "list_value" => "bachelor in architecture"
            ],
            [
                "id" => 9,
                "list_name" => "Education",
                "list_table" => "Bachelor in Pharmacy",
                "list_value" => "bachelor in pharmacy"
            ],
            [
                "id" => 10,
                "list_name" => "Education",
                "list_table" => "Bachelor in civil engineer",
                "list_value" => "bachelor in civil engineer"
            ],
            [
                "id" => 11,
                "list_name" => "Education",
                "list_table" => "Matric",
                "list_value" => "matric"
            ],
            [
                "id" => 12,
                "list_name" => "Education",
                "list_table" => "Fsc Pre-Engineering",
                "list_value" => "fsc pre-engineering"
            ],  [
                "id" => 13,
                "list_name" => "Education",
                "list_table" => "Fsc Pre-Medical",
                "list_value" => "fsc pre-medical"
            ],

            [
                "id" => 14,
                "list_name" => "Education",
                "list_table" => "ICS",
                "list_value" => "ICS"
            ],
            [
                "id" => 15,
                "list_name" => "Education",
                "list_table" => "ICOM",
                "list_value" => "ICOM"
            ],
            [
                "id" => 16,
                "list_name" => "Education",
                "list_table" => "Master in computer science",
                "list_value" => "master in computer science"
            ],
            [
                "id" => 17,
                "list_name" => "Education",
                "list_table" => "Master in Physics",
                "list_value" => "master in physics"
            ],
            [
                "id" => 18,
                "list_name" => "Education",
                "list_table" => "Master in Math",
                "list_value" => "Master in math"
            ],

            //department
            [
                "id" => 19,
                "list_name" => "Department",
                "list_table" => "Local Body",
                "list_value" => "Computer Science"
            ],
            [
                "id" => 20,
                "list_name" => "Department",
                "list_table" => "Local Body",
                "list_value" => "Physics"
            ],
            [
                "id" => 21,
                "list_name" => "Department",
                "list_table" => "Local Body",
                "list_value" => "Textile Designer"
            ],
            [
                "id" => 22,
                "list_name" => "Department",
                "list_table" => "Local Body",
                "list_value" => "Architecture"
            ],
            [
                "id" => 23,
                "list_name" => "Department",
                "list_table" => "Local Body",
                "list_value" => "Pharmacy"
            ],
            [
                "id" => 24,
                "list_name" => "Department",
                "list_table" => "Local Body",
                "list_value" => "Civil Engineer"
            ],
            [
                "id" => 25,
                "list_name" => "Department",
                "list_table" => "Local Body",
                "list_value" => "ADP"
            ],
        ];

        foreach ($listDetail as $listDetail) {
            ListDetail::create($listDetail);
        }
    }
}
