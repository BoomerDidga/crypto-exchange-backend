<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $currencies = ['BTC','ETH','XRP','DOGE'];

        foreach ($currencies as $symbol) {
            Currency::create([
                'symbol' => $symbol,
                'name' => $symbol
            ]);
        }
    }
}
