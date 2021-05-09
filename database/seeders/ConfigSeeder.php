<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'is_examine' => 0,
        ];

        if (Config::doesntExist()) {
            Config::create($data);
        }
    }
}
