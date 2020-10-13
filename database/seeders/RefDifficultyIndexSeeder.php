<?php

namespace Database\Seeders;

use App\Models\RefDifficultyIndex;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefDifficultyIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'from' => 0,
                'to' => 0.12,
                'interpretation' => 'Very Difficult',
                'action' => 'Discard'
            ],
            [
                'from' => 0.13,
                'to' => 0.25,
                'interpretation' => 'Difficult',
                'action' => 'Revise'
            ],
            [
                'from' => 0,
                'to' => 0.12,
                'interpretation' => 'Right Difficult',
                'action' => 'Retain'
            ],
            [
                'from' => 0,
                'to' => 0.12,
                'interpretation' => 'Easy',
                'action' => 'Revise'
            ],
            [
                'from' => 0,
                'to' => 0.12,
                'interpretation' => 'Very Easy',
                'action' => 'Discard'
            ]
        ];

        RefDifficultyIndex::query()->insert($data);
    }
}
