<?php

namespace Database\Seeders;

use App\Models\club;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataClubs = [
            [
                'name' => 'Persib Bandung',
                'city' => 'Bandung',
                'img' => 'persib.png'
            ],
            [
                'name' => 'Persija Jakarta',
                'city' => 'DKI Jakarta',
                'img' => 'persija.png'
            ]
        ];
        foreach ($dataClubs as $key => $clubs) {
            club::create($clubs);
        }
    }
}
