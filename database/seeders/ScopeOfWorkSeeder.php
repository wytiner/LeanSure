<?php

namespace Database\Seeders;

use App\Enums\ScopeOfWorkEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScopeOfWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (ScopeOfWorkEnum::values() as $enumValue) {
            $code = null;
            foreach (ScopeOfWorkEnum::values() as $enumCode => $enumDescription) {
                if ($enumDescription === $enumValue) {
                    $code = $enumCode;
                    break;
                }
            }

            if ($code) {
                DB::table('scope_of_works')->insert([
                    'reference' => $code,
                    'description' => $enumValue,
                ]);
            }
        }
    }
}
