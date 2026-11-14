<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::factory()->create([
            'name'  => 'Admin Reclaim',
            'email' => 'admin@reclaim.test',
            'role'  => 'admin',
        ]);

        $students = User::factory(5)->create(['role' => 'student']);

        $flow = ['reported', 'matched', 'claimed', 'resolved'];

        $notes = [
            'reported' => 'Laporan dibuat',
            'matched'  => 'Barang dicocokkan dengan laporan',
            'claimed'  => 'Klaim diverifikasi oleh staf',
            'resolved' => 'Barang telah dikembalikan',
        ];

        Item::factory(20)
            ->recycle($students)    
            ->create()
            ->each(function (Item $item) use ($flow, $notes, $admin) {
                $lastStep = random_int(0, count($flow) - 1);

                $item->update(['status' => $flow[$lastStep]]);

                for ($i = 0; $i <= $lastStep; $i++) {
                    $item->statusLogs()->create([
                        'status'     => $flow[$i],
                        'changed_by' => $i === 0 ? $item->user_id : $admin->id,
                        'note'       => $notes[$flow[$i]],
                        'created_at' => now()->addMinutes($i),
                    ]);
                }
            });
    }
}