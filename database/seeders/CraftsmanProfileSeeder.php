<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CraftsmanProfile;
use App\Models\User;

class CraftsmanProfileSeeder extends Seeder
{
    public function run(): void
    {
        $pengrajinUsers = User::where('role', 'pengrajin')->get();

        foreach ($pengrajinUsers as $user) {
            CraftsmanProfile::create([
                'user_id' => $user->id,
                'bio' => 'Pengrajin berpengalaman 20 tahun di Aceh Besar',
                'location' => 'Aceh Besar, Banda Aceh',
                'photo' => 'https://via.placeholder.com/300x300',
                'is_approved' => true,
            ]);
        }
    }
}
