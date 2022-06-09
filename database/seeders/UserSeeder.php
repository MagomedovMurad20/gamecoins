<?php

namespace Database\Seeders;

use App\Services\BonusService;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::truncate();


        $current_timestamp = date('Y-m-d');
        $dayAgo = date('Y-m-d', strtotime('-1 day'));
        $twoDaysAgo = date('Y-m-d', strtotime('-2 day'));

        $firstDaysBonus = BonusService::getTotalCoinsOfNthDay(1);
        $fifthDaysBonus = BonusService::getTotalCoinsOfNthDay(5);
        $sixthDaysBonus = BonusService::getTotalCoinsOfNthDay(6);
        $ninthDaysBonus = BonusService::getTotalCoinsOfNthDay(9);


        \App\Models\User::create([
            'id' => 1,
            'day' => 1,
        ]);

        \App\Models\User::create([
            'id' => 2,
            'day' => 1,
            'dt' => $current_timestamp,
            'coins' => $firstDaysBonus,
        ]);

        \App\Models\User::create([
            'id' => 3,
            'day' => 6,
            'dt' => $dayAgo,
            'coins' => $sixthDaysBonus,
        ]);

        \App\Models\User::create([
            'id' => 4,
            'day' => 9,
            'dt' => $dayAgo,
            'coins' => $ninthDaysBonus,
        ]);

        \App\Models\User::create([
            'id' => 5,
            'day' => 5,
            'dt' => $twoDaysAgo,
            'coins' => $fifthDaysBonus,
        ]);
    }
}
