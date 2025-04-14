<?php

namespace Database\Seeders;

use App\Models\Coffee;
use Illuminate\Database\Seeder;

class CoffeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coffees = [
            [
                'nama' => 'White Coffee',
                'harga' => 2000,
                'deskripsi' => 'Delicious white coffee with creamy flavor.'
            ],
            [
                'nama' => 'Black Coffee',
                'harga' => 1500,
                'deskripsi' => 'Strong and bold black coffee for true coffee lovers.'
            ],
            [
                'nama' => 'Latte',
                'harga' => 2500,
                'deskripsi' => 'Smooth latte with steamed milk.'
            ],
            [
                'nama' => 'Cappuccino',
                'harga' => 3000,
                'deskripsi' => 'Espresso-based coffee with milk foam.'
            ],
            [
                'nama' => 'Mocha',
                'harga' => 3500,
                'deskripsi' => 'Chocolate flavored coffee for a sweet twist.'
            ],
            [
                'nama' => 'Espresso',
                'harga' => 1800,
                'deskripsi' => 'Strong shot of pure coffee.'
            ],
            [
                'nama' => 'Americano',
                'harga' => 2000,
                'deskripsi' => 'Espresso diluted with hot water.'
            ],
            [
                'nama' => 'Macchiato',
                'harga' => 2200,
                'deskripsi' => 'Espresso with a dash of foamed milk.'
            ],
            [
                'nama' => 'Cold Brew',
                'harga' => 2800,
                'deskripsi' => 'Cold steeped coffee served chilled.'
            ],
            [
                'nama' => 'Affogato',
                'harga' => 3200,
                'deskripsi' => 'Espresso poured over a scoop of vanilla ice cream.'
            ]
        ];

        Coffee::insert($coffees);
    }
}
