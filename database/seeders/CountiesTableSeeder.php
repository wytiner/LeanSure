<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $counties = [
            'Carlow', 'Cavan', 'Clare', 'Cork', 'Donegal',
            'Dublin', 'Galway', 'Kerry', 'Kildare', 'Kilkenny',
            'Laois', 'Leitrim', 'Limerick', 'Longford', 'Louth',
            'Mayo', 'Meath', 'Monaghan', 'Offaly', 'Roscommon',
            'Sligo', 'Tipperary', 'Waterford', 'Westmeath', 'Wexford', 'Wicklow'
        ];

        foreach ($counties as $county) {
            if (!DB::table('counties')->where('name', $county)->exists()) {
                DB::table('counties')->insert([
                    'name' => $county,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
