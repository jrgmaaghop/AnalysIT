<?php

namespace Database\Seeders;

use App\Models\RefDiscriminationIndex;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefDiscriminationIndexSeeder extends Seeder
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
                'from' => -1,
                'to' => -0.50,
                'interpretation' => 'Can discriminate but item is questionable',
                'action' => 'Discard'
            ],
            [
                'from' => -0.49,
                'to' => -0.45,
                'interpretation' => 'Non-discriminating',
                'action' => 'Revise'
            ],
            [
                'from' => 0.46,
                'to' => 1,
                'interpretation' => 'Discriminating',
                'action' => 'Retain'
            ],
        ];

        RefDiscriminationIndex::query()->insert($data);
    }
}
