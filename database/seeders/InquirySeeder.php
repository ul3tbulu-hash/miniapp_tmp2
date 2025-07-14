<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inquiry;

class InquirySeeder extends Seeder
{
    public function run(): void
    {
        $types = ['join_craftsman', 'general_inquiry'];

        foreach (range(1, 10) as $i) {
            Inquiry::create([
                'name' => 'Orang ' . $i,
                'email' => 'orang' . $i . '@mail.com',
                'message' => 'Saya tertarik menjadi pengrajin atau bertanya tentang peusijuek.',
                'type' => $types[array_rand($types)],
                'read_at' => now()->subDays(rand(0, 5)),
            ]);
        }
    }
}
