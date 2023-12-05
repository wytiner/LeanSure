<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Claim\Claim;
use App\Models\Claim\Insured;
use App\Models\Claim\Handler;
use App\Models\Claim\LossAdjuster;
use App\Models\Claim\Address;
use App\Models\County;
use App\Models\ScopeOfWork;
use Faker\Generator as Faker;

class ClaimsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $insured = Insured::create([
                'name' => $faker->name,
                'contact' => $faker->phoneNumber,
            ]);

            $handler = Handler::create([
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
            ]);

            $lossAdjuster = LossAdjuster::create([
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
            ]);

            $address = Address::create([
                'insured_id' => $insured->id,
                'address_line1' => $faker->streetAddress,
                'address_line2' => $faker->secondaryAddress,
                'town' => $faker->city,
                'county_id' => County::all()->random()->id,
                'eircode' => $faker->postcode,
            ]);

            Claim::create([
                'insured_id' => $insured->id,
                'axa_claim_id' => $faker->unique()->randomNumber(),
                'loss_date' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d'),
                'incept_date' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d'),
                'excess' => $faker->randomFloat(2, 0, 1000),
                'scope_id' => ScopeOfWork::all()->random()->id,
                'summary' => $faker->text(),
                'handler_id' => $handler->id,
                'loss_adjuster_id' => $lossAdjuster->id ?? null,
                'claim_status' => $faker->randomElement(['Pending', 'Call-Out Done', 'Complete', 'Booked', 'Cancelled']),
                'invoice_status' => $faker->randomElement(['Not issued', 'Issued', 'Paid']),
                'created_at' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d'),
            ]);
        }
    }
}
