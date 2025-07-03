<?php

namespace Database\Factories;

use App\Models\Pembayaran;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    protected $model = Pembayaran::class;

    public function definition(): array
    {
        return [
            'ID_ORDER' => Order::inRandomOrder()->first()?->ID ?? Order::factory(),
            'TANGGAL_BAYAR' => $this->faker->date(),
            'METODE_BAYAR' => $this->faker->randomElement(['Transfer', 'COD', 'QRIS', 'Kartu Kredit']),
            'STATUS_BAYAR' => $this->faker->randomElement(['LUNAS', 'PENDING', 'DIBATALKAN']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
