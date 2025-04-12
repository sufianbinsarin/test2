<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BuildingSeeder extends Seeder
{
    public function run()
    {
        // Read JSON file
        $json = file_get_contents(WRITEPATH . 'building.json');
        $building = json_decode($json, true);

        // Insert data into the database
        foreach ($building as $building) {
            $this->db->table('building')->insert($building);
        }
    }
}