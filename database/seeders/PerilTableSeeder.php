<?php

namespace Database\Seeders;

use App\Models\Peril;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perils = [
            'Accidental damage',
            'Break-in/Mal. Damage',
            'Chimney Fire',
            'EOW (escape of water)',
            'EOW (escape of water) - frost',
            'Fire',
            'Flood',
            'Impact',
            'Oil',
            'Other',
            'Storm',
            'Subsidence',
        ];

        foreach ($perils as $peril) {
            if (!Peril::where('description', $peril)->exists()) {
                Peril::create([
                    'description' => $peril,
                ]);
            }
        }
    }
}
