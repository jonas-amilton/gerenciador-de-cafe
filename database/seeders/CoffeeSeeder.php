<?php

namespace Database\Seeders;

use App\Models\CoffeeConsumption;
use App\Models\CoffeePreparation;
use App\Models\CoffeePurchase;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoffeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cria 5 usuários
        User::factory()->count(5)->create();

        // Gera dados de café
        CoffeePurchase::factory()->count(20)->create();
        CoffeeConsumption::factory()->count(50)->create();
        CoffeePreparation::factory()->count(15)->create();
    }
}
