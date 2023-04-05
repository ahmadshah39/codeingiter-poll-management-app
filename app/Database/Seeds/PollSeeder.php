<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker;
class PollSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $i = 0;
        $polls = [];
        while($i <= 100){
            $polls[] = [
                'title' => $faker->jobTitle(),
                'description' => $faker->realText(),
                'user_id' => 1,
            ];
            $i++;
        }
        $this->db->table('polls')->insertBatch($polls);
    }
}
