<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        $samples = [
            ['Dompet Kulit Coklat', 'Dompet'],
            ['Kunci Motor Honda', 'Kunci'],
            ['Tas Ransel Hitam', 'Tas'],
            ['Handphone Samsung', 'Elektronik'],
            ['Earphone Putih', 'Elektronik'],
            ['Jaket Hoodie Abu-abu', 'Pakaian'],
            ['Kartu Pelajar', 'Dokumen'],
            ['Buku Catatan Biru', 'Lainnya'],
            ['Kacamata Hitam', 'Lainnya'],
            ['Power Bank Hitam', 'Elektronik'],
        ];

        $descriptions = [
            'Ada stiker kecil di bagian depan, kondisi masih bagus.',
            'Terakhir terlihat setelah jam istirahat, ada gantungan kunci di dalamnya.',
            'Warna sedikit pudar, ada inisial nama di bagian dalam.',
            'Ditemukan di dekat pintu masuk, belum ada yang mengambil.',
            'Berisi beberapa barang kecil, mohon hubungi jika merasa kehilangan.',
        ];

        $locations = [
            'Perpustakaan Lantai 2',
            'Parkiran Gedung A',
            'Kantin Sekolah',
            'Ruang Kelas XII TKJ 3',
            'Lapangan Basket',
            'Laboratorium Komputer',
            'Musala',
        ];

        [$title, $category] = fake()->randomElement($samples);

        return [
            'user_id'     => User::factory(),
            'type'        => fake()->randomElement(Item::TYPES),
            'title'       => $title,
            'description' => fake()->randomElement($descriptions),
            'category'    => $category,
            'location'    => fake()->randomElement($locations),
            'date'        => fake()->dateTimeBetween('-30 days', 'now')->format('Y-m-d'),
            'image_path'  => null,
            'status'      => 'reported',
        ];
    }
}